<?php
// Model untuk mengurus data akun pemohon: cek duplikasi, daftar akun baru, verifikasi login, ambil profil auto-fill, dan simpan perubahan profil
require_once __DIR__ . '/../config/database.php';

class UserModel {
    private $conn;

    public function __construct() {
        // Sambungkan ke database PostgreSQL begitu UserModel diinisialisasi
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->ensureMahasiswaColumns();
    }

    // Pastikan kolom tahun_akademik sudah tersedia di tabel mahasiswa supaya fitur auto-fill dan simpan profil berjalan lancar
    private function ensureMahasiswaColumns() {
        if (!$this->conn) {
            return;
        }
        try {
            $this->conn->exec("ALTER TABLE mahasiswa ADD COLUMN IF NOT EXISTS tahun_akademik VARCHAR(30)");
        } catch (Exception $e) {
            // Kalau kolom sudah ada atau user DB tidak diberi hak mengubah struktur tabel, lewati saja
        }
    }

    // Hitung tahun akademik berjalan secara otomatis (misal 2026/2027) kalau user belum pernah mengisi kolom tahun akademik
    private function computeDefaultAcademicYear($angkatan = null) {
        $curYear  = (int)date('Y');
        $curMonth = (int)date('n');
        // Tahun ajaran baru di kampus umumnya mulai sekitar bulan Juli/Agustus
        $startYear = ($curMonth >= 7) ? $curYear : ($curYear - 1);
        return $startYear . '/' . ($startYear + 1);
    }

    // Ambil nilai tahun akademik dari data profil mahasiswa, atau buatkan defaultnya kalau masih kosong
    private function resolveTahunAkademik(array $row, $fallbackData = []) {
        foreach (['tahun_akademik', 'academic_year', 'semester_aktif', 'semester'] as $key) {
            if (!empty($row[$key])) {
                return trim((string)$row[$key]);
            }
            if (is_array($fallbackData) && !empty($fallbackData[$key])) {
                return trim((string)$fallbackData[$key]);
            }
        }
        return $this->computeDefaultAcademicYear($row['angkatan'] ?? ($fallbackData['angkatan'] ?? null));
    }

    // Cek apakah username, email, NIM, NIP, atau Nomor Paspor sudah pernah dipakai mendaftar sebelumnya
    public function checkDuplicate($username, $email, $nomor_induk) {
        $sql = "SELECT u.username, u.email, 
                       COALESCE(m.nim, c.nip, ml.no_paspor) AS nomor_induk
                FROM users u
                LEFT JOIN mahasiswa m ON u.id_user = m.id_user
                LEFT JOIN civitas c ON u.id_user = c.id_user
                LEFT JOIN mahasiswa_luar ml ON u.id_user = ml.id_user
                WHERE LOWER(u.username) = LOWER(:username)
                   OR LOWER(u.email) = LOWER(:email)
                   OR LOWER(m.nim) = LOWER(:nomor_induk)
                   OR LOWER(c.nip) = LOWER(:nomor_induk)
                   OR LOWER(ml.no_paspor) = LOWER(:nomor_induk)
                LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':username'    => trim((string)$username),
            ':email'       => trim((string)$email),
            ':nomor_induk' => trim((string)$nomor_induk)
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Daftarkan akun baru untuk warga internal PNJ (Mahasiswa, Dosen, atau Tendik) dalam satu transaksi database
    public function registerInternal($data) {
        try {
            $this->conn->beginTransaction();

            // Pastikan pendaftar memilih salah satu dari tiga status sivitas: mahasiswa, dosen, atau tendik
            $subRole = strtolower(trim($data['sub_role'] ?? 'mahasiswa'));
            if (!in_array($subRole, ['mahasiswa', 'dosen', 'tendik'], true)) {
                throw new Exception("Silakan pilih Status Sivitas (Mahasiswa, Dosen, atau Tendik) terlebih dahulu.");
            }

            // Di tabel induk users, dosen dan tendik digabung dalam kategori role 'sivitas'
            $dbRole = ($subRole === 'mahasiswa') ? 'mahasiswa' : 'sivitas';

            if ($dbRole === 'mahasiswa') {
                $nomorInduk = trim($data['nim'] ?? $data['id'] ?? '');
                $email      = trim($data['email'] ?? '');
            } else {
                $nomorInduk = trim($data['nip'] ?? $data['id'] ?? '');
                $email      = trim($data['email_pnj'] ?? $data['email'] ?? '');
            }

            $namaLengkap = trim($data['nama_lengkap'] ?? $data['nama_asli'] ?? $data['nama'] ?? '');
            $username    = !empty($data['username']) ? trim($data['username']) : $nomorInduk;
            $password    = $data['password'] ?? '';

            if (empty($nomorInduk) || empty($email) || empty($namaLengkap) || empty($username) || empty($password)) {
                throw new Exception("Harap lengkapi seluruh kolom wajib pada formulir pendaftaran Sivitas PNJ.");
            }

            // Tolak pendaftaran kalau NIM/NIP, username, atau emailnya sudah terdaftar di database
            $dup = $this->checkDuplicate($username, $email, $nomorInduk);
            if ($dup) {
                throw new Exception("Akun dengan NIM/NIP, Username, atau Email tersebut sudah terdaftar!");
            }

            // Enkripsi kata sandi dengan Bcrypt supaya aman tersimpan di database
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Buat baris akun utama di tabel users dan ambil id_user yang baru terbentuk
            $sqlUser = "INSERT INTO users (username, email, password, role) 
                        VALUES (:username, :email, :password, :role) 
                        RETURNING id_user";
            $stmtUser = $this->conn->prepare($sqlUser);
            $stmtUser->execute([
                ':username' => $username,
                ':email'    => $email,
                ':password' => $hashedPassword,
                ':role'     => $dbRole
            ]);
            $id_user = $stmtUser->fetchColumn();

            if ($dbRole === 'mahasiswa') {
                // Kalau yang mendaftar adalah Mahasiswa, simpan detail biodata akademiknya ke tabel mahasiswa
                $angkatan = (!empty($data['angkatan']) && is_numeric($data['angkatan']))
                            ? intval($data['angkatan'])
                            : (is_numeric(substr($nomorInduk, 0, 2)) ? intval('20' . substr($nomorInduk, 0, 2)) : null);
                $ipkRaw   = isset($data['ipk']) ? str_replace(',', '.', trim((string)$data['ipk'])) : '';
                $ipk      = ($ipkRaw !== '' && is_numeric($ipkRaw)) ? floatval($ipkRaw) : null;
                $tglLahir = !empty($data['tanggal_lahir']) ? $data['tanggal_lahir'] : null;
                $tempatLahir  = !empty($data['tempat_lahir']) ? trim($data['tempat_lahir']) : null;
                $jenisKelamin = !empty($data['jenis_kelamin']) ? trim($data['jenis_kelamin']) : null;
                $jurusan      = trim($data['jurusan'] ?? '');
                $prodi        = trim($data['prodi'] ?? '');
                $noPaspor     = !empty($data['no_paspor']) ? trim($data['no_paspor']) : null;
                $noHp         = trim($data['no_hp'] ?? $data['whatsapp'] ?? '');
                $alamat       = !empty($data['alamat']) ? trim($data['alamat']) : null;

                $sqlMhs = "INSERT INTO mahasiswa (
                                nim, id_user, nama_lengkap, tempat_lahir, tanggal_lahir, 
                                jenis_kelamin, jurusan, prodi, angkatan, ipk, no_paspor, no_hp, alamat
                           ) VALUES (
                                :nim, :id_user, :nama_lengkap, :tempat_lahir, :tanggal_lahir, 
                                :jenis_kelamin, :jurusan, :prodi, :angkatan, :ipk, :no_paspor, :no_hp, :alamat
                           )";
                $stmtMhs = $this->conn->prepare($sqlMhs);
                $stmtMhs->execute([
                    ':nim'           => $nomorInduk,
                    ':id_user'       => $id_user,
                    ':nama_lengkap'  => $namaLengkap,
                    ':tempat_lahir'  => $tempatLahir,
                    ':tanggal_lahir' => $tglLahir,
                    ':jenis_kelamin' => $jenisKelamin,
                    ':jurusan'       => $jurusan,
                    ':prodi'         => $prodi,
                    ':angkatan'      => $angkatan,
                    ':ipk'           => $ipk,
                    ':no_paspor'     => $noPaspor,
                    ':no_hp'         => $noHp,
                    ':alamat'        => $alamat
                ]);

                $this->conn->commit();

                $tahunAkademik = $this->resolveTahunAkademik($data);

                return [
                    'id_user'        => $id_user,
                    'username'       => $username,
                    'role'           => 'mahasiswa',
                    'sub_role'       => 'mahasiswa',
                    'id'             => $nomorInduk,
                    'nim'            => $nomorInduk,
                    'name'           => $namaLengkap,
                    'nama'           => $namaLengkap,
                    'nama_lengkap'   => $namaLengkap,
                    'email'          => $email,
                    'whatsapp'       => $noHp,
                    'no_hp'          => $noHp,
                    'no_paspor'      => $noPaspor,
                    'jurusan'        => $jurusan,
                    'prodi'          => $prodi,
                    'tempat_lahir'   => $tempatLahir,
                    'tanggal_lahir'  => $tglLahir,
                    'jenis_kelamin'  => $jenisKelamin,
                    'angkatan'       => $angkatan,
                    'tahun_akademik' => $tahunAkademik,
                    'academic_year'  => $tahunAkademik,
                    'semester_aktif' => $tahunAkademik,
                    'ipk'            => $ipk,
                    'alamat'         => $alamat
                ];
            } else {
                // Kalau yang mendaftar adalah Dosen atau Tendik, simpan rincian kepegawaiannya ke tabel civitas
                $nidn            = !empty($data['nidn']) ? trim($data['nidn']) : null;
                $gelarDepan      = !empty($data['gelar_depan']) ? trim($data['gelar_depan']) : null;
                $gelarBelakang   = !empty($data['gelar_belakang']) ? trim($data['gelar_belakang']) : null;
                $jabatan         = trim($data['jabatan'] ?? ($subRole === 'dosen' ? 'Dosen PNJ' : 'Tenaga Kependidikan'));
                $pangkatGolongan = !empty($data['pangkat_golongan']) ? trim($data['pangkat_golongan']) : null;
                $unitKerja       = trim($data['unit_kerja'] ?? '');
                $noPaspor        = !empty($data['no_paspor']) ? trim($data['no_paspor']) : null;
                $noHp            = trim($data['no_hp'] ?? $data['whatsapp'] ?? '');
                $alamat          = !empty($data['alamat']) ? trim($data['alamat']) : null;

                $sqlCiv = "INSERT INTO civitas (
                                nip, id_user, nidn, nama_lengkap, gelar_depan, gelar_belakang, 
                                jabatan, pangkat_golongan, unit_kerja, no_paspor, no_hp, email_pnj, alamat
                           ) VALUES (
                                :nip, :id_user, :nidn, :nama_lengkap, :gelar_depan, :gelar_belakang, 
                                :jabatan, :pangkat_golongan, :unit_kerja, :no_paspor, :no_hp, :email_pnj, :alamat
                           )";
                $stmtCiv = $this->conn->prepare($sqlCiv);
                $stmtCiv->execute([
                    ':nip'              => $nomorInduk,
                    ':id_user'          => $id_user,
                    ':nidn'             => $nidn,
                    ':nama_lengkap'     => $namaLengkap,
                    ':gelar_depan'      => $gelarDepan,
                    ':gelar_belakang'   => $gelarBelakang,
                    ':jabatan'          => $jabatan,
                    ':pangkat_golongan' => $pangkatGolongan,
                    ':unit_kerja'       => $unitKerja,
                    ':no_paspor'        => $noPaspor,
                    ':no_hp'            => $noHp,
                    ':email_pnj'        => $email,
                    ':alamat'           => $alamat
                ]);

                $this->conn->commit();

                // Rangkai nama lengkap beserta gelar depan dan belakangnya untuk tampilan kartu profil & auto-fill form PDLN
                $fullName = trim(($gelarDepan ? $gelarDepan . ' ' : '') . $namaLengkap)
                            . ($gelarBelakang ? ', ' . $gelarBelakang : '');

                return [
                    'id_user'          => $id_user,
                    'username'         => $username,
                    'role'             => 'sivitas',
                    'sub_role'         => $subRole,
                    'id'               => $nomorInduk,
                    'nip'              => $nomorInduk,
                    'nidn'             => $nidn,
                    'name'             => $fullName,
                    'nama'             => $fullName,
                    'nama_asli'        => $namaLengkap,
                    'nama_lengkap'     => $namaLengkap,
                    'gelar_depan'      => $gelarDepan,
                    'gelar_belakang'   => $gelarBelakang,
                    'email'            => $email,
                    'email_pnj'        => $email,
                    'whatsapp'         => $noHp,
                    'no_hp'            => $noHp,
                    'no_paspor'        => $noPaspor,
                    'jabatan'          => $jabatan,
                    'pangkat_golongan' => $pangkatGolongan,
                    'unit_kerja'       => $unitKerja,
                    'alamat'           => $alamat
                ];
            }
        } catch (Exception $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            throw new Exception($e->getMessage());
        }
    }

    // Daftarkan akun baru untuk mahasiswa asing atau tamu dari universitas/instansi luar (Inbound)
    public function registerEksternal($data) {
        try {
            $this->conn->beginTransaction();

            $noPaspor        = trim($data['no_paspor'] ?? '');
            $email           = trim($data['email'] ?? '');
            $fullName        = trim($data['nama'] ?? $data['full_name'] ?? '');
            $homeInstitution = trim($data['asal_instansi'] ?? $data['home_institution'] ?? '-');
            $countryOrigin   = trim($data['negara_asal'] ?? $data['country_origin'] ?? $data['nationality'] ?? 'International');
            $nationality     = trim($data['nationality'] ?? $countryOrigin);
            $phoneNumber     = trim($data['whatsapp'] ?? $data['phone_number'] ?? '-');
            $password        = $data['password'] ?? '';

            // Kalau tamu luar tidak membuat username khusus, buatkan otomatis dari nomor paspor atau potongan emailnya
            $username = !empty($data['username'])
                        ? trim($data['username'])
                        : strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', $noPaspor));
            if (empty($username) && !empty($email)) {
                $username = strtolower(explode('@', $email)[0]);
            }

            if (empty($noPaspor) || empty($email) || empty($fullName) || empty($password)) {
                throw new Exception("Please complete all required fields for external registration.");
            }

            $dup = $this->checkDuplicate($username, $email, $noPaspor);
            if ($dup) {
                throw new Exception("Nomor Paspor, Username, atau Email tersebut sudah terdaftar!");
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Buat akun di tabel users dengan role 'eksternal'
            $sqlUser = "INSERT INTO users (username, email, password, role) 
                        VALUES (:username, :email, :password, 'eksternal') 
                        RETURNING id_user";
            $stmtUser = $this->conn->prepare($sqlUser);
            $stmtUser->execute([
                ':username' => $username,
                ':email'    => $email,
                ':password' => $hashedPassword
            ]);
            $id_user = $stmtUser->fetchColumn();

            // Simpan identitas paspor dan asal universitas tamu ke tabel mahasiswa_luar
            $sqlExt = "INSERT INTO mahasiswa_luar (
                            no_paspor, id_user, full_name, nationality, home_institution, 
                            country_origin, phone_number
                       ) VALUES (
                            :no_paspor, :id_user, :full_name, :nationality, :home_institution, 
                            :country_origin, :phone_number
                       )";
            $stmtExt = $this->conn->prepare($sqlExt);
            $stmtExt->execute([
                ':no_paspor'        => $noPaspor,
                ':id_user'          => $id_user,
                ':full_name'        => $fullName,
                ':nationality'      => $nationality ?: 'International',
                ':home_institution' => $homeInstitution ?: '-',
                ':country_origin'   => $countryOrigin ?: 'International',
                ':phone_number'     => $phoneNumber ?: '-'
            ]);

            $this->conn->commit();

            return [
                'id_user'          => $id_user,
                'username'         => $username,
                'role'             => 'eksternal',
                'id'               => $noPaspor,
                'no_paspor'        => $noPaspor,
                'name'             => $fullName,
                'nama'             => $fullName,
                'full_name'        => $fullName,
                'email'            => $email,
                'whatsapp'         => $phoneNumber,
                'no_telp'          => $phoneNumber,
                'phone_number'     => $phoneNumber,
                'asal_instansi'    => $homeInstitution,
                'home_institution' => $homeInstitution,
                'negara_asal'      => $countryOrigin,
                'nationality'      => $nationality
            ];
        } catch (Exception $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            throw new Exception($e->getMessage());
        }
    }

    // Cek kecocokan akun waktu user login (bisa masuk pakai Email, Username, NIM, NIP, atau Nomor Paspor)
    public function login($identifier, $password) {
        $sql = "SELECT u.id_user, u.username, u.email, u.password, u.role,
                       m.*, m.nim, m.nama_lengkap AS mhs_nama, m.jurusan, m.prodi, m.no_hp AS mhs_hp, m.no_paspor AS mhs_paspor,
                       m.tempat_lahir, m.tanggal_lahir, m.jenis_kelamin, m.angkatan, m.tahun_akademik, m.ipk, m.alamat AS mhs_alamat,
                       c.nip, c.nidn, c.nama_lengkap AS civ_nama, c.gelar_depan, c.gelar_belakang, c.jabatan,
                       c.pangkat_golongan, c.unit_kerja, c.no_hp AS civ_hp, c.no_paspor AS civ_paspor, c.email_pnj, c.alamat AS civ_alamat,
                       ml.no_paspor, ml.full_name AS ext_nama, ml.nationality, ml.home_institution, ml.country_origin, ml.phone_number AS ext_hp
                FROM users u
                LEFT JOIN mahasiswa m ON u.id_user = m.id_user
                LEFT JOIN civitas c ON u.id_user = c.id_user
                LEFT JOIN mahasiswa_luar ml ON u.id_user = ml.id_user
                WHERE LOWER(u.email) = LOWER(:id)
                   OR LOWER(u.username) = LOWER(:id)
                   OR LOWER(m.nim) = LOWER(:id)
                   OR LOWER(c.nip) = LOWER(:id)
                   OR LOWER(ml.no_paspor) = LOWER(:id)
                   OR LOWER(m.no_paspor) = LOWER(:id)
                   OR LOWER(c.no_paspor) = LOWER(:id)
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => trim((string)$identifier)]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row || empty($row['password'])) {
            return false;
        }

        // Cocokkan kata sandi yang diketik user dengan hash password di database
        if (!password_verify($password, $row['password'])) {
            return false;
        }

        // Kembalikan paket data profil sesuai rolenya supaya siap disimpan ke $_SESSION['user']
        if ($row['role'] === 'mahasiswa') {
            $tahunAkademik = $this->resolveTahunAkademik($row);
            return [
                'id_user'        => $row['id_user'],
                'username'       => $row['username'],
                'role'           => 'mahasiswa',
                'id'             => $row['nim'],
                'nim'            => $row['nim'],
                'name'           => $row['mhs_nama'],
                'nama'           => $row['mhs_nama'],
                'nama_lengkap'   => $row['mhs_nama'],
                'email'          => $row['email'],
                'whatsapp'       => $row['mhs_hp'],
                'no_hp'          => $row['mhs_hp'],
                'no_paspor'      => $row['mhs_paspor'],
                'jurusan'        => $row['jurusan'],
                'prodi'          => $row['prodi'],
                'tempat_lahir'   => $row['tempat_lahir'],
                'tanggal_lahir'  => $row['tanggal_lahir'],
                'jenis_kelamin'  => $row['jenis_kelamin'],
                'angkatan'       => $row['angkatan'],
                'tahun_akademik' => $tahunAkademik,
                'academic_year'  => $tahunAkademik,
                'semester_aktif' => $tahunAkademik,
                'ipk'            => $row['ipk'],
                'alamat'         => $row['mhs_alamat']
            ];
        } elseif ($row['role'] === 'sivitas') {
            $fullName = trim(($row['gelar_depan'] ? $row['gelar_depan'] . ' ' : '') . $row['civ_nama'])
                        . ($row['gelar_belakang'] ? ', ' . $row['gelar_belakang'] : '');
            return [
                'id_user'          => $row['id_user'],
                'username'         => $row['username'],
                'role'             => 'sivitas',
                'id'               => $row['nip'],
                'nip'              => $row['nip'],
                'nidn'             => $row['nidn'],
                'name'             => $fullName,
                'nama'             => $fullName,
                'nama_asli'        => $row['civ_nama'],
                'nama_lengkap'     => $row['civ_nama'],
                'gelar_depan'      => $row['gelar_depan'],
                'gelar_belakang'   => $row['gelar_belakang'],
                'email'            => $row['email'],
                'email_pnj'        => $row['email_pnj'] ?: $row['email'],
                'whatsapp'         => $row['civ_hp'],
                'no_hp'            => $row['civ_hp'],
                'no_paspor'        => $row['civ_paspor'],
                'jabatan'          => $row['jabatan'],
                'pangkat_golongan' => $row['pangkat_golongan'],
                'unit_kerja'       => $row['unit_kerja'],
                'alamat'           => $row['civ_alamat']
            ];
        } else {
            return [
                'id_user'          => $row['id_user'],
                'username'         => $row['username'],
                'role'             => 'eksternal',
                'id'               => $row['no_paspor'],
                'no_paspor'        => $row['no_paspor'],
                'name'             => $row['ext_nama'],
                'nama'             => $row['ext_nama'],
                'full_name'        => $row['ext_nama'],
                'email'            => $row['email'],
                'whatsapp'         => $row['ext_hp'],
                'no_telp'          => $row['ext_hp'],
                'phone_number'     => $row['ext_hp'],
                'asal_instansi'    => $row['home_institution'],
                'home_institution' => $row['home_institution'],
                'negara_asal'      => $row['country_origin'] ?: $row['nationality'],
                'nationality'      => $row['nationality']
            ];
        }
    }

    // Tarik data profil paling lengkap berdasarkan id_user untuk mengisi otomatis (auto-fill) Form Outbound, Form PDLN, dan Kartu Identitas
    public function getUserProfile($id_user) {
        $sql = "SELECT u.id_user, u.username, u.email, u.role,
                       m.*, m.nim, m.nama_lengkap AS mhs_nama, m.jurusan, m.prodi, m.no_hp AS mhs_hp, m.no_paspor AS mhs_paspor,
                       m.tempat_lahir, m.tanggal_lahir, m.jenis_kelamin, m.angkatan, m.tahun_akademik, m.ipk, m.alamat AS mhs_alamat,
                       c.nip, c.nidn, c.nama_lengkap AS civ_nama, c.gelar_depan, c.gelar_belakang, c.jabatan,
                       c.pangkat_golongan, c.unit_kerja, c.no_hp AS civ_hp, c.no_paspor AS civ_paspor, c.email_pnj, c.alamat AS civ_alamat,
                       ml.no_paspor AS ext_paspor, ml.full_name AS ext_nama, ml.nationality, ml.home_institution, ml.country_origin, ml.phone_number AS ext_hp
                FROM users u
                LEFT JOIN mahasiswa m ON u.id_user = m.id_user
                LEFT JOIN civitas c ON u.id_user = c.id_user
                LEFT JOIN mahasiswa_luar ml ON u.id_user = ml.id_user
                WHERE u.id_user = :id_user
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return null;
        }

        if ($row['role'] === 'mahasiswa') {
            $tahunAkademik = $this->resolveTahunAkademik($row);
            return [
                'id_user'        => $row['id_user'],
                'username'       => $row['username'],
                'role'           => 'mahasiswa',
                'id'             => $row['nim'],
                'nomor_induk'    => $row['nim'],
                'nim'            => $row['nim'],
                'name'           => $row['mhs_nama'],
                'nama'           => $row['mhs_nama'],
                'nama_lengkap'   => $row['mhs_nama'],
                'email'          => $row['email'],
                'whatsapp'       => $row['mhs_hp'],
                'no_hp'          => $row['mhs_hp'],
                'no_paspor'      => $row['mhs_paspor'],
                'jurusan'        => $row['jurusan'],
                'prodi'          => $row['prodi'],
                'instansi'       => $row['prodi'] ?: $row['jurusan'],
                'tempat_lahir'   => $row['tempat_lahir'],
                'tanggal_lahir'  => $row['tanggal_lahir'],
                'jenis_kelamin'  => $row['jenis_kelamin'],
                'angkatan'       => $row['angkatan'],
                'tahun_akademik' => $tahunAkademik,
                'academic_year'  => $tahunAkademik,
                'semester_aktif' => $tahunAkademik,
                'ipk'            => $row['ipk'],
                'alamat'         => $row['mhs_alamat']
            ];
        } elseif ($row['role'] === 'sivitas') {
            $fullName = trim(($row['gelar_depan'] ? $row['gelar_depan'] . ' ' : '') . $row['civ_nama'])
                        . ($row['gelar_belakang'] ? ', ' . $row['gelar_belakang'] : '');
            return [
                'id_user'          => $row['id_user'],
                'username'         => $row['username'],
                'role'             => 'sivitas',
                'id'               => $row['nip'],
                'nomor_induk'      => $row['nip'],
                'nip'              => $row['nip'],
                'nidn'             => $row['nidn'],
                'name'             => $fullName,
                'nama'             => $fullName,
                'nama_lengkap'     => $fullName,
                'nama_asli'        => $row['civ_nama'],
                'gelar_depan'      => $row['gelar_depan'],
                'gelar_belakang'   => $row['gelar_belakang'],
                'email'            => $row['email_pnj'] ?: $row['email'],
                'email_pnj'        => $row['email_pnj'] ?: $row['email'],
                'whatsapp'         => $row['civ_hp'],
                'no_hp'            => $row['civ_hp'],
                'no_paspor'        => $row['civ_paspor'],
                'jabatan'          => $row['jabatan'],
                'pangkat_golongan' => $row['pangkat_golongan'],
                'unit_kerja'       => $row['unit_kerja'],
                'instansi'         => $row['unit_kerja'],
                'alamat'           => $row['civ_alamat']
            ];
        } else {
            return [
                'id_user'          => $row['id_user'],
                'username'         => $row['username'],
                'role'             => 'eksternal',
                'id'               => $row['ext_paspor'],
                'nomor_induk'      => $row['ext_paspor'],
                'no_paspor'        => $row['ext_paspor'],
                'name'             => $row['ext_nama'],
                'nama'             => $row['ext_nama'],
                'full_name'        => $row['ext_nama'],
                'nama_lengkap'     => $row['ext_nama'],
                'email'            => $row['email'],
                'whatsapp'         => $row['ext_hp'],
                'no_telp'          => $row['ext_hp'],
                'phone_number'     => $row['ext_hp'],
                'no_hp'            => $row['ext_hp'],
                'asal_instansi'    => $row['home_institution'],
                'home_institution' => $row['home_institution'],
                'instansi'         => $row['home_institution'],
                'negara_asal'      => $row['country_origin'] ?: $row['nationality'],
                'country_origin'   => $row['country_origin'] ?: $row['nationality'],
                'nationality'      => $row['nationality']
            ];
        }
    }

    // Simpan perubahan profil dari halaman Profil Pengguna ke tabel database sesuai role (mahasiswa, civitas, atau mahasiswa_luar)
    // lalu tarik ulang profil terbarunya supaya bisa langsung dipakai memperbarui session
    public function updateUserProfile($id_user, $role, $data) {
        try {
            $this->conn->beginTransaction();

            $normRole = strtolower(trim((string)$role));
            if (in_array($normRole, ['dosen', 'tendik', 'civitas', 'sivitas'], true)) {
                $normRole = 'sivitas';
            } elseif (!in_array($normRole, ['mahasiswa', 'eksternal'], true)) {
                $normRole = 'mahasiswa';
            }

            // Ambil data lama sebagai cadangan kalau ada kolom yang tidak ikut dikirim dari form
            $current = $this->getUserProfile($id_user) ?: [];

            // Kalau user mengganti alamat emailnya, pastikan email baru belum dipakai akun lain lalu update tabel users
            $newEmail = trim((string)($data['email'] ?? $data['email_pnj'] ?? $current['email'] ?? ''));
            if ($newEmail !== '') {
                $stmtChkEmail = $this->conn->prepare(
                    "SELECT id_user FROM users WHERE LOWER(email) = LOWER(:email) AND id_user <> :id_user LIMIT 1"
                );
                $stmtChkEmail->execute([
                    ':email'   => $newEmail,
                    ':id_user' => $id_user
                ]);
                if ($stmtChkEmail->fetchColumn()) {
                    throw new Exception("Alamat email tersebut sudah digunakan oleh akun lain.");
                }

                $stmtUpdUser = $this->conn->prepare("UPDATE users SET email = :email WHERE id_user = :id_user");
                $stmtUpdUser->execute([
                    ':email'   => $newEmail,
                    ':id_user' => $id_user
                ]);
            }

            // Simpan perubahan biodata ke tabel detail yang sesuai dengan role user
            if ($normRole === 'mahasiswa') {
                $namaLengkap   = trim((string)($data['nama_lengkap'] ?? $data['nama'] ?? $current['nama_lengkap'] ?? ''));
                $tempatLahir   = isset($data['tempat_lahir']) ? trim((string)$data['tempat_lahir']) : ($current['tempat_lahir'] ?? null);
                $tanggalLahir  = !empty($data['tanggal_lahir']) ? trim((string)$data['tanggal_lahir']) : ($current['tanggal_lahir'] ?? null);
                $jenisKelamin  = !empty($data['jenis_kelamin']) ? trim((string)$data['jenis_kelamin']) : ($current['jenis_kelamin'] ?? null);
                $jurusan       = trim((string)($data['jurusan'] ?? $current['jurusan'] ?? ''));
                $prodi         = trim((string)($data['prodi'] ?? $current['prodi'] ?? ''));
                $angkatanRaw   = isset($data['angkatan']) ? trim((string)$data['angkatan']) : '';
                $angkatan      = ($angkatanRaw !== '' && is_numeric($angkatanRaw))
                                 ? (int)$angkatanRaw
                                 : ($current['angkatan'] ?? null);
                $tahunAkademik = trim((string)($data['tahun_akademik'] ?? $data['academic_year'] ?? $data['semester_aktif'] ?? $current['tahun_akademik'] ?? ''));
                $ipkRaw        = isset($data['ipk']) ? str_replace(',', '.', trim((string)$data['ipk'])) : '';
                $ipk           = ($ipkRaw !== '' && is_numeric($ipkRaw))
                                 ? (float)$ipkRaw
                                 : ($current['ipk'] ?? null);
                $noPaspor      = isset($data['no_paspor'])
                                 ? (trim((string)$data['no_paspor']) !== '' ? trim((string)$data['no_paspor']) : null)
                                 : ($current['no_paspor'] ?? null);
                $noHp          = trim((string)($data['no_hp'] ?? $data['whatsapp'] ?? $current['no_hp'] ?? ''));
                $alamat        = isset($data['alamat']) ? trim((string)$data['alamat']) : ($current['alamat'] ?? null);

                $sqlUpdMhs = "UPDATE mahasiswa
                              SET nama_lengkap   = :nama_lengkap,
                                  tempat_lahir   = :tempat_lahir,
                                  tanggal_lahir  = :tanggal_lahir,
                                  jenis_kelamin  = :jenis_kelamin,
                                  jurusan        = :jurusan,
                                  prodi          = :prodi,
                                  angkatan       = :angkatan,
                                  tahun_akademik = :tahun_akademik,
                                  ipk            = :ipk,
                                  no_paspor      = :no_paspor,
                                  no_hp          = :no_hp,
                                  alamat         = :alamat
                              WHERE id_user = :id_user";
                $stmtMhs = $this->conn->prepare($sqlUpdMhs);
                $stmtMhs->execute([
                    ':nama_lengkap'   => $namaLengkap,
                    ':tempat_lahir'   => $tempatLahir !== '' ? $tempatLahir : null,
                    ':tanggal_lahir'  => $tanggalLahir ?: null,
                    ':jenis_kelamin'  => $jenisKelamin ?: null,
                    ':jurusan'        => $jurusan,
                    ':prodi'          => $prodi,
                    ':angkatan'       => $angkatan,
                    ':tahun_akademik' => $tahunAkademik !== '' ? $tahunAkademik : null,
                    ':ipk'            => $ipk,
                    ':no_paspor'      => $noPaspor,
                    ':no_hp'          => $noHp,
                    ':alamat'         => $alamat !== '' ? $alamat : null,
                    ':id_user'        => $id_user
                ]);
            } elseif ($normRole === 'sivitas') {
                $namaLengkap     = trim((string)($data['nama_lengkap'] ?? $data['nama_asli'] ?? $data['nama'] ?? $current['nama_asli'] ?? $current['nama_lengkap'] ?? ''));
                $gelarDepan      = isset($data['gelar_depan'])
                                   ? (trim((string)$data['gelar_depan']) !== '' ? trim((string)$data['gelar_depan']) : null)
                                   : ($current['gelar_depan'] ?? null);
                $gelarBelakang   = isset($data['gelar_belakang'])
                                   ? (trim((string)$data['gelar_belakang']) !== '' ? trim((string)$data['gelar_belakang']) : null)
                                   : ($current['gelar_belakang'] ?? null);
                $nidn            = isset($data['nidn'])
                                   ? (trim((string)$data['nidn']) !== '' ? trim((string)$data['nidn']) : null)
                                   : ($current['nidn'] ?? null);
                $jabatan         = trim((string)($data['jabatan'] ?? $current['jabatan'] ?? ''));
                $pangkatGolongan = isset($data['pangkat_golongan'])
                                   ? (trim((string)$data['pangkat_golongan']) !== '' ? trim((string)$data['pangkat_golongan']) : null)
                                   : ($current['pangkat_golongan'] ?? null);
                $unitKerja       = trim((string)($data['unit_kerja'] ?? $current['unit_kerja'] ?? ''));
                $noPaspor        = isset($data['no_paspor'])
                                   ? (trim((string)$data['no_paspor']) !== '' ? trim((string)$data['no_paspor']) : null)
                                   : ($current['no_paspor'] ?? null);
                $noHp            = trim((string)($data['no_hp'] ?? $data['whatsapp'] ?? $current['no_hp'] ?? ''));
                $emailPnj        = trim((string)($data['email_pnj'] ?? $data['email'] ?? $newEmail ?: ($current['email'] ?? '')));
                $alamat          = isset($data['alamat']) ? trim((string)$data['alamat']) : ($current['alamat'] ?? null);

                $sqlUpdCiv = "UPDATE civitas
                              SET nama_lengkap     = :nama_lengkap,
                                  gelar_depan      = :gelar_depan,
                                  gelar_belakang   = :gelar_belakang,
                                  nidn             = :nidn,
                                  jabatan          = :jabatan,
                                  pangkat_golongan = :pangkat_golongan,
                                  unit_kerja       = :unit_kerja,
                                  no_paspor        = :no_paspor,
                                  no_hp            = :no_hp,
                                  email_pnj        = :email_pnj,
                                  alamat           = :alamat
                              WHERE id_user = :id_user";
                $stmtCiv = $this->conn->prepare($sqlUpdCiv);
                $stmtCiv->execute([
                    ':nama_lengkap'     => $namaLengkap,
                    ':gelar_depan'      => $gelarDepan,
                    ':gelar_belakang'   => $gelarBelakang,
                    ':nidn'             => $nidn,
                    ':jabatan'          => $jabatan,
                    ':pangkat_golongan' => $pangkatGolongan,
                    ':unit_kerja'       => $unitKerja,
                    ':no_paspor'        => $noPaspor,
                    ':no_hp'            => $noHp,
                    ':email_pnj'        => $emailPnj,
                    ':alamat'           => $alamat !== '' ? $alamat : null,
                    ':id_user'          => $id_user
                ]);
            } else {
                $fullName        = trim((string)($data['full_name'] ?? $data['nama_lengkap'] ?? $data['nama'] ?? $current['nama_lengkap'] ?? ''));
                $countryOrigin   = trim((string)($data['country_origin'] ?? $data['negara_asal'] ?? $data['nationality'] ?? $current['negara_asal'] ?? 'International'));
                $nationality     = trim((string)($data['nationality'] ?? $data['negara_asal'] ?? $countryOrigin));
                $homeInstitution = trim((string)($data['home_institution'] ?? $data['asal_instansi'] ?? $current['asal_instansi'] ?? '-'));
                $phoneNumber     = trim((string)($data['phone_number'] ?? $data['no_hp'] ?? $data['no_telp'] ?? $data['whatsapp'] ?? $current['no_hp'] ?? '-'));

                $sqlUpdExt = "UPDATE mahasiswa_luar
                              SET full_name        = :full_name,
                                  nationality      = :nationality,
                                  home_institution = :home_institution,
                                  country_origin   = :country_origin,
                                  phone_number     = :phone_number
                              WHERE id_user = :id_user";
                $stmtExt = $this->conn->prepare($sqlUpdExt);
                $stmtExt->execute([
                    ':full_name'        => $fullName,
                    ':nationality'      => $nationality ?: 'International',
                    ':home_institution' => $homeInstitution ?: '-',
                    ':country_origin'   => $countryOrigin ?: 'International',
                    ':phone_number'     => $phoneNumber ?: '-',
                    ':id_user'          => $id_user
                ]);
            }

            $this->conn->commit();

            // Ambil kembali data profil yang baru saja di-update supaya langsung siap dipakai di session
            return $this->getUserProfile($id_user);
        } catch (Exception $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            throw new Exception($e->getMessage());
        }
    }
}

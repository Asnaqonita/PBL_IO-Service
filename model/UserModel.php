<?php
// File: model/UserModel.php
require_once __DIR__ . '/../config/database.php';

class UserModel {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    /**
     * 1. Cek duplikasi akun berdasarkan username, email, nim, nip, atau no_paspor
     */
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

    /**
     * 2. Registrasi Internal Sivitas PNJ (Mahasiswa, Dosen, Tendik) menggunakan Transaksi PDO
     */
    public function registerInternal($data) {
        try {
            $this->conn->beginTransaction();

            $subRole = strtolower(trim($data['sub_role'] ?? 'mahasiswa')); // 'mahasiswa', 'dosen', atau 'tendik'
            if (!in_array($subRole, ['mahasiswa', 'dosen', 'tendik'], true)) {
                throw new Exception("Silakan pilih Status Sivitas (Mahasiswa, Dosen, atau Tendik) terlebih dahulu.");
            }

            // Sesuai CHECK constraint tabel users: role IN ('mahasiswa', 'sivitas', 'eksternal')
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

            // Cek duplikasi akun
            $dup = $this->checkDuplicate($username, $email, $nomorInduk);
            if ($dup) {
                throw new Exception("Akun dengan NIM/NIP, Username, atau Email tersebut sudah terdaftar!");
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Simpan ke tabel induk: users
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

                return [
                    'id_user'       => $id_user,
                    'username'      => $username,
                    'role'          => 'mahasiswa',
                    'sub_role'      => 'mahasiswa',
                    'id'            => $nomorInduk,
                    'nim'           => $nomorInduk,
                    'name'          => $namaLengkap,
                    'nama'          => $namaLengkap,
                    'nama_lengkap'  => $namaLengkap,
                    'email'         => $email,
                    'whatsapp'      => $noHp,
                    'no_hp'         => $noHp,
                    'no_paspor'     => $noPaspor,
                    'jurusan'       => $jurusan,
                    'prodi'         => $prodi,
                    'tempat_lahir'  => $tempatLahir,
                    'tanggal_lahir' => $tglLahir,
                    'jenis_kelamin' => $jenisKelamin,
                    'angkatan'      => $angkatan,
                    'ipk'           => $ipk,
                    'alamat'        => $alamat
                ];
            } else {
                // Simpan ke tabel civitas (Dosen atau Tendik)
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

    /**
     * 3. Registrasi Eksternal (Mahasiswa Luar / Tamu Internasional) menggunakan Transaksi PDO
     */
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

    /**
     * 4. Verifikasi Login berdasarkan email, username, nim, nip, atau no_paspor
     */
    public function login($identifier, $password) {
        $sql = "SELECT u.id_user, u.username, u.email, u.password, u.role,
                       m.nim, m.nama_lengkap AS mhs_nama, m.jurusan, m.prodi, m.no_hp AS mhs_hp, m.no_paspor AS mhs_paspor,
                       m.tempat_lahir, m.tanggal_lahir, m.jenis_kelamin, m.angkatan, m.ipk, m.alamat AS mhs_alamat,
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

        if (!password_verify($password, $row['password'])) {
            return false;
        }

        if ($row['role'] === 'mahasiswa') {
            return [
                'id_user'       => $row['id_user'],
                'username'      => $row['username'],
                'role'          => 'mahasiswa',
                'id'            => $row['nim'],
                'nim'           => $row['nim'],
                'name'          => $row['mhs_nama'],
                'nama'          => $row['mhs_nama'],
                'nama_lengkap'  => $row['mhs_nama'],
                'email'         => $row['email'],
                'whatsapp'      => $row['mhs_hp'],
                'no_hp'         => $row['mhs_hp'],
                'no_paspor'     => $row['mhs_paspor'],
                'jurusan'       => $row['jurusan'],
                'prodi'         => $row['prodi'],
                'tempat_lahir'  => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jenis_kelamin' => $row['jenis_kelamin'],
                'angkatan'      => $row['angkatan'],
                'ipk'           => $row['ipk'],
                'alamat'        => $row['mhs_alamat']
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
}

<?php
// Model untuk mengurus penyimpanan pengajuan PDLN, upload 7 dokumen syarat Setneg, dan pengambilan riwayat progress user
require_once __DIR__ . '/../config/database.php';

class PdlnModel {
    private $conn;

    public function __construct() {
        // Buka koneksi ke database PostgreSQL saat model ini dipanggil
        $database = new Database();
        $this->conn = $database->getConnection();
        $this->ensurePdlnSchema();
    }

    // Pastikan tabel pdln sudah ada di PostgreSQL supaya waktu user submit pengajuan tidak terjadi error tabel belum dibuat
    private function ensurePdlnSchema() {
        if (!$this->conn) {
            return;
        }
        try {
            $sqlCreate = "CREATE TABLE IF NOT EXISTS pdln (
                id_pdln SERIAL PRIMARY KEY,
                kode_pdln VARCHAR(30) UNIQUE NOT NULL,
                id_user INTEGER NOT NULL REFERENCES users(id_user) ON DELETE CASCADE,
                kategori_pemohon VARCHAR(20) CHECK (kategori_pemohon IN ('mahasiswa', 'sivitas')) NOT NULL,
                nim VARCHAR(20) NULL REFERENCES mahasiswa(nim) ON DELETE SET NULL,
                nip VARCHAR(30) NULL REFERENCES civitas(nip) ON DELETE SET NULL,
                nama_kegiatan VARCHAR(150) NOT NULL,
                jenis_kegiatan VARCHAR(100),
                negara_tujuan VARCHAR(50) NOT NULL,
                institusi_tujuan VARCHAR(150) NOT NULL,
                tgl_berangkat DATE NOT NULL,
                tgl_pulang DATE NOT NULL,
                sumber_dana VARCHAR(100),
                file_memo TEXT,
                file_tor TEXT,
                file_bukti_reg TEXT,
                file_pembiayaan TEXT,
                file_jadwal TEXT,
                file_clearance TEXT,
                file_mou TEXT,
                status_pdln VARCHAR(50) DEFAULT 'baru',
                progres_persen INTEGER DEFAULT 0,
                catatan_admin TEXT,
                wajib_laporan VARCHAR(10) DEFAULT 'Ya',
                wajib_paspor VARCHAR(10) DEFAULT 'Tidak',
                verified_by_admin INTEGER NULL,
                tgl_pengajuan TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            $this->conn->exec($sqlCreate);
        } catch (Exception $e) {
            // Kalau tabel sudah ada atau user DB dibatasi hak DDL-nya, lanjut saja
        }
    }

    // Terjemahkan status pengajuan dari database menjadi kode tahapan dan angka persentase kelipatan 20% (mulai dari 0% saat baru diajukan)
    public static function mapStatusAndProgress($rawStatus, $rawProgress = null) {
        $st = strtolower(trim((string)$rawStatus));
        $prog = ($rawProgress !== null && is_numeric($rawProgress)) ? (int)$rawProgress : null;

        // Baru Diajukan = 0%
        if ($st === '' || $st === 'baru' || strpos($st, 'baru') !== false) {
            return ['st' => 'baru', 'prog' => 0];
        }
        // Tahap 1: Verifikasi Dokumen oleh KUI = 20%
        if ($st === 'verifikasi' || strpos($st, 'verifikasi') !== false || strpos($st, 'tahap 1') !== false || strpos($st, 'tahap awal') !== false) {
            return ['st' => 'verifikasi', 'prog' => 20];
        }
        // Tahap 2: Proses persetujuan Pimpinan PNJ = 40%
        if ($st === 'proses_kampus' || strpos($st, 'pimpinan') !== false || strpos($st, 'kampus') !== false || strpos($st, 'tahap 2') !== false) {
            return ['st' => 'proses_kampus', 'prog' => 40];
        }
        // Tahap 3: Menunggu surat persetujuan Sekretariat Negara (Setneg) = 60%
        if ($st === 'setneg' || strpos($st, 'setneg') !== false || strpos($st, 'tahap 3') !== false) {
            return ['st' => 'setneg', 'prog' => 60];
        }
        // Tahap 4: Penerbitan izin dan pengurusan dokumen akhir = 80%
        if ($st === 'proses_akhir' || strpos($st, 'penerbitan') !== false || strpos($st, 'izin') !== false || strpos($st, 'tahap 4') !== false) {
            return ['st' => 'proses_akhir', 'prog' => 80];
        }
        // Tahap Selesai: Pengajuan sudah disetujui penuh = 100%
        if ($st === 'disetujui' || strpos($st, 'disetujui') !== false || strpos($st, 'selesai') !== false || strpos($st, 'sp terbit') !== false) {
            return ['st' => 'disetujui', 'prog' => 100];
        }
        // Kalau ditolak, tampilkan badge merah Ditolak dengan menyimpan posisi persentase terakhirnya
        if ($st === 'ditolak' || strpos($st, 'tolak') !== false) {
            return ['st' => 'ditolak', 'prog' => ($prog !== null ? $prog : 0)];
        }

        // Kalau teks statusnya berbeda, sesuaikan otomatis berdasarkan angka persentase di database
        if ($prog !== null) {
            if ($prog <= 0) return ['st' => 'baru', 'prog' => 0];
            if ($prog <= 20) return ['st' => 'verifikasi', 'prog' => 20];
            if ($prog <= 40) return ['st' => 'proses_kampus', 'prog' => 40];
            if ($prog <= 60) return ['st' => 'setneg', 'prog' => 60];
            if ($prog <= 80) return ['st' => 'proses_akhir', 'prog' => 80];
            return ['st' => 'disetujui', 'prog' => 100];
        }

        return ['st' => 'baru', 'prog' => 0];
    }

    // Cek ukuran serta format file dokumen yang diunggah user, lalu pindahkan ke folder uploads/pdln/
    private function processUploadedFile($fileKey, array $files, $kodePdln, $isRequired = false) {
        if (!isset($files[$fileKey]) || empty($files[$fileKey]['name']) || $files[$fileKey]['error'] === UPLOAD_ERR_NO_FILE) {
            if ($isRequired) {
                throw new Exception("Berkas wajib ($fileKey) belum diunggah.");
            }
            return null;
        }

        $file = $files[$fileKey];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception("Terjadi kesalahan saat mengunggah berkas ($fileKey).");
        }

        // Batasi ukuran per file maksimal 5 MB supaya server tidak keberatan
        $maxSize = 5 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            throw new Exception("Ukuran berkas ({$file['name']}) melebihi batas maksimal 5 MB.");
        }

        // Hanya izinkan dokumen PDF atau gambar JPG/PNG
        $allowedExts = ['pdf', 'jpg', 'jpeg', 'png'];
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, $allowedExts, true)) {
            throw new Exception("Format berkas ({$file['name']}) tidak didukung. Gunakan PDF, JPG, atau PNG.");
        }

        // Buat folder uploads/pdln/ secara otomatis kalau foldernya belum ada
        $uploadDir = __DIR__ . '/../uploads/pdln/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        // Beri nama file yang unik gabungan kode pengajuan dan ID acak supaya tidak tertimpa file orang lain
        $safeKey  = preg_replace('/[^a-zA-Z0-9_]/', '', $fileKey);
        $safeKode = preg_replace('/[^a-zA-Z0-9_-]/', '', $kodePdln);
        $fileName = $safeKode . '_' . $safeKey . '_' . uniqid() . '.' . $ext;
        $destPath = $uploadDir . $fileName;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            throw new Exception("Gagal menyimpan berkas unggahan ($fileKey) ke server.");
        }

        return 'uploads/pdln/' . $fileName;
    }

    // Simpan pengajuan PDLN baru beserta alamat file syarat Setneg ke tabel pdln dengan status awal 'baru' dan progress 0%
    public function createPengajuan($id_user, array $data, array $files, array $userProfile = []) {
        try {
            $this->conn->beginTransaction();

            // Tentukan apakah pemohon ini dari kalangan mahasiswa atau sivitas (dosen/tendik)
            $rawRole = strtolower(trim((string)($data['kategori_pemohon'] ?? $userProfile['role'] ?? 'sivitas')));
            $kategoriPemohon = ($rawRole === 'mahasiswa') ? 'mahasiswa' : 'sivitas';

            // Isi kolom nim kalau pemohonnya mahasiswa, atau isi kolom nip kalau pemohonnya dosen/tendik
            $nim = null;
            $nip = null;
            if ($kategoriPemohon === 'mahasiswa') {
                $nim = trim((string)($data['nim'] ?? $userProfile['nim'] ?? $userProfile['nomor_induk'] ?? ''));
                if ($nim === '') {
                    $stmtNim = $this->conn->prepare("SELECT nim FROM mahasiswa WHERE id_user = :id_user LIMIT 1");
                    $stmtNim->execute([':id_user' => $id_user]);
                    $nim = $stmtNim->fetchColumn() ?: null;
                }
            } else {
                $nip = trim((string)($data['nip'] ?? $userProfile['nip'] ?? $userProfile['nomor_induk'] ?? ''));
                if ($nip === '') {
                    $stmtNip = $this->conn->prepare("SELECT nip FROM civitas WHERE id_user = :id_user LIMIT 1");
                    $stmtNip->execute([':id_user' => $id_user]);
                    $nip = $stmtNip->fetchColumn() ?: null;
                }
            }

            // Ambil rincian kegiatan luar negeri yang diketik user di form PDLN
            $namaKegiatan    = trim((string)($data['nama_kegiatan'] ?? ''));
            $jenisKegiatan   = trim((string)($data['jenis_kegiatan'] ?? ''));
            $negaraTujuan    = trim((string)($data['negara_tujuan'] ?? $data['tempat_kegiatan'] ?? ''));
            $institusiTujuan = trim((string)($data['institusi_tujuan'] ?? ''));
            $tglBerangkat    = trim((string)($data['tgl_berangkat'] ?? $data['tgl_mulai'] ?? ''));
            $tglPulang       = trim((string)($data['tgl_pulang'] ?? $data['tgl_selesai'] ?? ''));
            $sumberDana      = trim((string)($data['sumber_dana'] ?? ''));

            if ($namaKegiatan === '' || $negaraTujuan === '' || $institusiTujuan === '' || $tglBerangkat === '' || $tglPulang === '') {
                throw new Exception("Harap lengkapi seluruh detail kegiatan luar negeri yang wajib diisi.");
            }

            if ($tglPulang < $tglBerangkat) {
                throw new Exception("Tanggal pulang tidak boleh lebih awal dari tanggal berangkat.");
            }

            // Buat kode tiket pengajuan unik (contoh: PDLN-2026-4812) dan pastikan belum pernah dipakai di database
            $kodePdln = 'PDLN-' . date('Y') . '-' . mt_rand(1000, 9999);
            $stmtChk = $this->conn->prepare("SELECT COUNT(*) FROM pdln WHERE kode_pdln = :kode");
            for ($attempt = 0; $attempt < 5; $attempt++) {
                $stmtChk->execute([':kode' => $kodePdln]);
                if ((int)$stmtChk->fetchColumn() === 0) {
                    break;
                }
                $kodePdln = 'PDLN-' . date('Y') . '-' . mt_rand(1000, 9999);
            }

            // Simpan ke-7 berkas dokumen syarat Setneg ke folder uploads/pdln/ (6 wajib, 1 MoU opsional)
            $fileMemo       = $this->processUploadedFile('file_memo', $files, $kodePdln, true);
            $fileTor        = $this->processUploadedFile('file_tor', $files, $kodePdln, true);
            $fileBuktiReg   = $this->processUploadedFile('file_bukti_reg', $files, $kodePdln, true);
            $filePembiayaan = $this->processUploadedFile('file_pembiayaan', $files, $kodePdln, true);
            $fileJadwal     = $this->processUploadedFile('file_jadwal', $files, $kodePdln, true);
            $fileClearance  = $this->processUploadedFile('file_clearance', $files, $kodePdln, true);
            $fileMou        = $this->processUploadedFile('file_mou', $files, $kodePdln, false);

            // Masukkan data pengajuan baru ke tabel pdln dengan status 'baru' dan progres 0%
            $sql = "INSERT INTO pdln (
                        kode_pdln, id_user, kategori_pemohon, nim, nip,
                        nama_kegiatan, jenis_kegiatan, negara_tujuan, institusi_tujuan,
                        tgl_berangkat, tgl_pulang, sumber_dana,
                        file_memo, file_tor, file_bukti_reg, file_pembiayaan,
                        file_jadwal, file_clearance, file_mou,
                        status_pdln, progres_persen, catatan_admin
                    ) VALUES (
                        :kode_pdln, :id_user, :kategori_pemohon, :nim, :nip,
                        :nama_kegiatan, :jenis_kegiatan, :negara_tujuan, :institusi_tujuan,
                        :tgl_berangkat, :tgl_pulang, :sumber_dana,
                        :file_memo, :file_tor, :file_bukti_reg, :file_pembiayaan,
                        :file_jadwal, :file_clearance, :file_mou,
                        'baru', 0, NULL
                    ) RETURNING id_pdln";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':kode_pdln'        => $kodePdln,
                ':id_user'          => $id_user,
                ':kategori_pemohon' => $kategoriPemohon,
                ':nim'              => $nim,
                ':nip'              => $nip,
                ':nama_kegiatan'    => $namaKegiatan,
                ':jenis_kegiatan'   => $jenisKegiatan !== '' ? $jenisKegiatan : null,
                ':negara_tujuan'    => $negaraTujuan,
                ':institusi_tujuan' => $institusiTujuan,
                ':tgl_berangkat'    => $tglBerangkat,
                ':tgl_pulang'       => $tglPulang,
                ':sumber_dana'      => $sumberDana !== '' ? $sumberDana : null,
                ':file_memo'        => $fileMemo,
                ':file_tor'         => $fileTor,
                ':file_bukti_reg'   => $fileBuktiReg,
                ':file_pembiayaan'  => $filePembiayaan,
                ':file_jadwal'      => $fileJadwal,
                ':file_clearance'   => $fileClearance,
                ':file_mou'         => $fileMou
            ]);
            $idPdln = $stmt->fetchColumn();

            $this->conn->commit();

            return [
                'id_pdln'   => $idPdln,
                'kode_pdln' => $kodePdln
            ];
        } catch (Exception $e) {
            if ($this->conn && $this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            throw new Exception($e->getMessage());
        }
    }

    // Ambil seluruh daftar pengajuan PDLN asli milik user yang sedang login (diurutkan dari yang paling baru)
    // untuk ditampilkan di tabel Progress PDLN dan grafik ringkasan Dashboard PDLN
    public function getPengajuanByUser($id_user) {
        if (!$id_user || !$this->conn) {
            return [];
        }

        // Gabungkan tabel pdln dengan tabel mahasiswa, civitas, dan laporan_pdln supaya nama peserta dan status laporannya lengkap
        $sql = "SELECT p.*,
                       m.nama_lengkap AS mhs_nama,
                       c.nama_lengkap AS civ_nama, c.gelar_depan, c.gelar_belakang, c.jabatan AS civ_jabatan,
                       lp.id_laporan
                FROM pdln p
                LEFT JOIN mahasiswa m ON p.nim = m.nim OR (p.nim IS NULL AND p.id_user = m.id_user)
                LEFT JOIN civitas c ON p.nip = c.nip OR (p.nip IS NULL AND p.id_user = c.id_user)
                LEFT JOIN laporan_pdln lp ON p.id_pdln = lp.id_pdln
                WHERE p.id_user = :id_user
                ORDER BY p.tgl_pengajuan DESC, p.id_pdln DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id_user' => $id_user]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rows as $row) {
            // Susun nama peserta dan kelompok jabatannya (mahasiswa, dosen, tendik, atau pimpinan) supaya cocok dengan filter tabel
            $kat = strtolower(trim((string)($row['kategori_pemohon'] ?? '')));
            if ($kat === 'mahasiswa') {
                $namaPeserta = trim((string)($row['mhs_nama'] ?? 'Mahasiswa PNJ'));
                $jabKey      = 'mahasiswa';
                $nipNim      = (string)($row['nim'] ?? '');
            } else {
                $civNama = trim((string)($row['civ_nama'] ?? 'Sivitas PNJ'));
                $gd      = trim((string)($row['gelar_depan'] ?? ''));
                $gb      = trim((string)($row['gelar_belakang'] ?? ''));
                $namaPeserta = trim(($gd !== '' ? $gd . ' ' : '') . $civNama) . ($gb !== '' ? ', ' . $gb : '');
                $nipNim      = (string)($row['nip'] ?? '');

                $rawJab = strtolower(trim((string)($row['civ_jabatan'] ?? '')));
                if (strpos($rawJab, 'tendik') !== false || strpos($rawJab, 'tenaga kependidikan') !== false) {
                    $jabKey = 'tendik';
                } elseif (strpos($rawJab, 'pimpinan') !== false || strpos($rawJab, 'direktur') !== false || strpos($rawJab, 'ketua') !== false) {
                    $jabKey = 'pimpinan';
                } else {
                    $jabKey = 'dosen';
                }
            }

            // Hitung kode tahapan status dan persentase progress kelipatan 20% (0% s.d. 100%)
            $mapped = self::mapStatusAndProgress($row['status_pdln'] ?? 'baru', $row['progres_persen'] ?? 0);

            // Rapikan format tanggal pengajuan menjadi YYYY-MM-DD
            $tglRaw = (string)($row['tgl_pengajuan'] ?? date('Y-m-d'));
            $tglFmt = substr($tglRaw, 0, 10);

            // Siapkan catatan verifikasi dari admin kalau ada
            $catatan = trim((string)($row['catatan_admin'] ?? ''));
            $noteObj = $catatan !== '' ? ['id' => $catatan, 'en' => $catatan] : null;

            $result[] = [
                'id_pdln'          => (int)$row['id_pdln'],
                'kode_pdln'        => (string)$row['kode_pdln'],
                'kegiatan'         => (string)$row['nama_kegiatan'],
                'jenis_kegiatan'   => (string)($row['jenis_kegiatan'] ?? ''),
                'peserta'          => [$namaPeserta !== '' ? $namaPeserta : '-'],
                'nama_peserta'     => $namaPeserta,
                'nip_nim'          => $nipNim,
                'jab'              => $jabKey,
                'kota'             => (string)($row['institusi_tujuan'] ?? ''),
                'neg'              => (string)($row['negara_tujuan'] ?? ''),
                'negara_tujuan'    => (string)($row['negara_tujuan'] ?? ''),
                'institusi_tujuan' => (string)($row['institusi_tujuan'] ?? ''),
                'tgl_berangkat'    => (string)($row['tgl_berangkat'] ?? ''),
                'tgl_pulang'       => (string)($row['tgl_pulang'] ?? ''),
                'd'                => $tglFmt,
                'st'               => $mapped['st'],
                'status_asli'      => (string)($row['status_pdln'] ?? 'baru'),
                'prog'             => $mapped['prog'],
                'lap'              => !empty($row['id_laporan']),
                'note'             => $noteObj
            ];
        }

        return $result;
    }
}

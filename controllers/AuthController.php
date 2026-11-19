<?php
// Controller untuk mengurus semua proses masuk (login), daftar akun baru, update profil pengguna, sampai keluar (logout)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        // Koneksi ke UserModel baru dibuka waktu ada aksi yang butuh database
    }

    // Ambil instance UserModel supaya koneksi database cukup dibuat sekali saja
    private function getModel() {
        if ($this->userModel === null) {
            $this->userModel = new UserModel();
        }
        return $this->userModel;
    }

    // Tampilkan halaman login pengguna
    public function login() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    // Tampilkan halaman pendaftaran akun baru
    public function register() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/register.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    // Proses pengecekan login pengguna saat form masuk dikirim (bisa pakai Email, NIM, NIP, atau Nomor Paspor)
    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }

        $identifier = trim($_POST['identifier'] ?? '');
        $password   = $_POST['password'] ?? '';

        // Pastikan kolom identitas dan kata sandi tidak dibiarkan kosong
        if (empty($identifier) || empty($password)) {
            $_SESSION['error'] = 'Silakan masukkan Email / NIM / NIP / No. Paspor dan Kata Sandi Anda!';
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }

        try {
            // Cek kecocokan akun di PostgreSQL lewat UserModel
            $user = $this->getModel()->login($identifier, $password);
            if ($user) {
                // Kalau cocok, simpan seluruh data profilnya ke session biar langsung ter-autofill di semua form
                $_SESSION['user']    = $user;
                $_SESSION['success'] = 'Selamat datang kembali, ' . $user['name'] . '!';
                header('Location: ' . BASE_URL . 'test.php#profile');
                exit;
            } else {
                $_SESSION['error'] = 'Email / NIM / NIP / No. Paspor atau Kata Sandi yang Anda masukkan salah!';
                header('Location: ' . BASE_URL . 'test.php#login');
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Gagal melakukan autentikasi: ' . $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }
    }

    // Proses pendaftaran akun baru khusus warga internal PNJ (Mahasiswa, Dosen, dan Tendik)
    public function storePnj() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        $subRole  = trim($_POST['sub_role'] ?? '');
        $password = $_POST['password'] ?? '';
        $passConf = $_POST['password_confirmation'] ?? '';

        // Pastikan pendaftar sudah memilih status sivitasnya dulu
        if (empty($subRole)) {
            $_SESSION['error'] = 'Silakan pilih Status Sivitas (Mahasiswa, Dosen, atau Tendik) terlebih dahulu!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        // Cek panjang kata sandi dan kecocokan konfirmasinya sebelum disimpan
        if (strlen($password) < 8) {
            $_SESSION['error'] = 'Kata sandi baru minimal harus 8 karakter!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        if ($password !== $passConf) {
            $_SESSION['error'] = 'Konfirmasi kata sandi tidak cocok!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        try {
            // Simpan akun baru ke tabel users dan tabel mahasiswa/civitas, lalu langsung loginkan user tersebut
            $user = $this->getModel()->registerInternal($_POST);
            $_SESSION['user']    = $user;
            $_SESSION['success'] = 'Pendaftaran Sivitas PNJ berhasil! Selamat datang, ' . $user['name'] . '.';
            header('Location: ' . BASE_URL . 'test.php#profile');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }
    }

    // Proses pendaftaran akun baru khusus mahasiswa luar negeri atau tamu internasional (Inbound)
    public function storeExt() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        $password = $_POST['password'] ?? '';
        $passConf = $_POST['password_confirmation'] ?? '';

        if (strlen($password) < 8) {
            $_SESSION['error'] = 'Password must be at least 8 characters!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        if ($password !== $passConf) {
            $_SESSION['error'] = 'Password confirmation does not match!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        try {
            // Simpan akun tamu internasional ke tabel users dan mahasiswa_luar, lalu langsung aktifkan sesinya
            $user = $this->getModel()->registerEksternal($_POST);
            $_SESSION['user']    = $user;
            $_SESSION['success'] = 'Registration successful! Welcome to I/O Service PNJ, ' . $user['name'] . '.';
            header('Location: ' . BASE_URL . 'test.php#profile');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }
    }

    // Jalur masuk cepat lewat simulasi Single Sign-On (SSO) resmi PNJ
    public function sso() {
        $_SESSION['user'] = [
            'id'    => '197804122005011002',
            'nip'   => '197804122005011002',
            'name'  => 'Sivitas PNJ',
            'nama'  => 'Sivitas PNJ',
            'email' => 'sivitas@pnj.ac.id',
            'role'  => 'sivitas'
        ];
        $_SESSION['success'] = 'Berhasil masuk melalui Single Sign-On (SSO) PNJ.';
        header('Location: ' . BASE_URL . 'test.php#home');
        exit;
    }

    // Simpan perubahan data profil pengguna ke PostgreSQL, sekalian perbarui isi session
    // supaya kartu identitas dan auto-fill di Form Outbound/PDLN langsung ikut berubah tanpa perlu logout
    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#profile');
            exit;
        }

        $idUser = $_SESSION['user']['id_user'] ?? $_SESSION['id_user'] ?? null;
        $role   = $_SESSION['user']['role'] ?? ($_POST['role'] ?? 'mahasiswa');

        if ($idUser) {
            try {
                // Update data di tabel database sesuai role user, lalu ambil kembali profil terbarunya
                $updatedProfile = $this->getModel()->updateUserProfile($idUser, $role, $_POST);
                if ($updatedProfile) {
                    $_SESSION['user'] = array_merge($_SESSION['user'] ?? [], $updatedProfile);
                }
                $_SESSION['success'] = 'Perubahan data profil berhasil disimpan!';
            } catch (Exception $e) {
                $_SESSION['error'] = 'Gagal menyimpan perubahan profil: ' . $e->getMessage();
            }
        } else {
            // Kalau user sedang mencoba halaman profil dalam mode simulasi/SSO (belum punya id_user di DB),
            // tetap simpan perubahannya ke session supaya tampilan kartu dan auto-fill form tetap berubah
            $normRole = strtolower(trim((string)$role));
            if (in_array($normRole, ['dosen', 'tendik', 'civitas', 'sivitas'], true)) {
                $normRole = 'sivitas';
            }
            $curr = $_SESSION['user'] ?? ['role' => $normRole];
            if ($normRole === 'mahasiswa') {
                $nama = trim((string)($_POST['nama_lengkap'] ?? $_POST['nama'] ?? $curr['nama_lengkap'] ?? ''));
                $thn  = trim((string)($_POST['tahun_akademik'] ?? $_POST['academic_year'] ?? $curr['tahun_akademik'] ?? ''));
                $hp   = trim((string)($_POST['no_hp'] ?? $_POST['whatsapp'] ?? $curr['no_hp'] ?? ''));
                $curr = array_merge($curr, [
                    'role'           => 'mahasiswa',
                    'name'           => $nama,
                    'nama'           => $nama,
                    'nama_lengkap'   => $nama,
                    'email'          => trim((string)($_POST['email'] ?? $curr['email'] ?? '')),
                    'no_hp'          => $hp,
                    'whatsapp'       => $hp,
                    'tempat_lahir'   => trim((string)($_POST['tempat_lahir'] ?? $curr['tempat_lahir'] ?? '')),
                    'tanggal_lahir'  => trim((string)($_POST['tanggal_lahir'] ?? $curr['tanggal_lahir'] ?? '')),
                    'jenis_kelamin'  => trim((string)($_POST['jenis_kelamin'] ?? $curr['jenis_kelamin'] ?? '')),
                    'jurusan'        => trim((string)($_POST['jurusan'] ?? $curr['jurusan'] ?? '')),
                    'prodi'          => trim((string)($_POST['prodi'] ?? $curr['prodi'] ?? '')),
                    'angkatan'       => $_POST['angkatan'] ?? ($curr['angkatan'] ?? null),
                    'tahun_akademik' => $thn,
                    'academic_year'  => $thn,
                    'semester_aktif' => $thn,
                    'ipk'            => trim((string)($_POST['ipk'] ?? $curr['ipk'] ?? '')),
                    'no_paspor'      => trim((string)($_POST['no_paspor'] ?? $curr['no_paspor'] ?? '')),
                    'alamat'         => trim((string)($_POST['alamat'] ?? $curr['alamat'] ?? ''))
                ]);
            } elseif ($normRole === 'sivitas') {
                $namaAsli = trim((string)($_POST['nama_lengkap'] ?? $_POST['nama'] ?? $curr['nama_asli'] ?? ''));
                $gd       = trim((string)($_POST['gelar_depan'] ?? $curr['gelar_depan'] ?? ''));
                $gb       = trim((string)($_POST['gelar_belakang'] ?? $curr['gelar_belakang'] ?? ''));
                $fullName = trim(($gd ? $gd . ' ' : '') . $namaAsli) . ($gb ? ', ' . $gb : '');
                $hp       = trim((string)($_POST['no_hp'] ?? $_POST['whatsapp'] ?? $curr['no_hp'] ?? ''));
                $em       = trim((string)($_POST['email_pnj'] ?? $_POST['email'] ?? $curr['email'] ?? ''));
                $curr = array_merge($curr, [
                    'role'             => 'sivitas',
                    'name'             => $fullName,
                    'nama'             => $fullName,
                    'nama_lengkap'     => $fullName,
                    'nama_asli'        => $namaAsli,
                    'gelar_depan'      => $gd,
                    'gelar_belakang'   => $gb,
                    'nidn'             => trim((string)($_POST['nidn'] ?? $curr['nidn'] ?? '')),
                    'jabatan'          => trim((string)($_POST['jabatan'] ?? $curr['jabatan'] ?? '')),
                    'pangkat_golongan' => trim((string)($_POST['pangkat_golongan'] ?? $curr['pangkat_golongan'] ?? '')),
                    'unit_kerja'       => trim((string)($_POST['unit_kerja'] ?? $curr['unit_kerja'] ?? '')),
                    'no_paspor'        => trim((string)($_POST['no_paspor'] ?? $curr['no_paspor'] ?? '')),
                    'no_hp'            => $hp,
                    'whatsapp'         => $hp,
                    'email'            => $em,
                    'email_pnj'        => $em,
                    'alamat'           => trim((string)($_POST['alamat'] ?? $curr['alamat'] ?? ''))
                ]);
            } else {
                $fullName = trim((string)($_POST['full_name'] ?? $_POST['nama_lengkap'] ?? $_POST['nama'] ?? $curr['nama_lengkap'] ?? ''));
                $hp       = trim((string)($_POST['phone_number'] ?? $_POST['no_hp'] ?? $_POST['no_telp'] ?? $curr['no_hp'] ?? ''));
                $inst     = trim((string)($_POST['home_institution'] ?? $_POST['asal_instansi'] ?? $curr['asal_instansi'] ?? ''));
                $neg      = trim((string)($_POST['country_origin'] ?? $_POST['negara_asal'] ?? $_POST['nationality'] ?? $curr['negara_asal'] ?? ''));
                $curr = array_merge($curr, [
                    'role'             => 'eksternal',
                    'name'             => $fullName,
                    'nama'             => $fullName,
                    'full_name'        => $fullName,
                    'nama_lengkap'     => $fullName,
                    'email'            => trim((string)($_POST['email'] ?? $curr['email'] ?? '')),
                    'no_hp'            => $hp,
                    'no_telp'          => $hp,
                    'phone_number'     => $hp,
                    'whatsapp'         => $hp,
                    'asal_instansi'    => $inst,
                    'home_institution' => $inst,
                    'negara_asal'      => $neg,
                    'country_origin'   => $neg,
                    'nationality'      => trim((string)($_POST['nationality'] ?? $neg))
                ]);
            }
            $_SESSION['user']    = $curr;
            $_SESSION['success'] = 'Perubahan data profil berhasil disimpan!';
        }

        header('Location: ' . BASE_URL . 'test.php#profile');
        exit;
    }

    // Bersihkan seluruh sesi login pengguna waktu tombol keluar (Logout) ditekan
    public function logout() {
        unset($_SESSION['user']);
        session_unset();
        session_destroy();

        session_start();
        $_SESSION['success'] = 'Anda telah berhasil keluar dari sesi akun.';
        header('Location: ' . BASE_URL . 'test.php#login');
        exit;
    }
}

// Jalankan aksi yang diminta kalau file ini dipanggil langsung lewat parameter ?action=...
if (isset($_GET['action'])) {
    $auth = new AuthController();
    switch ($_GET['action']) {
        case 'authenticate':
            $auth->authenticate();
            break;
        case 'storePnj':
            $auth->storePnj();
            break;
        case 'storeExt':
            $auth->storeExt();
            break;
        case 'sso':
            $auth->sso();
            break;
        case 'updateProfile':
            $auth->updateProfile();
            break;
        case 'logout':
            $auth->logout();
            break;
        default:
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
    }
}

<?php
// Nyalakan session PHP supaya status login, data profil user, dan pesan notifikasi tetap tersimpan
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Panggil pengaturan alamat dasar (BASE_URL)
require_once __DIR__ . '/config/config.php';

// Tangkap aksi pengiriman form yang masuk lewat parameter ?url=...
if (!empty($_GET['url'])) {
    $urlPath = trim((string)$_GET['url'], '/');
    // Kalau user menekan tombol Simpan Perubahan Profil, arahkan prosesnya ke AuthController
    if (strcasecmp($urlPath, 'auth/updateProfile') === 0) {
        require_once __DIR__ . '/controllers/AuthController.php';
        $authCtrl = new AuthController();
        $authCtrl->updateProfile();
        exit;
    } elseif (strcasecmp($urlPath, 'pdln/store') === 0) {
        // Kalau user mengirim form pengajuan PDLN baru, teruskan ke PdlnController buat disimpan ke PostgreSQL
        require_once __DIR__ . '/controllers/PdlnController.php';
        $pdlnCtrl = new PdlnController();
        $pdlnCtrl->store();
        exit;
    }
}

// Kalau user sudah login, tarik ulang data profil dan riwayat PDLN terbarunya dari database
// supaya kartu identitas, auto-fill form Outbound/PDLN, dan tabel progress selalu sinkron
$profil = $_SESSION['user'] ?? null;
$listPengajuanPdln = [];
if (!empty($_SESSION['user']['id_user'])) {
    try {
        require_once __DIR__ . '/model/UserModel.php';
        $um = new UserModel();
        $freshProfile = $um->getUserProfile($_SESSION['user']['id_user']);
        if ($freshProfile) {
            $_SESSION['user'] = array_merge($_SESSION['user'], $freshProfile);
            $profil = $_SESSION['user'];
        }
        // Ambil juga daftar pengajuan PDLN asli milik user ini untuk ditampilkan di tab Progress PDLN
        require_once __DIR__ . '/model/PdlnModel.php';
        $pm = new PdlnModel();
        $listPengajuanPdln = $pm->getPengajuanByUser($_SESSION['user']['id_user']);
    } catch (Exception $e) {
        // Kalau koneksi database lagi bermasalah, tetap pakai data yang sudah ada di session
    }
}

// Cek halaman mana yang mau dibuka (default 'all' supaya semua tab bisa berpindah mulus tanpa reload)
$page = $_GET['page'] ?? 'all';

// Kalau yang diminta halaman admin, langsung serahkan ke AdminController
if ($page === 'admin') {
    require_once __DIR__ . '/controllers/AdminController.php';
    $admin = new AdminController();
    $admin->index();
    exit;
}

// Tampilkan bagian kepala halaman (navbar, menu akun samping, dan kumpulan ikon SVG)
require_once __DIR__ . '/views/layouts/header.php';

// Muat isi halaman sesuai permintaan URL
switch ($page) {
    case 'login':
        require_once __DIR__ . '/views/auth/login.php';
        break;
    case 'register':
        require_once __DIR__ . '/views/auth/register.php';
        break;
    case 'profile':
    case 'profil':
        require_once __DIR__ . '/views/acc-user/index.php';
        break;
    case 'outbound':
        // Pastikan cuma Mahasiswa PNJ yang boleh buka form Outbound (Dosen/Tendik lewat PDLN)
        if (!empty($_SESSION['user']['role']) && strtolower((string)$_SESSION['user']['role']) !== 'mahasiswa') {
            $_SESSION['error'] = 'Layanan Form Outbound khusus untuk Mahasiswa PNJ. Dosen dan Tenaga Kependidikan (Tendik) silakan menggunakan layanan PDLN.';
            header('Location: ' . BASE_URL . 'test.php#home');
            exit;
        }
        require_once __DIR__ . '/views/outbound/form.php';
        break;
    case 'inbound':
        require_once __DIR__ . '/views/inbound/form.php';
        break;
    case 'pdln':
        // Cegah tamu eksternal masuk ke halaman PDLN karena PDLN khusus Mahasiswa, Dosen, dan Tendik PNJ
        if (!empty($_SESSION['user']['role']) && !in_array(strtolower((string)$_SESSION['user']['role']), ['mahasiswa', 'sivitas', 'civitas', 'dosen', 'tendik'], true)) {
            $_SESSION['error'] = 'Layanan PDLN hanya tersedia untuk Mahasiswa dan Sivitas (Dosen & Tendik) PNJ.';
            header('Location: ' . BASE_URL . 'test.php#home');
            exit;
        }
        require_once __DIR__ . '/views/pdln/index.php';
        break;
    case 'faq':
        require_once __DIR__ . '/views/faq/index.php';
        break;
    case 'home':
        require_once __DIR__ . '/views/dashboard/index.php';
        break;
    case 'all':
    default:
        // Muat seluruh bagian halaman sekaligus supaya navigasi SPA di sisi pengguna jalan instan
        require_once __DIR__ . '/views/dashboard/index.php';
        require_once __DIR__ . '/views/outbound/form.php';
        require_once __DIR__ . '/views/inbound/form.php';
        require_once __DIR__ . '/views/pdln/index.php';
        require_once __DIR__ . '/views/auth/login.php';
        require_once __DIR__ . '/views/auth/register.php';
        require_once __DIR__ . '/views/acc-user/index.php';
        break;
}

// Tampilkan bagian kaki halaman (footer, modal pop-up, dan pemanggilan script.js)
require_once __DIR__ . '/views/layouts/footer.php';
?>

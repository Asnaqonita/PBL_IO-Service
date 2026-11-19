<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Load konfigurasi dasar (BASE_URL)
require_once __DIR__ . '/config/config.php';

// Menentukan halaman yang ingin ditampilkan:
// - 'all' (default): memuat seluruh view sehingga navigasi menu (Beranda, Outbound, Inbound, PDLN) dapat diklik secara interaktif.
// - Bisa juga dibuka spesifik per halaman via URL parameter, contoh: test.php?page=outbound
$page = $_GET['page'] ?? 'all';

if ($page === 'admin') {
    require_once __DIR__ . '/controllers/AdminController.php';
    $admin = new AdminController();
    $admin->index();
    exit;
}

// Header
require_once __DIR__ . '/views/layouts/header.php';

// Konten Halaman
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
        require_once __DIR__ . '/views/outbound/form.php';
        break;
    case 'inbound':
        require_once __DIR__ . '/views/inbound/form.php';
        break;
    case 'pdln':
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
        // Memuat seluruh view agar navigasi antar halaman berfungsi penuh
        require_once __DIR__ . '/views/dashboard/index.php';
        require_once __DIR__ . '/views/outbound/form.php';
        require_once __DIR__ . '/views/inbound/form.php';
        require_once __DIR__ . '/views/pdln/index.php';
        require_once __DIR__ . '/views/auth/login.php';
        require_once __DIR__ . '/views/auth/register.php';
        require_once __DIR__ . '/views/acc-user/index.php';
        break;
}

// Footer
require_once __DIR__ . '/views/layouts/footer.php';
?>

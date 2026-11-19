<?php
// Halaman induk panel admin yang menggabungkan seluruh tab menu pengelolaan layanan KUI PNJ
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Pastikan BASE_URL sudah terdefinisi sebelum dipakai untuk redirect atau memanggil layout
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}

// Tolak akses kalau admin belum login dan arahkan kembali ke halaman login admin
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: ' . BASE_URL . 'admin.php');
    exit;
}

// Muat bagian header dan bar navigasi atas admin
require_once __DIR__ . '/../layouts/admin-header.php';

// Muat bagian menu samping (drawer kanan) admin
require_once __DIR__ . '/../layouts/admin-sidebar.php';
?>

<!-- MAIN CONTENT AREA -->
<main>
  <?php
  // Muat seluruh modul tab halaman admin supaya bisa berpindah tab secara instan tanpa reload
  require_once __DIR__ . '/dashboard.php';
  require_once __DIR__ . '/outbound.php';
  require_once __DIR__ . '/inbound.php';
  require_once __DIR__ . '/pdln.php';
  require_once __DIR__ . '/akun.php';
  require_once __DIR__ . '/faq.php';
  require_once __DIR__ . '/loket.php';
  require_once __DIR__ . '/profil.php';
  require_once __DIR__ . '/notifikasi.php';
  ?>
</main>

<?php
// Muat komponen pop-up modal untuk pemeriksaan berkas pengajuan
require_once __DIR__ . '/modal-check.php';

// Muat bagian footer beserta script interaksi halaman admin
require_once __DIR__ . '/../layouts/admin-footer.php';
?>

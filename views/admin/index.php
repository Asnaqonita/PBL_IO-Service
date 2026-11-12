<?php
/**
 * Admin Panel Master View
 * I/O Service — Kantor Urusan Internasional Politeknik Negeri Jakarta
 */
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}

// 1. Header Layout
require_once __DIR__ . '/../layouts/admin-header.php';

// 2. Sidebar / Right Drawer Layout
require_once __DIR__ . '/../layouts/admin-sidebar.php';
?>

<!-- MAIN CONTENT AREA -->
<main>
  <?php
  // 3. Modul Dashboard Utama
  require_once __DIR__ . '/dashboard.php';

  // 4. Modul Fitur Outbound
  require_once __DIR__ . '/outbound.php';

  // 5. Modul Fitur Inbound
  require_once __DIR__ . '/inbound.php';

  // 6. Modul Fitur PDLN
  require_once __DIR__ . '/pdln.php';

  // 7. Modul Data Akun Pengguna & Profil Civitas
  require_once __DIR__ . '/akun.php';

  // 8. Modul Fitur Kelola FAQ
  require_once __DIR__ . '/faq.php';

  // 9. Modul Fitur Loket Fisik
  require_once __DIR__ . '/loket.php';

  // 10. Modul Profil Petugas Admin KUI
  require_once __DIR__ . '/profil.php';

  // 11. Modul Notifikasi & Broadcast
  require_once __DIR__ . '/notifikasi.php';
  ?>
</main>

<?php
// 12. Modal Verifikasi & Periksa Berkas
require_once __DIR__ . '/modal-check.php';

// 13. Footer & Script Layout
require_once __DIR__ . '/../layouts/admin-footer.php';
?>

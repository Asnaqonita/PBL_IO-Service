<?php
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
?>
<!-- ============ RIGHT DRAWER ============ -->
<div class="scrim" id="scrim" onclick="toggleDrawer(false)"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <div class="d-head">
    <span>Akun Admin KUI</span>
    <button type="button" class="x" onclick="toggleDrawer(false)" aria-label="Tutup Menu">✕</button>
  </div>
  <div class="user">
    <div class="avatar">A</div>
    <div>
      <b><?php echo htmlspecialchars($_SESSION['admin_user']['name'] ?? 'Admin I/O PNJ'); ?></b>
      <small><?php echo htmlspecialchars($_SESSION['admin_user']['email'] ?? 'admin.io@pnj.ac.id'); ?></small>
    </div>
  </div>
  <div class="d-menu">
    <button type="button" onclick="switchTab('dashboard'); toggleDrawer(false);">
      <i>01</i> Dashboard Utama
    </button>
    <button type="button" onclick="switchTab('outbound'); toggleDrawer(false);">
      <i>02</i> Pengajuan Outbound <span class="badge">5</span>
    </button>
    <button type="button" onclick="switchTab('inbound'); toggleDrawer(false);">
      <i>03</i> Pengajuan Inbound <span class="badge">3</span>
    </button>
    <button type="button" onclick="switchTab('pdln'); toggleDrawer(false);">
      <i>04</i> Pengajuan PDLN <span class="badge">2</span>
    </button>
    <button type="button" onclick="switchTab('akun'); toggleDrawer(false);">
      <i>05</i> Data Akun Pengguna
    </button>
    <button type="button" onclick="switchTab('faq'); toggleDrawer(false);">
      <i>06</i> Kelola FAQ
    </button>
    <button type="button" onclick="switchTab('loket'); toggleDrawer(false);">
      <i>07</i> Loket Pengambilan <span class="badge">4</span>
    </button>
    <button type="button" onclick="switchTab('profil'); toggleDrawer(false);">
      <i>08</i> Profil Admin KUI
    </button>
    <button type="button" onclick="switchTab('notifikasi'); toggleDrawer(false);">
      <i>09</i> Notifikasi &amp; Broadcast <span class="badge">3</span>
    </button>
  </div>
  <div class="d-foot">
    <a href="<?php echo BASE_URL; ?>admin.php?action=logout" class="btn slate" style="width:100%;text-align:center;display:block">LOGOUT</a>
  </div>
</aside>

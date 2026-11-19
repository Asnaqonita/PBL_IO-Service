<?php
// Nyalakan session kalau belum aktif supaya kita bisa baca data login user dan pesan notifikasi
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Pastikan BASE_URL sudah terdefinisi sebelum memanggil file script.js di bagian bawah
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
// Ambil data user yang lagi login serta pesan sukses/error sementara (flash message), lalu hapus pesannya dari session biar nggak muncul berulang kali saat halaman di-refresh
$phpSessionUser  = $_SESSION['user'] ?? null;
$phpFlashError   = $_SESSION['error'] ?? null;
$phpFlashSuccess = $_SESSION['success'] ?? null;
unset($_SESSION['error'], $_SESSION['success']);
?>
</main>
<footer><b>I/O Service</b> · <span data-i18n="ft">Layanan internasional terpadu Politeknik Negeri Jakarta</span></footer>
<!-- ============ MODALS ============ -->
<div class="modal" id="loginModal" role="dialog" aria-modal="true">
  <form class="mbox" id="loginForm" action="<?php echo BASE_URL; ?>controllers/AuthController.php?action=authenticate" method="POST">
    <button type="button" class="x" data-close aria-label="Close">✕</button>
    <h3 data-i18n="lg_t">Masuk</h3>
    <p data-i18n="lg_demo">Masukkan akun terdaftar Anda untuk masuk.</p>
    <div class="f"><label data-i18n="lg_user">Email / NIP</label><input type="text" name="identifier" id="lgUser" required placeholder="nama@pnj.ac.id"></div>
    <div class="f"><label data-i18n="lg_pass">Kata Sandi</label><input type="password" name="password" id="lgPass" required placeholder="••••••••"></div>
    <button type="submit" class="btn main" style="width:100%;margin-top:6px" data-i18n="lg_btn">Masuk</button>
    <div style="margin-top:14px;padding-top:12px;border-top:1px dashed var(--t300);text-align:center;font-size:13px;color:var(--muted)">
      <a href="#login" data-go="login" data-close style="color:var(--t600);font-weight:600;text-decoration:underline">Buka Halaman Login Penuh / SSO PNJ</a>
    </div>
  </form>
</div>
<div class="modal" id="okModal" role="dialog" aria-modal="true">
  <div class="mbox">
    <h3 data-i18n="ok_t">Pengajuan Terkirim</h3>
    <p data-i18n="ok_note">Pantau statusnya lewat menu Pengajuan Saya.</p>
    <div class="sum" id="okSum"></div>
    <div class="mact">
      <button type="button" class="btn ghost" id="okAgain" data-i18n="ok_again">Ajukan Lagi</button>
      <button type="button" class="btn main" id="okHome" data-i18n="ok_home">Ke Beranda</button>
    </div>
  </div>
</div>
<div class="toasts" id="toasts" aria-live="polite"></div>
<div class="tip" id="tip" role="tooltip" hidden></div>
<script>
  // Oper data BASE_URL, data session user, dan pesan notifikasi dari PHP ke variabel global JavaScript biar bisa langsung dipakai oleh script.js
  window.BASE_URL = <?php echo json_encode(BASE_URL); ?>;
  window.PHP_SESSION_USER = <?php echo json_encode($phpSessionUser); ?>;
  window.PHP_FLASH_ERROR = <?php echo json_encode($phpFlashError); ?>;
  window.PHP_FLASH_SUCCESS = <?php echo json_encode($phpFlashSuccess); ?>;
</script>
<script src="<?php echo BASE_URL; ?>assets/script.js?v=<?php echo filemtime(__DIR__ . '/../../assets/script.js'); ?>"></script>
</body>
</html>

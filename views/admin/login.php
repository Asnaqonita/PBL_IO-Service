<?php
// Halaman login khusus administrator KUI PNJ, pastikan BASE_URL sudah siap dipakai untuk memanggil CSS dan action form
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>I/O Service — Login Administrator KUI</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,500..700;1,8..60,500..700&family=Source+Sans+3:ital,wght@0,400..700;1,400..600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/admin.css">
</head>
<body>

<!-- SVG SYMBOLS -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false"><defs>
<symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="none" stroke="currentColor" stroke-width="2"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-lock" viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="16" r="1.5" fill="currentColor"/><path d="M8 11V7a4 4 0 0 1 8 0v4" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-eye" viewBox="0 0 24 24"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" fill="none" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="3" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-arrow-r" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 3s7 3 7 8c0 5-7 10-7 10S5 16 5 11c0-5 7-8 7-8z" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-alert" viewBox="0 0 24 24"><circle cx="12" cy="12" r="9" fill="none" stroke="currentColor" stroke-width="2"/><path d="M12 8v4M12 16h.01" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
</defs></svg>

<!-- ============ TOP BAR LOGIN ============ -->
<header class="top" style="justify-content:space-between;padding-right:28px">
  <a class="brand" href="<?php echo BASE_URL; ?>index.php" title="Menuju Beranda Utama">
    <b>I<i>/</i>O</b><span>Service</span>
  </a>
  <div style="display:flex;align-items:center;gap:14px">
    <span class="bdg" style="padding:4px 12px;font-size:11px">PORTAL ADMINISTRATOR</span>
    <a href="<?php echo BASE_URL; ?>index.php" class="btn ghost" style="padding:8px 18px;font-size:12px;text-decoration:none">
      ← Portal Pemohon
    </a>
  </div>
</header>

<!-- ============ WRAPPER UTAMA LOGIN ADMIN ============ -->
<main class="admin-auth-wrap">
  <div class="admin-login-card">
    
    <!-- Header Kartu Login -->
    <div class="admin-login-head">
      <div class="admin-login-badge">
        <svg class="ic" width="24" height="24" style="stroke:currentColor"><use href="#i-shield"/></svg>
      </div>
      <div>
        <h2 class="admin-login-title">Masuk Administrator</h2>
        <p class="admin-login-sub">Panel Kendali Layanan Internasional KUI PNJ</p>
      </div>
    </div>

    <!-- Alert Notifikasi Error -->
    <?php if (!empty($errorMessage)): ?>
      <div class="alert-box alert-error">
        <svg width="20" height="20" style="stroke:currentColor;flex-shrink:0"><use href="#i-alert"/></svg>
        <span><?php echo htmlspecialchars($errorMessage); ?></span>
      </div>
    <?php endif; ?>

    <!-- Alert Notifikasi Berhasil (misal setelah logout) -->
    <?php if (!empty($successMessage)): ?>
      <div class="alert-box alert-success">
        <svg width="20" height="20" style="stroke:currentColor;flex-shrink:0"><use href="#i-check"/></svg>
        <span><?php echo htmlspecialchars($successMessage); ?></span>
      </div>
    <?php endif; ?>

    <!-- Formulir Login Admin (HANYA EMAIL & PASSWORD) -->
    <form action="<?php echo BASE_URL; ?>admin.php?action=login" method="POST" id="adminLoginForm" novalidate>
      
      <!-- Kolom 1: Email -->
      <div class="f">
        <label for="adminEmail">Email Administrator</label>
        <div class="input-with-icon">
          <svg class="input-ico ic"><use href="#i-user"/></svg>
          <input type="email" name="email" id="adminEmail" required placeholder="admin@pnj.ac.id" autocomplete="email" autofocus>
        </div>
      </div>

      <!-- Kolom 2: Password -->
      <div class="f">
        <div style="display:flex;justify-content:space-between;align-items:center">
          <label for="adminPassword">Kata Sandi</label>
        </div>
        <div class="input-with-icon pass-field">
          <svg class="input-ico ic"><use href="#i-lock"/></svg>
          <input type="password" name="password" id="adminPassword" required placeholder="••••••••" autocomplete="current-password">
          <button type="button" class="btn-eye" id="toggleAdminPass" aria-label="Tampilkan / Sembunyikan Kata Sandi" onclick="togglePasswordVisibility()">
            <svg class="ic" width="18" height="18"><use href="#i-eye"/></svg>
          </button>
        </div>
      </div>

      <!-- Tombol Masuk ke Dashboard -->
      <button type="submit" class="btn main" style="width:100%;margin-top:10px">
        <span>MASUK KE DASHBOARD ADMIN</span>
        <svg class="ic" width="16" height="16"><use href="#i-arrow-r"/></svg>
      </button>
    </form>

    <!-- Kotak Demo Kredensial untuk Kemudahan Pengujian -->
    <div class="demo-box">
      <div style="display:flex;align-items:center;gap:6px;margin-bottom:6px">
        <svg width="14" height="14" style="stroke:var(--t600)"><use href="#i-shield"/></svg>
        <b>Akun Pengujian Admin:</b>
      </div>
      <div>Email: <code style="background:#fff;padding:2px 6px;border:1px solid var(--t300);font-weight:700">admin@pnj.ac.id</code></div>
      <div style="margin-top:3px">Kata Sandi: <code style="background:#fff;padding:2px 6px;border:1px solid var(--t300);font-weight:700">admin123</code></div>
      <button type="button" class="demo-btn" onclick="fillAdminDemo()">Gunakan Kredensial Cepat</button>
    </div>

  </div>
</main>

<!-- ============ FOOTER ============ -->
<footer>
  <b>I/O Service</b> — Kantor Urusan Internasional Politeknik Negeri Jakarta &copy; 2026.
</footer>

<script>
// Ubah tipe input password antara teks biasa dan bintang-bintang saat ikon mata diklik
function togglePasswordVisibility() {
  const passInput = document.getElementById('adminPassword');
  if (!passInput) return;
  if (passInput.type === 'password') {
    passInput.type = 'text';
  } else {
    passInput.type = 'password';
  }
}

// Isi otomatis kolom email dan password dengan akun demo admin untuk mempercepat pengujian
function fillAdminDemo() {
  const emailInput = document.getElementById('adminEmail');
  const passInput = document.getElementById('adminPassword');
  if (emailInput) emailInput.value = 'admin@pnj.ac.id';
  if (passInput) passInput.value = 'admin123';
}
</script>

</body>
</html>

<?php
// Nyalakan session dan ambil pesan error atau pesan sukses login (kalau ada) supaya bisa ditampilkan di kotak alert halaman login
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
$loginError   = $_SESSION['error'] ?? null;
$loginSuccess = $_SESSION['success'] ?? null;
?>
<!-- ============ HALAMAN LOGIN ============ -->
<section class="page" id="page-login">
  <div class="wrap">
    
    <!-- Breadcrumb Navigasi -->
    <div class="crumb">
      <a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / 
      <span>Autentikasi</span> / 
      <b>Masuk Akun</b>
    </div>

    <!-- Header Halaman -->
    <div class="fhead auth-fhead">
      <div class="auth-kicker"><span class="bdg">PORTAL AUTENTIKASI</span></div>
      <h2 class="ftitle">Masuk<em>Akun</em></h2>
    </div>

    <!-- Kotak Utama Login -->
    <div class="auth-card-wrap">
      <div class="auth-shell shell">
        
        <div class="auth-card-top">
          <div class="auth-icon-badge">
            <svg class="ic"><use href="#i-user"/></svg>
          </div>
          <div>
            <h3 class="auth-card-title">Masuk ke Portal I/O</h3>
            <p class="auth-card-sub">Masukkan email / NIP / NIM / Paspor dan kata sandi Anda</p>
          </div>
        </div>

        <!-- Alert Notifikasi dari Session PHP (jika ada) -->
        <?php if (!empty($loginError)): ?>
          <div style="background:#FEE2E2;color:#991B1B;border:1px solid #FCA5A5;padding:10px 14px;border-radius:4px;font-size:12.5px;margin-bottom:16px;">
            <?= htmlspecialchars($loginError); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($loginSuccess)): ?>
          <div style="background:#D1FAE5;color:#065F46;border:1px solid #6EE7B7;padding:10px 14px;border-radius:4px;font-size:12.5px;margin-bottom:16px;">
            <?= htmlspecialchars($loginSuccess); ?>
          </div>
        <?php endif; ?>

        <!-- Form Login Standar (Email / NIM / NIP / Paspor & Password) -->
        <form class="auth-form" id="f-login" action="<?= BASE_URL ?>controllers/AuthController.php?action=authenticate" method="POST" novalidate>
          
          <!-- Field Identifier (Email / NIP / NIM / Paspor) -->
          <div class="f">
            <label for="loginUser">Email / NIP / NIM / No. Paspor</label>
            <div class="input-with-icon">
              <svg class="input-ico ic"><use href="#i-user"/></svg>
              <input type="text" name="identifier" id="loginUser" required placeholder="nama@pnj.ac.id atau NIM / NIP" autocomplete="username">
            </div>
            <span class="err">Silakan masukkan email, NIM, NIP, atau nomor paspor Anda.</span>
          </div>

          <!-- Field Password -->
          <div class="f">
            <div class="lrow">
              <label for="loginPassword">Kata Sandi</label>
              <a href="#faq" data-go="faq" class="auth-link-sm">Lupa kata sandi?</a>
            </div>
            <div class="input-with-icon pass-field">
              <svg class="input-ico ic"><use href="#i-lock"/></svg>
              <input type="password" name="password" id="loginPassword" required placeholder="••••••••" autocomplete="current-password">
              <button type="button" class="btn-eye" id="toggleLoginPass" aria-label="Lihat kata sandi">
                <svg class="ic"><use href="#i-eye"/></svg>
              </button>
            </div>
            <span class="err">Silakan masukkan kata sandi Anda.</span>
          </div>

          <!-- Baris Ingat Saya -->
          <div class="auth-options">
            <label class="custom-chk">
              <input type="checkbox" name="remember" id="rememberMe" value="1">
              <span class="chk-box"></span>
              <span class="chk-text">Ingat saya di perangkat ini</span>
            </label>
          </div>

          <!-- Tombol Submit Login Biasa -->
          <button type="submit" class="btn main auth-submit-btn">
            <span>MASUK KE SISTEM</span>
            <svg class="ic"><use href="#i-arrow-r"/></svg>
          </button>
        </form>

        <!-- ============ BAGIAN SSO PNJ (DI BAWAH FORM EMAIL & PASSWORD) ============ -->
        <div class="auth-divider">
          <span>ATAU MASUK DENGAN</span>
        </div>

        <div class="sso-wrapper">
          <div class="sso-box">
            <div class="sso-badge-row">
              <span class="pill-sso">KHUSUS SIVITAS AKADEMIKA PNJ</span>
            </div>
            
            <a href="<?= BASE_URL ?>controllers/AuthController.php?action=sso" class="btn-sso-pnj" id="btnSsoLogin">
              <div class="sso-emblem">
                <span class="pnj-abbr">PNJ</span>
                <span class="sso-txt">SSO</span>
              </div>
              <div class="sso-desc">
                <b class="sso-title">Login dengan SSO PNJ</b>
                <span class="sso-sub">Single Sign-On resmi Politeknik Negeri Jakarta</span>
              </div>
              <div class="sso-arrow-box">
                <svg class="ic"><use href="#i-arrow-r"/></svg>
              </div>
            </a>

            <div class="sso-hint">
              <svg class="ic"><use href="#i-shield"/></svg>
              <span>Dosen, tendik, dan mahasiswa aktif dapat langsung masuk menggunakan akun <code>@pnj.ac.id</code> tanpa mendaftar manual.</span>
            </div>
          </div>
        </div>

        <!-- Bagian Bawah: Navigasi ke Registrasi & Beranda -->
        <div class="auth-footer-bar">
          <p>Belum memiliki akun? <a href="#register" data-go="register" class="auth-action-link">Daftar Akun Baru</a></p>
          <a href="#home" data-go="home" class="auth-back-link">
            <span>← Kembali ke Beranda</span>
          </a>
        </div>

      </div>
    </div>

  </div>
</section>

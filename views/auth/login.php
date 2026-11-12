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
            <p class="auth-card-sub">Masukkan email / NIP / NIM dan kata sandi Anda</p>
          </div>
        </div>

        <!-- Form Login Standar (Email & Password) -->
        <form class="auth-form" id="f-login" action="index.php?url=auth/authenticate" method="POST" novalidate>
          
          <!-- Field Identifier (Email / NIP / NIM) -->
          <div class="f">
            <label for="loginUser">Email / NIP / NIM</label>
            <div class="input-with-icon">
              <svg class="input-ico ic"><use href="#i-user"/></svg>
              <input type="text" name="identifier" id="loginUser" required placeholder="nama@pnj.ac.id atau NIM / NIP" autocomplete="username">
            </div>
            <span class="err">Silakan masukkan email, NIM, atau NIP Anda.</span>
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

        <!-- Quick Demo Login Peran ERD -->
        <div style="margin:22px 0 16px;background:var(--card,#fff);border:1.5px dashed var(--t300);padding:16px;border-radius:2px;">
          <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
            <svg width="15" height="15" style="fill:var(--t600);"><use href="#i-shield"/></svg>
            <b style="font-size:12px;color:var(--t900);letter-spacing:0.04em;text-transform:uppercase;">Demo Cepat: Masuk Berdasarkan ERD Role</b>
          </div>
          <p style="font-size:12px;color:var(--muted);margin:0 0 12px 0;">Pilih salah satu role pengguna untuk langsung simulasi login &amp; melihat data ERD di menu profil:</p>
          <div style="display:grid;grid-template-columns:1fr;gap:8px;">
            <button type="button" class="btn ghost" style="justify-content:flex-start;padding:8px 12px;font-size:12px;text-align:left;border-color:var(--t400);background:#fff;" onclick="handleDemoLogin('mahasiswa')">
              <span style="font-weight:700;color:var(--t900);margin-right:6px;">🎓 1. Mahasiswa PNJ</span>
              <span style="color:var(--muted);">(NIM: 2507411018 · Program Outbound)</span>
            </button>
            <button type="button" class="btn ghost" style="justify-content:flex-start;padding:8px 12px;font-size:12px;text-align:left;border-color:var(--t400);background:#fff;" onclick="handleDemoLogin('civitas')">
              <span style="font-weight:700;color:var(--t900);margin-right:6px;">🏛️ 2. Civitas Dosen/Tendik</span>
              <span style="color:var(--muted);">(NIP: 19780412... · Izin PDLN Setneg)</span>
            </button>
            <button type="button" class="btn ghost" style="justify-content:flex-start;padding:8px 12px;font-size:12px;text-align:left;border-color:var(--t400);background:#fff;" onclick="handleDemoLogin('eksternal')">
              <span style="font-weight:700;color:var(--t900);margin-right:6px;">🌏 3. Mahasiswa Luar / Tamu Eksternal</span>
              <span style="color:var(--muted);">(Paspor: TK8891201 · Program Inbound)</span>
            </button>
          </div>
        </div>

        <!-- ============ BAGIAN SSO PNJ (DI BAWAH FORM EMAIL & PASSWORD) ============ -->
        <div class="auth-divider">
          <span>ATAU MASUK DENGAN</span>
        </div>

        <div class="sso-wrapper">
          <div class="sso-box">
            <div class="sso-badge-row">
              <span class="pill-sso">KHUSUS SIVITAS AKADEMIKA PNJ</span>
            </div>
            
            <a href="index.php?url=auth/sso" class="btn-sso-pnj" id="btnSsoLogin">
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

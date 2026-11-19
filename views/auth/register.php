<?php
// File: views/auth/register.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../../config/config.php';
$regError = $_SESSION['error'] ?? null;
?>
<!-- ============ HALAMAN REGISTRASI ============ -->
<section class="page" id="page-register">
  <div class="wrap">
    
    <!-- Breadcrumb Navigasi -->
    <div class="crumb">
      <a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / 
      <span>Autentikasi</span> / 
      <b>Registrasi Akun</b>
    </div>

    <!-- Header Halaman -->
    <div class="fhead auth-fhead">
      <div class="auth-kicker"><span class="bdg">PENDAFTARAN AKUN BARU</span></div>
      <h2 class="ftitle">Daftar<em>Akun Baru</em></h2>
      <p class="fsub">Pilih kategori pendaftaran sesuai status Anda: Sivitas Politeknik Negeri Jakarta atau Mahasiswa Luar / Tamu Internasional.</p>
    </div>

    <!-- Container Utama Registrasi -->
    <div class="reg-container">

      <!-- Alert Notifikasi Error dari Session PHP (jika ada) -->
      <?php if (!empty($regError)): ?>
        <div style="background:#FEE2E2;color:#991B1B;border:1px solid #FCA5A5;padding:12px 16px;border-radius:4px;font-size:13px;margin-bottom:20px;">
          <?= htmlspecialchars($regError); ?>
        </div>
      <?php endif; ?>
      
      <!-- ============ PEMILIHAN KATEGORI (TERBAGI 2) ============ -->
      <div class="reg-category-tabs" role="tablist" aria-label="Pilihan Kategori Pendaftaran">
        
        <!-- Opsi 1: Sivitas PNJ -->
        <button type="button" class="reg-cat-card active" id="tab-btn-pnj" data-target="pane-pnj" role="tab" aria-selected="true">
          <div class="cat-pill">OPSI 01 · INTERNAL</div>
          <div class="cat-header">
            <div class="cat-icon pnj-color">
              <svg class="ic"><use href="#i-school"/></svg>
            </div>
            <div>
              <h3 class="cat-title">Sivitas PNJ</h3>
              <span class="cat-tagline">Dosen, Tendik, & Mahasiswa PNJ</span>
            </div>
          </div>
          <p class="cat-desc">Untuk civitas aktif Politeknik Negeri Jakarta yang mengajukan program Outbound, PDLN, atau layanan internasional.</p>
          <div class="cat-indicator">
            <span class="dot"></span>
            <b>Formulir Aktif</b>
          </div>
        </button>

        <!-- Opsi 2: Mahasiswa Luar / Eksternal -->
        <button type="button" class="reg-cat-card" id="tab-btn-ext" data-target="pane-ext" role="tab" aria-selected="false">
          <div class="cat-pill ext-pill">OPSI 02 · EKSTERNAL</div>
          <div class="cat-header">
            <div class="cat-icon ext-color">
              <svg class="ic"><use href="#i-globe"/></svg>
            </div>
            <div>
              <h3 class="cat-title">Mahasiswa Luar / Eksternal</h3>
              <span class="cat-tagline">Mahasiswa Asing & Mitra Internasional</span>
            </div>
          </div>
          <p class="cat-desc">Untuk mahasiswa internasional, perwakilan universitas luar negeri, atau pihak luar yang mengajukan program Inbound.</p>
          <div class="cat-indicator">
            <span class="dot"></span>
            <b>Formulir Aktif</b>
          </div>
        </button>

      </div>

      <!-- ============ FORM 1: SIVITAS PNJ ============ -->
      <div class="reg-pane active" id="pane-pnj" role="tabpanel" aria-labelledby="tab-btn-pnj">
        <form class="shell reg-shell" id="f-register-pnj" action="<?= BASE_URL ?>controllers/AuthController.php?action=storePnj" method="POST" novalidate>
          
          <!-- Alert SSO PNJ -->
          <div class="auth-notice pnj-notice">
            <div class="notice-icon">
              <svg class="ic"><use href="#i-shield"/></svg>
            </div>
            <div class="notice-content">
              <b>Sudah memiliki akun SSO PNJ?</b>
              <p>Sivitas akademika aktif tidak perlu mendaftar manual jika sudah memiliki akun SSO Politeknik Negeri Jakarta. Anda dapat langsung <a href="#login" data-go="login">Login dengan SSO PNJ</a>.</p>
            </div>
          </div>

          <!-- Bagian 1: Data Sivitas PNJ -->
          <div class="sec">
            <span class="num">01</span>
            <h3 id="reg-pnj-sec-title">Data Sivitas PNJ</h3>
            <i class="dash"></i>
          </div>

          <div class="grid" style="margin-bottom: 24px;">
            <!-- Peran Sivitas -->
            <div class="f full">
              <label for="pnjRole">Status Sivitas</label>
              <select name="sub_role" id="pnjRole" required onchange="toggleRegisterPnjRole(this.value)">
                <option value="">-- Pilih Status Sivitas Anda Terlebih Dahulu --</option>
                <option value="mahasiswa">Mahasiswa Aktif PNJ</option>
                <option value="dosen">Dosen PNJ</option>
                <option value="tendik">Tenaga Kependidikan (Tendik) PNJ</option>
              </select>
              <span class="err">Silakan pilih status sivitas Anda.</span>
            </div>
          </div>

          <!-- Pesan Petunjuk Sebelum Role Dipilih -->
          <div id="reg-role-placeholder" style="background:#F8FAFC;border:1px dashed #CBD5E1;padding:18px;border-radius:4px;text-align:center;color:#64748B;font-size:13px;margin-bottom:16px;">
            Silakan pilih <b>Status Sivitas</b> di atas (Mahasiswa, Dosen, atau Tendik) untuk memunculkan formulir isian identitas yang sesuai.
          </div>

          <!-- 1A. Form Isian Khusus Mahasiswa PNJ (Sesuai DDL Tabel mahasiswa) -->
          <div id="reg-fields-mahasiswa" class="grid" style="display: none;">
            <?php require __DIR__ . '/registerMahasiswa.php'; ?>
          </div>

          <!-- 1B. Form Isian Khusus Dosen PNJ (Sesuai DDL Tabel civitas) -->
          <div id="reg-fields-dosen" class="grid" style="display: none;">
            <?php require __DIR__ . '/registerDosen.php'; ?>
          </div>

          <!-- 1C. Form Isian Khusus Tendik PNJ (Sesuai DDL Tabel civitas) -->
          <div id="reg-fields-tendik" class="grid" style="display: none;">
            <?php require __DIR__ . '/registerTendik.php'; ?>
          </div>

          <!-- Bagian 2: Kata Sandi -->
          <div class="sec" style="margin-top: 24px;">
            <span class="num">02</span>
            <h3>Keamanan Akun</h3>
            <i class="dash"></i>
          </div>

          <div class="grid">
            <!-- Username (Sesuai DDL Tabel users) -->
            <div class="f full">
              <label for="pnjUsername">Username Akun</label>
              <input type="text" name="username" id="pnjUsername" maxlength="50" required placeholder="Contoh: farhan_pnj24 atau hendra.wijaya" autocomplete="username">
              <span class="err">Username wajib diisi.</span>
            </div>

            <!-- Password -->
            <div class="f">
              <label for="pnjPass">Kata Sandi Baru</label>
              <div class="input-with-icon pass-field">
                <svg class="input-ico ic"><use href="#i-lock"/></svg>
                <input type="password" name="password" id="pnjPass" required placeholder="Minimal 8 karakter" minlength="8" autocomplete="new-password">
                <button type="button" class="btn-eye" data-toggle="pnjPass" aria-label="Lihat kata sandi">
                  <svg class="ic"><use href="#i-eye"/></svg>
                </button>
              </div>
              <span class="err">Kata sandi minimal 8 karakter.</span>
            </div>

            <!-- Konfirmasi Password -->
            <div class="f">
              <label for="pnjPassConf">Konfirmasi Kata Sandi</label>
              <div class="input-with-icon pass-field">
                <svg class="input-ico ic"><use href="#i-lock"/></svg>
                <input type="password" name="password_confirmation" id="pnjPassConf" required placeholder="Ulangi kata sandi" autocomplete="new-password">
                <button type="button" class="btn-eye" data-toggle="pnjPassConf" aria-label="Lihat kata sandi">
                  <svg class="ic"><use href="#i-eye"/></svg>
                </button>
              </div>
              <span class="err">Konfirmasi kata sandi harus sama.</span>
            </div>
          </div>

          <!-- Persetujuan -->
          <div class="auth-terms">
            <label class="custom-chk">
              <input type="checkbox" name="terms_pnj" required>
              <span class="chk-box"></span>
              <span class="chk-text">Saya menyatakan bahwa saya adalah sivitas akademika aktif Politeknik Negeri Jakarta dan data yang saya isi adalah benar.</span>
            </label>
          </div>

          <!-- Aksi Submit -->
          <div class="actions reg-actions">
            <span class="hint">* Kolom wajib diisi</span>
            <button type="submit" class="btn main">
              <span>DAFTAR SEBAGAI SIVITAS PNJ</span>
              <svg class="ic"><use href="#i-arrow-r"/></svg>
            </button>
          </div>

        </form>
      </div>

      <!-- ============ FORM 2: MAHASISWA LUAR / EKSTERNAL ============ -->
      <div class="reg-pane" id="pane-ext" role="tabpanel" aria-labelledby="tab-btn-ext">
        <form class="shell reg-shell" id="f-register-ext" action="<?= BASE_URL ?>controllers/AuthController.php?action=storeExt" method="POST" novalidate>
          
          <!-- Alert Eksternal -->
          <div class="auth-notice ext-notice">
            <div class="notice-icon">
              <svg class="ic"><use href="#i-globe"/></svg>
            </div>
            <div class="notice-content">
              <b>Pendaftaran Akun Eksternal / Internasional</b>
              <p>Khusus mahasiswa luar negeri, mahasiswa perguruan tinggi lain, tamu, atau perwakilan mitra kerja sama yang akan berkegiatan di Politeknik Negeri Jakarta (Layanan Inbound).</p>
            </div>
          </div>

          <!-- Bagian 1: Data Identitas Luar -->
          <div class="sec">
            <span class="num">01</span>
            <h3>Identitas Mahasiswa / Tamu Luar</h3>
            <i class="dash"></i>
          </div>

          <div class="grid">
            <!-- Kategori Pendaftar -->
            <div class="f">
              <label for="extCat">Kategori Pendaftar</label>
              <select name="kategori_eksternal" id="extCat" required>
                <option value="">Pilih kategori…</option>
                <option value="international_student">Mahasiswa Asing / Internasional</option>
                <option value="national_student">Mahasiswa Luar PNJ (Domestik)</option>
                <option value="guest_lecturer">Dosen Tamu / Visiting Professor</option>
                <option value="researcher">Peneliti Luar / Mitra Riset</option>
                <option value="partner_delegate">Perwakilan Institusi Mitra</option>
                <option value="other">Lainnya</option>
              </select>
              <span class="err">Kategori pendaftar wajib dipilih.</span>
            </div>

            <!-- Nama Lengkap -->
            <div class="f">
              <label for="extNama">Nama Lengkap (Full Name as in Passport / ID)</label>
              <input type="text" name="nama" id="extNama" required placeholder="Contoh: Kenji Tanaka / John Doe">
              <span class="err">Nama lengkap wajib diisi.</span>
            </div>

            <!-- Asal Institusi / Universitas -->
            <div class="f">
              <label for="extInst">Asal Universitas / Institusi (Home University)</label>
              <input type="text" name="asal_instansi" id="extInst" required placeholder="Contoh: University of Tsukuba / ITB">
              <span class="err">Asal institusi wajib diisi.</span>
            </div>

            <!-- Negara Asal -->
            <div class="f">
              <label for="extCountry">Negara Asal (Country of Origin)</label>
              <input type="text" name="negara_asal" id="extCountry" required placeholder="Contoh: Japan / Malaysia / Indonesia">
              <span class="err">Negara asal wajib diisi.</span>
            </div>

            <!-- Nomor Paspor / KTP -->
            <div class="f">
              <label for="extIdNo">Nomor Paspor / Identitas Resmi (Passport / ID Number)</label>
              <input type="text" name="no_paspor" id="extIdNo" required placeholder="Contoh: TK1234567 atau NIK">
              <span class="err">Nomor paspor atau identitas wajib diisi.</span>
            </div>

            <!-- Nomor Telepon Internasional -->
            <div class="f">
              <label for="extPhone">Nomor Telepon / WhatsApp (Dengan Kode Negara)</label>
              <input type="tel" name="whatsapp" id="extPhone" required placeholder="+81 90 xxxx xxxx / +62 8xx..." inputmode="tel">
              <span class="err">Nomor telepon wajib diisi.</span>
            </div>

            <!-- Email Aktif -->
            <div class="f full">
              <label for="extEmail">Alamat Email Aktif (Active Email Address)</label>
              <input type="email" name="email" id="extEmail" required placeholder="name@domain.com" autocomplete="email">
              <span class="err">Email aktif wajib diisi dengan format yang benar.</span>
            </div>
          </div>

          <!-- Bagian 2: Kata Sandi -->
          <div class="sec" style="margin-top: 24px;">
            <span class="num">02</span>
            <h3>Keamanan Akun (Account Security)</h3>
            <i class="dash"></i>
          </div>

          <div class="grid">
            <!-- Password -->
            <div class="f">
              <label for="extPass">Kata Sandi (Password)</label>
              <div class="input-with-icon pass-field">
                <svg class="input-ico ic"><use href="#i-lock"/></svg>
                <input type="password" name="password" id="extPass" required placeholder="Minimal 8 karakter" minlength="8" autocomplete="new-password">
                <button type="button" class="btn-eye" data-toggle="extPass" aria-label="Lihat kata sandi">
                  <svg class="ic"><use href="#i-eye"/></svg>
                </button>
              </div>
              <span class="err">Kata sandi minimal 8 karakter.</span>
            </div>

            <!-- Konfirmasi Password -->
            <div class="f">
              <label for="extPassConf">Konfirmasi Kata Sandi (Confirm Password)</label>
              <div class="input-with-icon pass-field">
                <svg class="input-ico ic"><use href="#i-lock"/></svg>
                <input type="password" name="password_confirmation" id="extPassConf" required placeholder="Ulangi kata sandi" autocomplete="new-password">
                <button type="button" class="btn-eye" data-toggle="extPassConf" aria-label="Lihat kata sandi">
                  <svg class="ic"><use href="#i-eye"/></svg>
                </button>
              </div>
              <span class="err">Konfirmasi kata sandi harus sama.</span>
            </div>
          </div>

          <!-- Persetujuan -->
          <div class="auth-terms">
            <label class="custom-chk">
              <input type="checkbox" name="terms_ext" required>
              <span class="chk-box"></span>
              <span class="chk-text">I hereby declare that all information supplied is complete and true for the purpose of international programs and visits at Politeknik Negeri Jakarta.</span>
            </label>
          </div>

          <!-- Aksi Submit -->
          <div class="actions reg-actions">
            <span class="hint">* Kolom wajib diisi</span>
            <button type="submit" class="btn main">
              <span>DAFTAR SEBAGAI MAHASISWA LUAR</span>
              <svg class="ic"><use href="#i-arrow-r"/></svg>
            </button>
          </div>

        </form>
      </div>

      <!-- Bagian Bawah: Navigasi ke Login & Beranda -->
      <div class="auth-footer-bar" style="margin-top: 30px;">
        <p>Sudah memiliki akun terdaftar? <a href="#login" data-go="login" class="auth-action-link">Masuk ke Akun Anda</a></p>
        <a href="#home" data-go="home" class="auth-back-link">
          <span>← Kembali ke Beranda</span>
        </a>
      </div>

    </div>

  </div>

  <!-- Script Pengubah Formulir Berdasarkan Role Dropdown Status Sivitas -->
  <script>
    function toggleRegisterPnjRole(roleVal) {
      var mhsBox = document.getElementById('reg-fields-mahasiswa');
      var dsnBox = document.getElementById('reg-fields-dosen');
      var tdkBox = document.getElementById('reg-fields-tendik');
      var placeholder = document.getElementById('reg-role-placeholder');
      var secTitle = document.getElementById('reg-pnj-sec-title');
      if (!mhsBox || !dsnBox || !tdkBox) return;

      var validRoles = ['mahasiswa', 'dosen', 'tendik'];
      var hasValidRole = validRoles.indexOf(roleVal) !== -1;

      if (placeholder) {
        placeholder.style.display = hasValidRole ? 'none' : 'block';
      }

      var sections = {
        mahasiswa: mhsBox,
        dosen: dsnBox,
        tendik: tdkBox
      };

      Object.keys(sections).forEach(function(key) {
        var box = sections[key];
        var isActive = (key === roleVal);
        box.style.display = isActive ? 'grid' : 'none';
        var fields = box.querySelectorAll('input, select, textarea');
        fields.forEach(function(el) {
          el.disabled = !isActive;
          var fWrap = el.closest('.f');
          if (fWrap) fWrap.classList.remove('invalid');
        });
      });

      if (secTitle) {
        if (roleVal === 'mahasiswa') secTitle.textContent = 'Data Sivitas PNJ — Mahasiswa';
        else if (roleVal === 'dosen') secTitle.textContent = 'Data Sivitas PNJ — Dosen';
        else if (roleVal === 'tendik') secTitle.textContent = 'Data Sivitas PNJ — Tenaga Kependidikan';
        else secTitle.textContent = 'Data Sivitas PNJ';
      }
    }

    (function() {
      var sel = document.getElementById('pnjRole');
      if (sel) {
        sel.addEventListener('change', function() {
          toggleRegisterPnjRole(this.value);
        });
        toggleRegisterPnjRole(sel.value);
      }
    })();
  </script>
</section>

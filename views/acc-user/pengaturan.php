<?php
// Tab Pengaturan Akun & Keamanan untuk mengganti kata sandi, melihat status tautan SSO PNJ, dan mengatur preferensi notifikasi email
?>
<!-- ========================================================= -->
<!-- TAB 4: PENGATURAN AKUN & KEAMANAN                         -->
<!-- ========================================================= -->
<section id="pane-pengaturan" class="profile-pane" style="display:none;">
  <div class="shell">
    
    <!-- 04: Keamanan & Kata Sandi -->
    <div class="sec">
      <span class="num">04</span>
      <h3>Keamanan &amp; Kata Sandi</h3>
      <i class="dash"></i>
    </div>

    <form onsubmit="handlePasswordChange(event)" style="max-width:580px;">
      <div class="f" style="margin-bottom:14px;">
        <label for="oldPass">Kata Sandi Saat Ini <span style="color:var(--red)">*</span></label>
        <input type="password" id="oldPass" required placeholder="••••••••" autocomplete="current-password">
      </div>
      <div class="f" style="margin-bottom:14px;">
        <label for="newPass">Kata Sandi Baru <span style="color:var(--red)">*</span></label>
        <input type="password" id="newPass" required placeholder="Minimal 8 karakter (kombinasi huruf &amp; angka)" autocomplete="new-password">
      </div>
      <div class="f" style="margin-bottom:20px;">
        <label for="confirmPass">Ketik Ulang Kata Sandi Baru <span style="color:var(--red)">*</span></label>
        <input type="password" id="confirmPass" required placeholder="Ketik ulang kata sandi baru" autocomplete="new-password">
      </div>
      <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
        <button type="submit" class="btn main">
          <span>SIMPAN KATA SANDI BARU</span>
          <svg class="ic"><use href="#i-lock"/></svg>
        </button>
        <span style="font-size:12.5px;color:var(--muted);">Terakhir diperbarui: 3 bulan yang lalu</span>
      </div>
    </form>

    <!-- 05: Preferensi Notifikasi & Komunikasi -->
    <div class="sec" style="margin-top:42px;">
      <span class="num">05</span>
      <h3>Preferensi Notifikasi &amp; Komunikasi</h3>
      <i class="dash"></i>
    </div>

    <form onsubmit="saveNotificationPreferences(event)" style="max-width:640px;">
      <p style="font-size:13px;color:var(--muted);margin-bottom:18px;">Atur saluran komunikasi resmi untuk menerima update verifikasi berkas internasional, pengumuman seleksi, dan status dokumen.</p>
      
      <div style="display:grid;gap:14px;margin-bottom:22px;">
        <label class="custom-chk items-start">
          <input type="checkbox" id="chkNotifEmail" checked>
          <span class="chk-box"></span>
          <span class="chk-text">
            <b style="color:var(--t900);display:block;">Notifikasi Status Dokumen via Email</b>
            <span style="color:var(--muted);font-size:12.5px;display:block;margin-top:2px;">Kirim pembaruan status verifikasi formulir, LoA, dan penerbitan SP Setneg ke email utama Anda.</span>
          </span>
        </label>
        <label class="custom-chk items-start">
          <input type="checkbox" id="chkNotifWA" checked>
          <span class="chk-box"></span>
          <span class="chk-text">
            <b style="color:var(--t900);display:block;">Peringatan Cepat via WhatsApp</b>
            <span style="color:var(--muted);font-size:12.5px;display:block;margin-top:2px;">Terima peringatan mendesak jika berkas permohonan memerlukan perbaikan atau revisi dokumen dari validator KUI.</span>
          </span>
        </label>
        <label class="custom-chk items-start">
          <input type="checkbox" id="chkNotifNewsletter">
          <span class="chk-box"></span>
          <span class="chk-text">
            <b style="color:var(--t900);display:block;">Buletin Informasi Program &amp; Beasiswa Luar Negeri</b>
            <span style="color:var(--muted);font-size:12.5px;display:block;margin-top:2px;">Terima rilis informasi program pertukaran, IISMA, hibah riset internasional, dan konferensi universitas mitra.</span>
          </span>
        </label>
      </div>

      <button type="submit" class="btn main" style="padding:11px 22px;">
        <span>SIMPAN PREFERENSI NOTIFIKASI</span>
        <svg class="ic"><use href="#i-check"/></svg>
      </button>
    </form>

    <!-- 06: Sesi Login & Keamanan Perangkat -->
    <div class="sec" style="margin-top:42px;">
      <span class="num">06</span>
      <h3>Manajemen Sesi &amp; Keamanan Perangkat</h3>
      <i class="dash"></i>
    </div>

    <p style="font-size:13px;color:var(--muted);margin-bottom:18px;">Daftar peramban dan perangkat yang saat ini aktif terhubung ke akun I/O Service Anda. Segera akhiri sesi perangkat yang tidak Anda kenali.</p>

    <!-- Kartu Sesi Aktif -->
    <div style="display:grid;gap:12px;margin-bottom:20px;max-width:720px;">
      
      <!-- Sesi 1: Perangkat Ini -->
      <div class="session-card current">
        <div class="session-card-info">
          <div class="session-card-icon">
            <svg width="20" height="20" style="fill:none;stroke:currentColor;stroke-width:2"><use href="#i-laptop"/></svg>
          </div>
          <div>
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px;flex-wrap:wrap;">
              <b style="font-size:14px;color:var(--t900);">Google Chrome pada Windows 11 (Desktop)</b>
              <span class="st g-disetujui" style="font-size:10.5px;">SESI SAAT INI</span>
            </div>
            <p style="margin:0;font-size:12.5px;color:var(--muted);">Alamat IP: 127.0.0.1 (Localhost / Kampus PNJ) · Sesi Aktif</p>
          </div>
        </div>
        <div>
          <span style="font-size:12px;color:var(--t700);font-weight:700;">Perangkat Utama</span>
        </div>
      </div>

      <!-- Sesi 2: Perangkat Mobile (Simulasi) -->
      <div class="session-card">
        <div class="session-card-info">
          <div class="session-card-icon">
            <svg width="20" height="20" style="fill:none;stroke:currentColor;stroke-width:2"><use href="#i-phone"/></svg>
          </div>
          <div>
            <div style="display:flex;align-items:center;gap:8px;margin-bottom:3px;flex-wrap:wrap;">
              <b style="font-size:14px;color:var(--t900);">Safari Mobile pada iOS (iPhone)</b>
              <span class="st g-proses" style="font-size:10.5px;">TERAKHIR AKTIF</span>
            </div>
            <p style="margin:0;font-size:12.5px;color:var(--muted);">Alamat IP: 182.253.112.45 (Jakarta, ID) · 2 hari yang lalu</p>
          </div>
        </div>
        <div>
          <button type="button" class="btn ghost" style="padding:7px 14px;font-size:11.5px;" onclick="terminateSingleSession(this, 'Safari Mobile pada iOS')">Cabut Akses</button>
        </div>
      </div>

    </div>

    <!-- Tombol Manajemen Sesi -->
    <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;margin-bottom:36px;">
      <button type="button" class="btn ghost" onclick="logoutOtherSessions()" style="font-size:12px;">
        <span>KELUAR DARI SESI LAIN</span>
      </button>
      <button type="button" class="btn slate" onclick="alertLogout()" style="font-size:12px;">
        <span>KELUAR DARI SEMUA SESI</span>
      </button>
    </div>

    <!-- 07: Zona Berbahaya -->
    <div class="sec" style="margin-top:42px;">
      <span class="num" style="background:var(--red);">07</span>
      <h3 style="color:var(--red);">Zona Berbahaya &amp; Pengelolaan Akun</h3>
      <i class="dash" style="border-color:#F5C6CB;"></i>
    </div>

    <div class="danger-zone-box">
      <div class="danger-zone-info">
        <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
          <svg width="18" height="18" style="fill:none;stroke:var(--red);stroke-width:2;"><use href="#i-alert"/></svg>
          <h4 style="margin:0;">Penonaktifan Akun Pengguna</h4>
        </div>
        <p>Menonaktifkan akun akan menangguhkan sementara seluruh berkas permohonan internasional (Outbound / PDLN / Inbound) yang sedang berjalan di Kantor Urusan Internasional PNJ. Akun Anda tidak dapat digunakan untuk pengajuan baru sampai mengajukan pembukaan blokir ke admin KUI.</p>
      </div>
      <div>
        <button type="button" class="btn danger" onclick="handleDeactivateAccount()">
          <span>NONAKTIFKAN AKUN SAYA</span>
          <svg class="ic"><use href="#i-x"/></svg>
        </button>
      </div>
    </div>

  </div>
</section>

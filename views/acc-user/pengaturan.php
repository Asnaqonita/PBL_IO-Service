<!-- TAB 4: PENGATURAN AKUN & KEAMANAN -->
<section id="pane-pengaturan" class="profile-pane" style="display:none;">
  <div class="shell">
    <div class="sec">
      <span class="num">04</span>
      <h3>Keamanan &amp; Kata Sandi</h3>
      <i class="dash"></i>
    </div>

    <form onsubmit="handlePasswordChange(event)" style="max-width:540px;">
      <div class="f" style="margin-bottom:14px;">
        <label>Kata Sandi Saat Ini</label>
        <input type="password" id="oldPass" required placeholder="••••••••">
      </div>
      <div class="f" style="margin-bottom:14px;">
        <label>Kata Sandi Baru</label>
        <input type="password" id="newPass" required placeholder="Minimal 8 karakter">
      </div>
      <div class="f" style="margin-bottom:20px;">
        <label>Ketik Ulang Kata Sandi Baru</label>
        <input type="password" id="confirmPass" required placeholder="Ketik ulang kata sandi baru">
      </div>
      <button type="submit" class="btn main">
        <span>SIMPAN KATA SANDI BARU</span>
        <svg class="ic"><use href="#i-lock"/></svg>
      </button>
    </form>

    <div class="sec" style="margin-top:36px;">
      <span class="num">05</span>
      <h3>Preferensi Notifikasi &amp; Sesi</h3>
      <i class="dash"></i>
    </div>

    <div style="display:grid;gap:14px;max-width:540px;margin-bottom:24px;">
      <label class="custom-chk">
        <input type="checkbox" checked>
        <span class="chk-box"></span>
        <span class="chk-text">Kirim notifikasi status verifikasi ke email utama</span>
      </label>
      <label class="custom-chk">
        <input type="checkbox" checked>
        <span class="chk-box"></span>
        <span class="chk-text">Kirim notifikasi via WhatsApp untuk perubahan status pengajuan</span>
      </label>
    </div>

    <div style="padding-top:20px;border-top:1px dashed var(--t300);display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px;">
      <div>
        <b style="font-size:13.5px;color:var(--t900);display:block;">Sesi Aktif Perangkat</b>
        <span style="font-size:12.5px;color:var(--muted);">Terakhir masuk: Browser Desktop (Chrome) · IP: 127.0.0.1</span>
      </div>
      <button type="button" class="btn slate" onclick="alertLogout()">KELUAR DARI SEMUA SESI</button>
    </div>

  </div>
</section>

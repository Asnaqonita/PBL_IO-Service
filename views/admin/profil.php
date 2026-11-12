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
<!-- ===================================================================== -->
<!-- 8. TAB PROFIL (PROFIL PETUGAS & ADMIN KUI)                           -->
<!-- ===================================================================== -->
<section class="page" id="tab-profil">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Profil Admin</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Profil<em>Petugas KUI</em></h2>
        <p class="fsub">Informasi akun pengelola, identitas resmi petugas, jam layanan loket, serta hak akses sistem.</p>
      </div>
    </div>

    <div class="profile-grid">
      <!-- Kolom Kiri: Kartu Identitas Profil -->
      <div>
        <div class="shell" style="text-align:center;padding:32px 24px">
          <div class="avatar" style="width:90px;height:90px;font-size:36px;margin:0 auto 16px">A</div>
          <h3 style="font:700 24px/1.2 var(--serif);color:var(--t900)">Admin I/O PNJ</h3>
          <p style="font-size:14px;color:var(--t600);font-weight:600;margin-bottom:6px">Administrator Utama KUI</p>
          <span class="st g-disetujui" style="margin-bottom:18px">Status: Aktif</span>

          <div style="border-top:1px dashed var(--t300);padding-top:16px;text-align:left;font-size:13.5px">
            <div style="margin-bottom:10px">
              <span style="color:var(--muted);display:block;font-size:11.5px;text-transform:uppercase">NIP Petugas</span>
              <b style="color:var(--t900)">198506142010121003</b>
            </div>
            <div style="margin-bottom:10px">
              <span style="color:var(--muted);display:block;font-size:11.5px;text-transform:uppercase">Email Resmi</span>
              <b style="color:var(--t900)">admin.io@pnj.ac.id</b>
            </div>
            <div style="margin-bottom:10px">
              <span style="color:var(--muted);display:block;font-size:11.5px;text-transform:uppercase">Kantor Layanan</span>
              <b style="color:var(--t900)">Gedung Q Lt. 1, PNJ Depok</b>
            </div>
            <div>
              <span style="color:var(--muted);display:block;font-size:11.5px;text-transform:uppercase">Jam Operasional Loket</span>
              <b style="color:var(--t900)">Senin – Jumat (08.00 – 15.30 WIB)</b>
            </div>
          </div>
        </div>
      </div>

      <!-- Kolom Kanan: Pengaturan Akun & Hak Akses -->
      <div>
        <div class="shell" style="margin-bottom:24px">
          <div class="sec" style="margin-top:0">
            <span class="num">01</span>
            <h3>Perbarui Informasi Profil</h3>
            <span class="dash"></span>
          </div>
          <form onsubmit="event.preventDefault(); toast('Data profil admin berhasil diperbarui!');">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
              <div class="f">
                <label>Nama Lengkap Petugas</label>
                <input type="text" value="Admin I/O PNJ" required>
              </div>
              <div class="f">
                <label>NIP / Nomor Pegawai</label>
                <input type="text" value="198506142010121003" readonly style="background:#EBF5F5">
              </div>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">
              <div class="f">
                <label>Email Kontak Petugas</label>
                <input type="email" value="admin.io@pnj.ac.id" required>
              </div>
              <div class="f">
                <label>No. WhatsApp Layanan Loket</label>
                <input type="text" value="+62 812-3456-7890" required>
              </div>
            </div>
            <button type="submit" class="btn main" style="margin-top:8px">Simpan Perubahan Profil</button>
          </form>
        </div>

        <div class="shell">
          <div class="sec" style="margin-top:0">
            <span class="num">02</span>
            <h3>Wewenang &amp; Hak Akses Administrator</h3>
            <span class="dash"></span>
          </div>
          <ul style="list-style:none;display:grid;gap:10px;font-size:14.5px;color:var(--ink)">
            <li style="display:flex;align-items:center;gap:10px">
              <svg width="18" height="18" style="color:var(--t600)"><use href="#i-check"/></svg>
              <span>Verifikasi berkas persyaratan <b>Outbound</b> mahasiswa &amp; civitas.</span>
            </li>
            <li style="display:flex;align-items:center;gap:10px">
              <svg width="18" height="18" style="color:var(--t600)"><use href="#i-check"/></svg>
              <span>Validasi data paspor tamu &amp; mitra kerjasama <b>Inbound</b>.</span>
            </li>
            <li style="display:flex;align-items:center;gap:10px">
              <svg width="18" height="18" style="color:var(--t600)"><use href="#i-check"/></svg>
              <span>Pemeriksaan berkas izin Setneg &amp; rekomendasi <b>PDLN</b> dosen/tendik.</span>
            </li>
            <li style="display:flex;align-items:center;gap:10px">
              <svg width="18" height="18" style="color:var(--t600)"><use href="#i-check"/></svg>
              <span>Pengesahan status pengambilan dokumen fisik di meja <b>Loket KUI</b>.</span>
            </li>
            <li style="display:flex;align-items:center;gap:10px">
              <svg width="18" height="18" style="color:var(--t600)"><use href="#i-check"/></svg>
              <span>Kelola daftar tanya-jawab umum (<b>FAQ</b>) pada landing page publik.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

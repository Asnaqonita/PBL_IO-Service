<?php
// Pastikan BASE_URL sudah tersedia untuk tab pusat notifikasi dan pengiriman pesan broadcast admin
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
<!-- 9. TAB NOTIFIKASI (NOTIFIKASI MASUK & BROADCAST ADMIN)               -->
<!-- ===================================================================== -->
<section class="page" id="tab-notifikasi">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Notifikasi</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Pusat<em>Notifikasi</em></h2>
        <p class="fsub">Pemberitahuan aktivitas pengajuan terbaru dari pemohon dan pengiriman broadcast informasi loket.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px">Semua (3)</button>
        <button type="button" onclick="toast('Semua notifikasi telah ditandai dibaca');" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Tandai Sudah Dibaca</button>
      </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(340px,1fr));gap:24px;align-items:start">
      <!-- Daftar Notifikasi Masuk -->
      <div class="tbox">
        <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
          <div style="display:flex;align-items:center;gap:12px">
            <svg width="20" height="20" style="color:var(--t600)"><use href="#i-bell"/></svg>
            <h3 style="font:700 19px var(--serif);color:var(--t900)">Aktivitas Pengajuan Masuk</h3>
          </div>
          <span class="badge-count">3 Baru</span>
        </div>

        <div>
          <div class="notif-item">
            <span class="notif-dot"></span>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                <b style="color:var(--t900);font-size:15px">Pengajuan Outbound Baru</b>
                <small style="color:var(--muted);font-size:12px">10 menit lalu</small>
              </div>
              <p style="font-size:14px;color:var(--muted);margin-bottom:8px"><b>Asna Qonita</b> mengunggah permohonan Rekomendasi Paspor &amp; Visa ke Malaysia.</p>
              <button type="button" onclick="switchTab('outbound')" class="btn main" style="padding:4px 12px;font-size:11px">Lihat Berkas &rarr;</button>
            </div>
          </div>

          <div class="notif-item">
            <span class="notif-dot"></span>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                <b style="color:var(--t900);font-size:15px">Tamu Inbound Terdaftar</b>
                <small style="color:var(--muted);font-size:12px">1 jam lalu</small>
              </div>
              <p style="font-size:14px;color:var(--muted);margin-bottom:8px"><b>Kenji Takahashi</b> (NIT Gunma College) mengajukan agenda Kunjungan Riset Lab TIK.</p>
              <button type="button" onclick="switchTab('inbound')" class="btn ghost" style="padding:4px 12px;font-size:11px">Cek Agenda &rarr;</button>
            </div>
          </div>

          <div class="notif-item">
            <span class="notif-dot done"></span>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:4px">
                <b style="color:var(--t900);font-size:15px">Dokumen Fisik Diambil di Loket</b>
                <small style="color:var(--muted);font-size:12px">Hari ini, 09.30</small>
              </div>
              <p style="font-size:14px;color:var(--muted)">Surat Tugas &amp; Izin Setneg milik <b>Dr. Ir. Hendra Wijaya</b> telah diserahkan di loket.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Form Broadcast Pengumuman -->
      <div class="shell">
        <h3 style="font:700 24px var(--serif);color:var(--t900);margin-bottom:4px">Kirim Pengumuman / Broadcast</h3>
        <p style="font-size:13.5px;color:var(--muted);margin-bottom:20px">Pengumuman akan tampil di banner dashboard akun mahasiswa dan sivitas.</p>
        <form onsubmit="event.preventDefault(); this.reset(); toast('Pengumuman berhasil disiarkan ke seluruh akun!');">
          <div class="f">
            <label>Target Sasaran</label>
            <select required>
              <option value="all">Semua Pengguna Terdaftar</option>
              <option value="mhs">Mahasiswa PNJ Saja</option>
              <option value="sivitas">Sivitas Dosen &amp; Tendik Saja</option>
              <option value="eksternal">Pihak Eksternal Saja</option>
            </select>
          </div>
          <div class="f">
            <label>Judul Pengumuman</label>
            <input type="text" placeholder="Contoh: Penyesuaian Jam Layanan Loket..." required>
          </div>
          <div class="f">
            <label>Isi Pesan Pengumuman</label>
            <textarea placeholder="Tuliskan isi pengumuman atau instruksi untuk pemohon..." required></textarea>
          </div>
          <button type="submit" class="btn main" style="width:100%;margin-top:10px">Siarkan Pengumuman</button>
        </form>
      </div>
    </div>
  </div>
</section>

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
<!-- 3. TAB INBOUND (FITUR TAMU & MITRA INBOUND)                          -->
<!-- ===================================================================== -->
<section class="page" id="tab-inbound">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Inbound</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Data<em>Inbound</em></h2>
        <p class="fsub">Pengajuan pihak eksternal dan luar negeri untuk kunjungan, kolaborasi, atau kegiatan di PNJ.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px">Semua (3)</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Tamu Akademik</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Mitra Industri</button>
      </div>
    </div>

    <div class="tbox">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="sec" style="margin:0"><span class="num">02</span></div>
          <h3 style="font:700 19px var(--serif);color:var(--t900)">Daftar Tamu &amp; Mitra Inbound</h3>
        </div>
      </div>
      <div class="twrap">
        <table class="ptbl">
          <thead>
            <tr>
              <th>Nama Tamu &amp; Paspor</th>
              <th>Institusi &amp; Asal Negara</th>
              <th>Agenda di PNJ</th>
              <th>Jadwal Kunjungan</th>
              <th>Status</th>
              <th style="text-align:right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b style="color:var(--t900)">Kenji Takahashi</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">Paspor: TK8891201</small>
              </td>
              <td>NIT Gunma College (Jepang)</td>
              <td><b>Kunjungan Riset Lab TIK</b></td>
              <td>01 Des 2026</td>
              <td><span class="st g-proses">Baru Masuk</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Kenji Takahashi', 'Eksternal (Paspor: TK8891201 - Jepang)', 'Inbound', 'Kunjungan Riset Lab TIK', 'Jepang')" class="btn main" style="padding:6px 14px;font-size:11.5px">Periksa</button>
              </td>
            </tr>
            <tr>
              <td>
                <b style="color:var(--t900)">Sarah Jenkins, Ph.D.</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">Paspor: US4410982</small>
              </td>
              <td>University of Melbourne (Australia)</td>
              <td><b>Guest Lecture Energi Terbarukan</b></td>
              <td>15 Jan 2027</td>
              <td><span class="st g-disetujui">Disetujui ✓</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Sarah Jenkins, Ph.D.', 'Eksternal (Australia)', 'Inbound', 'Guest Lecture Energi Terbarukan', 'Australia')" class="btn ghost" style="padding:6px 14px;font-size:11.5px">Detail</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

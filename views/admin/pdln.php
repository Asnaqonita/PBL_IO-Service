<?php
// Pastikan BASE_URL sudah tersedia untuk tab daftar pengajuan PDLN di panel admin
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
<!-- 4. TAB PDLN (FITUR PENGAJUAN PERJALANAN DINAS LUAR NEGERI)            -->
<!-- ===================================================================== -->
<section class="page" id="tab-pdln">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>PDLN</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Data<em>PDLN</em></h2>
        <p class="fsub">Pengajuan Perjalanan Dinas Luar Negeri dosen &amp; tendik untuk seminar, studi banding, dan riset.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px">Semua (2)</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Seminar</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Riset &amp; Workshop</button>
      </div>
    </div>

    <div class="tbox">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="sec" style="margin:0"><span class="num">03</span></div>
          <h3 style="font:700 19px var(--serif);color:var(--t900)">Daftar Pengajuan &amp; Laporan PDLN</h3>
        </div>
      </div>
      <div class="twrap">
        <table class="ptbl">
          <thead>
            <tr>
              <th>Nama Dosen / Tendik &amp; NIP</th>
              <th>Unit Kerja</th>
              <th>Kegiatan PDLN</th>
              <th>Negara Tujuan</th>
              <th>Status</th>
              <th style="text-align:right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b style="color:var(--t900)">Dr. Ir. Hendra Wijaya</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">NIP: 197804122005011002</small>
              </td>
              <td>Jurusan Teknik Elektro</td>
              <td><b>Seminar Internasional IEEE</b></td>
              <td>Jerman</td>
              <td><span class="st g-proses">Proses TTD</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Dr. Ir. Hendra Wijaya', 'Sivitas Dosen (NIP: 19780412...)', 'PDLN', 'Seminar Internasional IEEE', 'Jerman')" class="btn main" style="padding:6px 14px;font-size:11.5px">Periksa</button>
              </td>
            </tr>
            <tr>
              <td>
                <b style="color:var(--t900)">Dr. Nurul Hidayati, M.T.</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">NIP: 198209152008122001</small>
              </td>
              <td>Jurusan Teknik Mesin</td>
              <td><b>Workshop Green Hydrogen Technology</b></td>
              <td>Jepang</td>
              <td><span class="st g-disetujui">SP Setneg Terbit ✓</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Dr. Nurul Hidayati, M.T.', 'Sivitas Dosen', 'PDLN', 'Workshop Green Hydrogen', 'Jepang')" class="btn ghost" style="padding:6px 14px;font-size:11.5px">Detail</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

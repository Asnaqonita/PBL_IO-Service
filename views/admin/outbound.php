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
<!-- 2. TAB OUTBOUND (FITUR PENGAJUAN OUTBOUND)                           -->
<!-- ===================================================================== -->
<section class="page" id="tab-outbound">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Outbound</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Data<em>Outbound</em></h2>
        <p class="fsub">Daftar civitas PNJ yang mengurus paspor, visa, dan surat izin keluar negeri.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px">Semua (5)</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Paspor</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Visa</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Surat Izin LN</button>
      </div>
    </div>

    <div class="tbox">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="sec" style="margin:0"><span class="num">01</span></div>
          <h3 style="font:700 19px var(--serif);color:var(--t900)">Daftar Pengajuan Outbound Masuk</h3>
        </div>
      </div>
      <div class="twrap">
        <table class="ptbl">
          <thead>
            <tr>
              <th>Nama &amp; NIM</th>
              <th>Jurusan / Prodi</th>
              <th>Keperluan Dokumen</th>
              <th>Negara Tujuan</th>
              <th>Status</th>
              <th style="text-align:right">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b style="color:var(--t900)">Asna Qonita</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">2507411018</small>
              </td>
              <td>TIK / D4 Teknik Informatika</td>
              <td><b>Rekomendasi Paspor &amp; Visa Exchange</b></td>
              <td>Malaysia</td>
              <td><span class="st g-proses">Sedang Dicek</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Asna Qonita', 'Mahasiswa PNJ (NIM: 2507411018)', 'Outbound', 'Rekomendasi Paspor &amp; Visa Exchange', 'Malaysia')" class="btn main" style="padding:6px 14px;font-size:11.5px">Periksa</button>
              </td>
            </tr>
            <tr>
              <td>
                <b style="color:var(--t900)">Reyfan Okta Firdaus</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">2507411022</small>
              </td>
              <td>TIK / D4 Teknik Informatika</td>
              <td><b>Surat Izin Keluar Negeri (Lomba)</b></td>
              <td>Singapura</td>
              <td><span class="st g-ditolak">Perlu Perbaikan</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Reyfan Okta Firdaus', 'Mahasiswa PNJ (NIM: 2507411022)', 'Outbound', 'Surat Izin Keluar Negeri', 'Singapura')" class="btn main" style="padding:6px 14px;font-size:11.5px">Periksa</button>
              </td>
            </tr>
            <tr>
              <td>
                <b style="color:var(--t900)">Annisa Azzahra</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">2507411004</small>
              </td>
              <td>TIK / D4 Teknik Informatika</td>
              <td><b>Pengantar Visa Studi</b></td>
              <td>Korea Selatan</td>
              <td><span class="st g-disetujui">Siap Diambil ✓</span></td>
              <td style="text-align:right">
                <button type="button" onclick="openCheckModal('Annisa Azzahra', 'Mahasiswa PNJ (NIM: 2507411004)', 'Outbound', 'Pengantar Visa Studi', 'Korea Selatan')" class="btn ghost" style="padding:6px 14px;font-size:11.5px">Detail</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

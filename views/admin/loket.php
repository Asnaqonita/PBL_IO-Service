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
<!-- 7. TAB LOKET (FITUR LOKET PENGAMBILAN DOKUMEN FISIK)                   -->
<!-- ===================================================================== -->
<section class="page" id="tab-loket">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Loket</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Loket<em>Pengambilan Dokumen</em></h2>
        <p class="fsub">Manajemen pengambilan dokumen fisik yang telah dicetak, ditandatangani, dan siap diambil di loket KUI.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" class="btn main" style="padding:8px 16px;font-size:11.5px">Semua (2)</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Siap Diambil</button>
        <button type="button" class="btn ghost" style="padding:8px 16px;font-size:11.5px">Sudah Diambil</button>
      </div>
    </div>

    <div class="tbox">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="sec" style="margin:0"><span class="num">&#10003;</span></div>
          <h3 style="font:700 19px var(--serif);color:var(--t900)">Daftar Dokumen Fisik di Meja Loket</h3>
        </div>
      </div>
      <div class="twrap">
        <table class="ptbl">
          <thead>
            <tr>
              <th>Nama Pemohon</th>
              <th>Surat yang Selesai</th>
              <th>Status Ambil Fisik</th>
              <th style="text-align:right">Aksi Petugas Loket</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <b style="color:var(--t900)">Annisa Azzahra</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">NIM: 2507411004 (TIK)</small>
              </td>
              <td><b>Surat Pengantar Visa Studi (Korea Selatan)</b></td>
              <td><span class="st g-proses status-ambil" data-status="pending">Belum Diambil</span></td>
              <td style="text-align:right">
                <button type="button" onclick="toggleAmbil(this)" class="btn main" style="padding:6px 14px;font-size:11.5px">Tandai Sudah Diambil</button>
              </td>
            </tr>
            <tr>
              <td>
                <b style="color:var(--t900)">Dr. Ir. Hendra Wijaya</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">NIP: 197804122005011002</small>
              </td>
              <td><b>Surat Tugas &amp; Izin Setneg PDLN Jerman</b></td>
              <td><span class="st g-disetujui status-ambil" data-status="done">Sudah Diambil ✓</span></td>
              <td style="text-align:right">
                <button type="button" onclick="toggleAmbil(this)" class="btn ghost" style="padding:6px 14px;font-size:11.5px">Batal Ambil</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

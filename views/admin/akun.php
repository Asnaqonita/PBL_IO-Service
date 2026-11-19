<?php
// Pastikan BASE_URL sudah tersedia untuk tab daftar akun pengguna terdaftar di panel admin
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
<!-- 5. TAB DATA AKUN (DATA PROFIL & PENGGUNA TERDAFTAR)                   -->
<!-- ===================================================================== -->
<section class="page" id="tab-akun">
  <div class="wrap">
    <div class="crumb"><a href="#" onclick="switchTab('dashboard'); return false;">Beranda</a> / <b>Data Akun</b></div>
    <div class="fhead">
      <div>
        <h2 class="ftitle">Data<em>Akun Pengguna</em></h2>
        <p class="fsub">Daftar pengguna berdasarkan 3 jenis profil: Mahasiswa PNJ, Sivitas (Dosen/Tendik), dan Pihak Eksternal.</p>
      </div>
      <div style="display:flex;gap:8px;flex-wrap:wrap">
        <button type="button" onclick="filterUser('all')" class="btn main filter-user-btn" data-role="all" style="padding:8px 16px;font-size:11.5px">Semua</button>
        <button type="button" onclick="filterUser('mhs')" class="btn ghost filter-user-btn" data-role="mhs" style="padding:8px 16px;font-size:11.5px">Mahasiswa PNJ</button>
        <button type="button" onclick="filterUser('sivitas')" class="btn ghost filter-user-btn" data-role="sivitas" style="padding:8px 16px;font-size:11.5px">Sivitas (NIP)</button>
        <button type="button" onclick="filterUser('eksternal')" class="btn ghost filter-user-btn" data-role="eksternal" style="padding:8px 16px;font-size:11.5px">Eksternal</button>
      </div>
    </div>

    <div class="tbox">
      <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 22px;border-bottom:1px dashed var(--t300)">
        <div style="display:flex;align-items:center;gap:12px">
          <div class="sec" style="margin:0"><span class="num">04</span></div>
          <h3 style="font:700 19px var(--serif);color:var(--t900)">Tabel Pengguna Terdaftar</h3>
        </div>
      </div>
      <div class="twrap">
        <table class="ptbl">
          <thead>
            <tr>
              <th>Nama Lengkap &amp; Email</th>
              <th>Kategori Profil</th>
              <th>Identitas Resmi (NIM / NIP / Paspor)</th>
              <th>Jurusan / Unit / Instansi</th>
            </tr>
          </thead>
          <tbody>
            <tr class="u-row" data-role="mhs">
              <td>
                <b style="color:var(--t900)">Asna Qonita</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">asna.qonita.tik25@pnj.ac.id</small>
              </td>
              <td><span class="st g-disetujui">Mahasiswa PNJ</span></td>
              <td><b>NIM: 2507411018</b></td>
              <td>Teknik Informatika &amp; Komputer</td>
            </tr>
            <tr class="u-row" data-role="sivitas">
              <td>
                <b style="color:var(--t900)">Dr. Ir. Hendra Wijaya</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">hendra.wijaya@pnj.ac.id</small>
              </td>
              <td><span class="st g-proses">Sivitas PNJ</span></td>
              <td><b>NIP: 197804122005011002</b></td>
              <td>Jurusan Teknik Elektro</td>
            </tr>
            <tr class="u-row" data-role="eksternal">
              <td>
                <b style="color:var(--t900)">Kenji Takahashi</b>
                <small style="display:block;color:var(--muted);font-size:12.5px">kenji@gunma.jp</small>
              </td>
              <td><span class="st g-ditolak">Eksternal</span></td>
              <td><b>Paspor: TK8891201 (Jepang)</b></td>
              <td>NIT Gunma College</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

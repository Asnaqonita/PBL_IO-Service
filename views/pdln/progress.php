<!-- ===== 3. PROGRESS ===== -->
<?php
// Kalau daftar pengajuan PDLN belum dikirim dari controller, ambil langsung dari database sesuai id_user yang sedang login
if (!isset($listPengajuanPdln)) {
    $listPengajuanPdln = [];
    $currUid = $_SESSION['user']['id_user'] ?? $_SESSION['id_user'] ?? null;
    if ($currUid) {
        try {
            require_once __DIR__ . '/../../model/PdlnModel.php';
            $pdlnMdl = new PdlnModel();
            $listPengajuanPdln = $pdlnMdl->getPengajuanByUser($currUid);
        } catch (Exception $e) {
            $listPengajuanPdln = [];
        }
    }
}
?>
<div class="psub" id="psub-progress">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#pdln" data-go="pdln">PDLN</a> / <b data-i18n="s_progress">Progress</b></div>
    <div class="fhead">
      <h2 class="ftitle">Progress<em data-i18n="pr_em">Pengajuan</em></h2>
      <p class="fsub" data-i18n="pr_sub">Pantau status, persentase progres, dan catatan verifikasi dari Admin.</p>
    </div>

    <div class="flt">
      <div class="f fs"><span class="si"><svg class="ic"><use href="#i-search"/></svg></span><input type="search" id="fq" autocomplete="off" placeholder="Cari nama, kegiatan, atau negara tujuan..." data-i18n-ph="f_ph" aria-label="Cari"></div>
      <div class="f"><select id="fjab" aria-label="Jabatan">
        <option value="" data-i18n="f_jab">Semua Jabatan</option>
        <option value="dosen" data-i18n="j_dosen">Dosen</option>
        <option value="tendik" data-i18n="j_tendik">Tenaga Kependidikan</option>
        <option value="pimpinan" data-i18n="j_pimp">Pimpinan</option>
        <option value="mahasiswa" data-i18n="j_mhs">Mahasiswa</option></select></div>
      <div class="f"><select id="fst" aria-label="Status">
        <option value="" data-i18n="f_st">Semua Status</option>
        <option value="proses" data-i18n="f_st_proses">Sedang Proses (semua tahap)</option>
        <option value="baru" data-i18n="st_baru">Baru Diajukan (0%)</option>
        <option value="verifikasi" data-i18n="st_verifikasi">Verifikasi Dokumen (20%)</option>
        <option value="proses_kampus" data-i18n="st_proses_kampus">Proses Pimpinan PNJ (40%)</option>
        <option value="setneg" data-i18n="st_setneg">Menunggu Setneg (60%)</option>
        <option value="proses_akhir" data-i18n="st_proses_akhir">Penerbitan Izin (80%)</option>
        <option value="disetujui" data-i18n="st_disetujui">Disetujui (100%)</option>
        <option value="ditolak" data-i18n="st_ditolak">Ditolak</option></select></div>
      <div class="f"><select id="fso" aria-label="Urutkan">
        <option value="new" data-i18n="so_new">Terbaru</option>
        <option value="old" data-i18n="so_old">Terlama</option>
        <option value="az" data-i18n="so_az">Nama kegiatan A–Z</option>
        <option value="prog" data-i18n="so_prog">Progres tertinggi</option></select></div>
      <button type="button" class="btn ghost" id="fre" data-i18n="f_reset">Reset</button>
    </div>

    <div class="tbox">
      <div class="twrap">
        <table class="ptbl">
          <thead><tr>
            <th data-i18n="th_no">No</th><th data-i18n="th_keg">Nama Kegiatan</th><th data-i18n="th_pes">Nama Peserta</th><th data-i18n="th_jab">Jabatan</th>
            <th data-i18n="th_tmp">Tempat Kegiatan</th><th data-i18n="th_aju">Diajukan</th><th data-i18n="th_st">Status</th><th data-i18n="th_prog">Progress</th><th data-i18n="th_cat">Catatan / Aksi</th>
          </tr></thead>
          <tbody id="ptb"></tbody>
        </table>
      </div>
      <div class="empty" id="pEmpty" hidden>
        <b data-i18n="emp_t">Tidak ada pengajuan yang cocok</b>
        <p data-i18n="emp_d">Ubah kata kunci atau filter, lalu coba lagi.</p>
        <button type="button" class="btn ghost" id="fre2" data-i18n="f_reset">Reset</button>
      </div>
      <div class="tfoot"><span id="pInfo"></span><div class="pager" id="pPager"></div></div>
    </div>
  </div>
</div>
<script>
  // Kirim data pengajuan PDLN asli dari database ke JavaScript supaya tabel progress, filter, dan pagination langsung memakainya
  window.PDLN_PROGRESS_DATA = <?= json_encode(array_values($listPengajuanPdln), JSON_UNESCAPED_UNICODE) ?>;
</script>

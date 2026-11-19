<?php
// Panel ringkasan (Dashboard) modul PDLN yang menampilkan kartu aksi cepat, angka statistik status pengajuan, dan daftar aktivitas terbaru
?>
<!-- ===== 1. DASHBOARD PDLN ===== -->
<div class="psub active" id="psub-dash">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <b>PDLN</b></div>
    <div class="fhead">
      <h2 class="ftitle">Dashboard<em>PDLN</em></h2>
      <p class="fsub" data-i18n="d_sub">Ringkasan pengajuan Perjalanan Dinas Luar Negeri PNJ: status, negara tujuan, dan aktivitas terbaru.</p>
    </div>

    <div class="acts">
      <article class="acard first">
        <span class="ai"><svg class="ic"><use href="#i-send"/></svg></span>
        <h3 data-i18n="a1_t">Ajukan PDLN</h3>
        <p data-i18n="a1_d">Isi data kegiatan, peserta, dan unggah dokumen pendukung dalam satu form terpadu.</p>
        <button type="button" class="btn main" data-go="pdln/input" data-i18n="s_input">Input Pengajuan</button>
      </article>
      <article class="acard">
        <span class="ai"><svg class="ic"><use href="#i-pie"/></svg></span>
        <h3 data-i18n="a2_t">Cek Progress</h3>
        <p data-i18n="a2_d">Lihat status, persentase progres, dan catatan admin dari pengajuan yang sudah masuk.</p>
        <button type="button" class="btn ghost" data-go="pdln/progress" data-i18n="a2_b">Lihat Daftar</button>
      </article>
      <article class="acard">
        <span class="ai"><svg class="ic"><use href="#i-doc"/></svg></span>
        <h3 data-i18n="s_laporan">Laporan Kegiatan</h3>
        <p data-i18n="a3_d">Kegiatan sudah selesai? Unggah laporan dan dokumentasi agar pengajuan dinyatakan tuntas.</p>
        <button type="button" class="btn ghost" data-go="pdln/laporan" data-i18n="a3_b">Isi Laporan</button>
      </article>
    </div>

    <div class="kpis">
      <div class="kpi"><span class="k-l" data-i18n="kp1_l">Total SP Setneg</span><b class="k-v" id="kp-setneg">0</b><span class="k-s" data-i18n="kp1_s">SP Setneg terbit</span></div>
      <div class="kpi"><span class="k-l" data-i18n="kp2_l">Total Paspor Dinas</span><b class="k-v" id="kp-paspor">0</b><span class="k-s" data-i18n="kp2_s">Diproses & selesai</span></div>
      <div class="kpi"><span class="k-l" data-i18n="kp3_l">Total Laporan</span><b class="k-v" id="kp-laporan">0</b><span class="k-s" data-i18n="kp3_s">Laporan diterima</span></div>
    </div>

    <div class="panels">
      <section class="panel"><h3 data-i18n="p_status">Distribusi Status</h3><div id="donutBox"></div></section>
      <section class="panel"><h3 data-i18n="p_neg">Top Negara Tujuan</h3><div id="rankBox"></div></section>
      <section class="panel"><h3 data-i18n="p_hl">Highlight Bulan Ini</h3><div id="hlBox"></div></section>
    </div>
  </div>

  <!-- ===== PANDUAN & TEMPLATE ===== -->
  <section class="pinfo" id="pinfo">
    <div class="pinfo-in">
      <?php include __DIR__ . '/panduan.php'; ?>
      <?php include __DIR__ . '/template.php'; ?>
    </div>
  </section>
</div>

<!-- ===== 4. LAPORAN KEGIATAN ===== -->
<div class="psub" id="psub-laporan">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#pdln" data-go="pdln">PDLN</a> / <b data-i18n="s_laporan">Laporan Kegiatan</b></div>
    <div class="fhead">
      <h2 class="ftitle">Form<em data-i18n="lp_em">Laporan</em></h2>
      <div class="progress"><span><i></i></span><b>0%</b></div>
      <p class="fsub" data-i18n="lp_sub">Laporkan hasil kegiatan PDLN yang sudah disetujui dan telah dilaksanakan.</p>
    </div>

    <form class="shell" id="f-laporan" action="index.php?url=pdln/laporan_store" method="POST" enctype="multipart/form-data" data-mod="LAPORAN" data-ok-t="okT_lap" data-ok-n="okN_lap" data-ok-go="pdln" data-ok-gok="goDash" data-ok-ak="againRep" novalidate>
      <div class="sec"><span class="num">01</span><h3 data-i18n="lp_s1">Data Laporan</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f full"><label data-i18n="lp_rel">Pengajuan Terkait</label><select id="lpRel" name="pengajuan_terkait" required></select></div>
        <div class="f full"><label data-i18n="lp_email">Email Pelapor</label><input type="email" name="email_pelapor" required placeholder="contoh@pnj.ac.id" data-auto="email"></div>
        <div class="f"><label data-i18n="lp_mulai">Tanggal Pelaksanaan Mulai</label><input type="date" name="tgl_pelaksanaan_mulai" required data-role="start"></div>
        <div class="f"><label data-i18n="lp_selesai">Tanggal Pelaksanaan Selesai</label><input type="date" name="tgl_pelaksanaan_selesai" required data-role="end"></div>
        <div class="f full"><label data-i18n="lp_hasil">Ringkasan Hasil Kegiatan</label><textarea name="ringkasan_hasil" required placeholder="Jelaskan kegiatan yang dilaksanakan dan hasil utamanya..." data-i18n-ph="lp_ph1"></textarea></div>
        <div class="f full"><label data-i18n="lp_capaian">Capaian & Manfaat bagi PNJ</label><textarea name="capaian_manfaat" required placeholder="Tuliskan capaian, kerja sama, atau manfaat yang diperoleh..." data-i18n-ph="lp_ph2"></textarea></div>
      </div>

      <div class="sec"><span class="num">02</span><h3 data-i18n="s_upload2">Upload Dokumen</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><div class="lrow"><label data-i18n="lp_d_lap">Laporan Kegiatan</label><button type="button" class="tpl" data-tpl="laporan" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="laporan_kegiatan" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="lp_d_doc">Dokumentasi Kegiatan (foto)</label></div><div class="drop"><input type="file" name="dokumentasi" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="lp_d_sert">Sertifikat / Bukti Kehadiran</label><span class="bdg" data-i18n="b_opt">Opsional</span></div><div class="drop"><input type="file" name="sertifikat" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="lp_d_biaya">Bukti Pertanggungjawaban Biaya</label><span class="bdg" data-i18n="b_opt">Opsional</span></div><div class="drop"><input type="file" name="bukti_biaya" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
      </div>

      <div class="actions">
        <span class="hint" data-i18n="hint_req">* wajib diisi</span>
        <button type="button" class="btn ghost" data-reset data-i18n="batal">Batal</button>
        <button type="submit" class="btn main" data-i18n="kirim_lap">Kirim Laporan</button>
      </div>
    </form>
  </div>
</div>

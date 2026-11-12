<!-- ===== 2. INPUT PENGAJUAN (form PDLN) ===== -->
<div class="psub" id="psub-input">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#pdln" data-go="pdln">PDLN</a> / <b data-i18n="s_input">Input Pengajuan</b></div>
    <div class="fhead">
      <h2 class="ftitle">Form<em>PDLN</em></h2>
      <div class="progress"><span><i></i></span><b>0%</b></div>
      <p class="fsub" data-i18n="pdln_sub">Pengajuan Perjalanan Dinas Luar Negeri. Isi data kegiatan, unggah dokumen, lalu tambahkan seluruh peserta.</p>
    </div>

    <form class="shell" id="f-pdln" action="index.php?url=pdln/store" method="POST" enctype="multipart/form-data" data-mod="PDLN" data-ok-n="okN_pdln" data-ok-go="pdln/progress" data-ok-gok="goProg" novalidate>
      <div class="sec"><span class="num">01</span><h3 data-i18n="s_data">Data Kegiatan</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f full"><label data-i18n="l_email">Email Pengaju</label><input type="email" name="email_pengaju" required placeholder="contoh@pnj.ac.id" data-auto="email"></div>
        <div class="f"><label data-i18n="l_jenis">Jenis Kegiatan</label>
          <select name="jenis_kegiatan" required>
            <option value="" data-i18n="sel_jenis">Pilih jenis kegiatan</option>
            <option data-i18n="k_studi">Studi Banding / Kunjungan</option>
            <option data-i18n="k_konf">Seminar / Konferensi</option>
            <option data-i18n="k_latih">Pelatihan / Workshop</option>
            <option data-i18n="k_riset">Penelitian / Riset Kolaborasi</option>
            <option data-i18n="k_tukar">Pertukaran Dosen / Mahasiswa</option>
            <option data-i18n="k_lain">Lainnya</option>
          </select></div>
        <div class="f"><label data-i18n="l_nama_keg">Nama Kegiatan</label><input type="text" name="nama_kegiatan" required placeholder="Nama konferensi, seminar, dsb." data-i18n-ph="ph_namakeg" data-k="kegiatan"></div>
        <div class="f"><label data-i18n="l_tgl_mulai">Tanggal Kegiatan Mulai</label><input type="date" name="tgl_mulai" required data-role="start"></div>
        <div class="f"><label data-i18n="l_tgl_selesai">Tanggal Kegiatan Selesai</label><input type="date" name="tgl_selesai" required data-role="end"></div>
        <div class="f"><label data-i18n="l_inst">Nama Institusi Tujuan</label><input type="text" name="institusi_tujuan" required placeholder="Nama universitas / lembaga" data-i18n-ph="ph_inst"></div>
        <div class="f"><label data-i18n="l_tempat">Tempat Kegiatan (Kota, Negara)</label><input type="text" name="tempat_kegiatan" required placeholder="Contoh: Tokyo, Jepang" data-i18n-ph="ph_tempat" data-k="tempat"></div>
        <div class="f full"><label data-i18n="l_rtl">Rencana Tindak Lanjut</label><textarea name="rencana_tindak_lanjut" required placeholder="Tuliskan rencana tindak lanjut pasca kegiatan..." data-i18n-ph="ph_rtl"></textarea></div>
      </div>

      <div class="sec"><span class="num">02</span><h3 data-i18n="s_upload">Upload Dokumen PDLN</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><div class="lrow"><label data-i18n="d_tor">TOR Kegiatan</label><button type="button" class="tpl" data-tpl="tor" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="tor" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_memo">Memo Persetujuan</label><button type="button" class="tpl" data-tpl="memo" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="memo" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_tugas">Surat Tugas</label><button type="button" class="tpl" data-tpl="tugas" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="surat_tugas" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_undangan">Undangan</label><button type="button" class="tpl" data-tpl="undangan" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="undangan" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_jadwal">Jadwal Kegiatan</label><button type="button" class="tpl" data-tpl="jadwal" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="jadwal" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_setneg">Surat Persetujuan Setneg</label><button type="button" class="tpl" data-tpl="setneg" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="setneg" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_relevansi">Surat Keterangan Relevansi</label><button type="button" class="tpl" data-tpl="relevansi" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="relevansi" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_biaya">Surat Pernyataan Pembiayaan</label><button type="button" class="tpl" data-tpl="pembiayaan" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="pembiayaan" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_mou">Draft MoU / MoA</label><span class="bdg" data-i18n="b_opt">Opsional</span><button type="button" class="tpl" data-tpl="mou" data-i18n="b_tpl">Template</button></div><div class="drop"><input type="file" name="mou" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_brosur">Brosur</label><span class="bdg" data-i18n="b_opt">Opsional</span></div><div class="drop"><input type="file" name="brosur" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_regis">Bukti Registrasi</label><span class="bdg" data-i18n="b_opt">Opsional</span></div><div class="drop"><input type="file" name="regis" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="d_clear">Clearance Letter</label><span class="bdg" data-i18n="b_ada">Jika ada</span></div><div class="drop"><input type="file" name="clear" accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
      </div>

      <div class="sec"><span class="num">03</span><h3 data-i18n="s_peserta">Data Peserta Kegiatan</h3><i class="dash"></i></div>
      <div class="plist" id="pl-pdln" data-variant="pdln"></div>
      <div class="more">
        <span class="ask" data-i18n="p_more">Apakah ada peserta lainnya?</span>
        <button type="button" class="btn ghost" id="add-pdln" data-i18n="p_add">+ Tambah Peserta</button>
      </div>

      <div class="actions">
        <span class="hint" data-i18n="hint_req">* wajib diisi</span>
        <button type="button" class="btn ghost" data-reset data-i18n="batal">Batal</button>
        <button type="submit" class="btn main" data-i18n="kirim">Kirim Pengajuan</button>
      </div>
    </form>
  </div>
</div>

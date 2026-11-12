<section class="page" id="page-outbound">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#outbound" data-go="outbound">Outbound</a> / <b>Form</b></div>
    <div class="fhead">
      <h2 class="ftitle">Form<em>Outbound</em></h2>
      <div class="progress"><span><i></i></span><b>0%</b></div>
      <p class="fsub" data-i18n="ob_sub">Pengurusan dokumen yang memerlukan izin negara untuk civitas PNJ: paspor, visa, dan surat izin keluar negeri.</p>
    </div>
    <form class="shell" id="f-outbound" action="index.php?url=outbound/store" method="POST" enctype="multipart/form-data" data-mod="OUTBOUND" novalidate>
      <div class="sec"><span class="num">01</span><h3 data-i18n="o_s1">Data Mahasiswa</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><label data-i18n="o_nama">Nama Lengkap</label><input type="text" name="nama" required data-auto="name"></div>
        <div class="f"><label data-i18n="o_nim">NIM</label><input type="text" name="nim" required inputmode="numeric"></div>
        <div class="f"><label data-i18n="o_jur">Jurusan</label><select name="jurusan" required><option value="" data-i18n="sel_pilih">Pilih…</option><option data-i18n="u_sipil">Teknik Sipil</option><option data-i18n="u_mesin">Teknik Mesin</option><option data-i18n="u_elek">Teknik Elektro</option><option data-i18n="u_tik">Teknik Informatika dan Komputer</option><option data-i18n="u_akun">Akuntansi</option><option data-i18n="u_niaga">Administrasi Niaga</option><option data-i18n="u_grafika">Teknik Grafika dan Penerbitan</option><option data-i18n="u_pasca">Pascasarjana</option></select></div>
        <div class="f"><label data-i18n="o_prodi">Program Studi</label><input type="text" name="prodi" required placeholder="Contoh: Teknik Informatika" data-i18n-ph="o_ph_prodi"></div>
        <div class="f"><label data-i18n="o_kelas">Kelas</label><input type="text" name="kelas" required placeholder="Contoh: 5A" data-i18n-ph="o_ph_kelas"></div>
        <div class="f"><label data-i18n="o_ipk">IPK Terakhir</label><input type="text" name="ipk" required placeholder="0.00 – 4.00" inputmode="decimal" data-max="4"></div>
        <div class="f full"><div class="lrow"><label data-i18n="o_ipkup">Upload Bukti Transkrip</label></div><div class="drop"><input type="file" name="bukti_transkrip" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><label data-i18n="o_wa">Nomor WhatsApp</label><input type="tel" name="whatsapp" required placeholder="08xx xxxx xxxx" inputmode="tel"></div>
        <div class="f"><label data-i18n="o_email">Email PNJ</label><input type="email" name="email_pnj" required placeholder="nama@pnj.ac.id" data-auto="email"></div>
      </div>
      <div class="sec"><span class="num">02</span><h3 data-i18n="o_s2">Data Program</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><label data-i18n="o_kat">Kategori Program</label><select name="kategori_program" required><option value="" data-i18n="o_kat_pilih">Pilih kategori program</option><option>IISMA</option><option data-i18n="o_k_ex">Exchange/Student Mobility</option><option>Short Course</option><option>Joint Degree</option><option data-i18n="o_k_int">Internship/Magang Internasional</option></select></div>
        <div class="f"><label data-i18n="o_univ">Universitas / Perusahaan Tujuan</label><input type="text" name="univ_tujuan" required placeholder="Nama universitas atau perusahaan" data-i18n-ph="o_ph_univ"></div>
        <div class="f"><label data-i18n="l_negara">Negara Tujuan</label><input type="text" name="negara_tujuan" required placeholder="Contoh: Jepang" data-i18n-ph="ph_negara"></div>
        <div class="f"><label data-i18n="o_mulai">Durasi Program: Tanggal Mulai</label><input type="date" name="tgl_mulai" required data-role="start"></div>
        <div class="f"><label data-i18n="o_selesai">Durasi Program: Tanggal Selesai</label><input type="date" name="tgl_selesai" required data-role="end"></div>
      </div>
      <div class="sec"><span class="num">03</span><h3 data-i18n="s_upload2">Upload Dokumen</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><div class="lrow"><label data-i18n="o_d_trans">Transkrip Nilai Akademik</label></div><div class="drop"><input type="file" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="o_d_rek">Surat Rekomendasi dari Jurusan / Kaprodi</label></div><div class="drop"><input type="file" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="o_d_ortu">Surat Izin Orang Tua / Wali</label></div><div class="drop"><input type="file" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="o_d_pasp">Paspor Aktif</label></div><div class="drop"><input type="file" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="o_d_toefl">Sertifikat TOEFL/IELTS</label></div><div class="drop"><input type="file" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
      </div>
      <div class="sec"><span class="num">04</span><h3 data-i18n="s_upload2">Jenis Layanan</h3><i class="dash"></i></div>
      <div class="grid">
      <div class="f" style="margin-bottom: 20px;">
          <select name="jenis_layanan" required class="input-control" style="width: 100%; background: #ffffff;">
            <option value="" disabled selected>Pilih Jenis Layanan</option>
            <option value="Surat Rekomendasi Mobilitas">Surat Rekomendasi Mobilitas</option>
            <option value="Surat Pengantar Visa">Surat Pengantar Visa</option>
            <option value="Clearance Letter">Clearance Letter</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>
      </div>
      <div class="actions">
        <span class="hint" data-i18n="hint_req">* wajib diisi</span>
        <button type="button" class="btn ghost" data-reset data-i18n="batal">Batal</button>
        <button type="submit" class="btn main" data-i18n="kirim">Kirim Pengajuan</button>
      </div>
    </form>
  </div>
</section>
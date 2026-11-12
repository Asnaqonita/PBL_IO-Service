<section class="page" id="page-inbound">
  <div class="wrap">
    <div class="crumb"><a href="#home" data-go="home" data-i18n="n_home">Beranda</a> / <a href="#inbound" data-go="inbound">Inbound</a> / <b>Form</b></div>
    <div class="fhead">
      <h2 class="ftitle">Form<em>Inbound</em></h2>
      <div class="progress"><span><i></i></span><b>0%</b></div>
      <p class="fsub" data-i18n="in_sub">Pengurusan kunjungan dan dokumen pihak eksternal atau luar negeri yang datang ke PNJ.</p>
    </div>
    <form class="shell" id="f-inbound" action="index.php?url=inbound/store" method="POST" enctype="multipart/form-data" data-mod="INBOUND" novalidate>
      <div class="sec"><span class="num">A</span><h3 data-i18n="i_sA">Data Pribadi Pemohon</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><label data-i18n="i_nama">Nama Lengkap (Sesuai Paspor)</label><input type="text" name="nama_lengkap" required data-auto="name"></div>
        <div class="f"><label data-i18n="i_warga">Kewarganegaraan / Negara Asal</label><input type="text" name="negara_asal" required></div>
        <div class="f"><label data-i18n="p_paspor">Nomor Paspor</label><input type="text" name="no_paspor" required></div>
        <div class="f"><label data-i18n="i_exp">Tanggal Kedaluwarsa Paspor</label><input type="date" name="exp_paspor" required></div>
        <div class="f"><label data-i18n="i_gender">Jenis Kelamin</label><select name="jenis_kelamin" required><option value="" data-i18n="sel_pilih">Pilih…</option><option data-i18n="i_male">Laki-laki</option><option data-i18n="i_female">Perempuan</option></select></div>
        <div class="f"><label data-i18n="i_dob">Tanggal Lahir</label><input type="date" name="tgl_lahir" required></div>
        <div class="f"><label data-i18n="i_email">Email Pribadi</label><input type="email" name="email" required placeholder="name@email.com" data-auto="email"></div>
        <div class="f"><label data-i18n="i_wa">WhatsApp / Nomor Telepon</label><input type="tel" name="whatsapp" required placeholder="+62 8xx xxxx xxxx" inputmode="tel"></div>
      </div>
      <div class="sec"><span class="num">B</span><h3 data-i18n="i_sB">Latar Belakang Akademik (Institusi Asal)</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f full"><label data-i18n="i_univ">Nama Universitas Asal</label><input type="text" name="univ_asal" required></div>
        <div class="f"><label data-i18n="i_major">Program Studi (Major)</label><input type="text" name="program_studi" required></div>
        <div class="f"><label data-i18n="i_dept">Jurusan</label><input type="text" name="jurusan_asal" required></div>
        <div class="f"><label data-i18n="i_deg">Jenjang Pendidikan Saat Ini</label><select name="jenjang" required><option value="" data-i18n="sel_pilih">Pilih…</option><option data-i18n="i_bach">Sarjana (Bachelor)</option><option data-i18n="i_mast">Magister (Master)</option><option data-i18n="i_dip">Diploma</option></select></div>
      </div>
      <div class="sec"><span class="num">C</span><h3 data-i18n="i_sC">Pilihan Program di PNJ</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><label data-i18n="i_type">Jenis Program Inbound</label><select name="jenis_program" required><option value="" data-i18n="sel_pilih">Pilih…</option><option data-i18n="i_t1">Semester Pertukaran (Exchange Semester)</option><option data-i18n="i_t2">Kursus Singkat / Imersi Budaya</option><option data-i18n="i_t3">Program Musim Panas (Summer Program)</option><option data-i18n="i_t4">Magang Riset (Research Internship)</option></select></div>
        <div class="f"><label data-i18n="i_host">Jurusan Tujuan di PNJ</label><select name="jurusan_tujuan" required><option value="" data-i18n="sel_pilih">Pilih…</option><option data-i18n="u_sipil">Teknik Sipil</option><option data-i18n="u_mesin">Teknik Mesin</option><option data-i18n="u_elek">Teknik Elektro</option><option data-i18n="u_tik">Teknik Informatika dan Komputer</option><option data-i18n="u_akun">Akuntansi</option><option data-i18n="u_niaga">Administrasi Niaga</option><option data-i18n="u_grafika">Teknik Grafika dan Penerbitan</option><option data-i18n="u_pasca">Pascasarjana</option></select></div>
        <div class="f full"><label data-i18n="i_period">Periode Studi yang Diinginkan</label><input type="text" name="periode" required placeholder="Contoh: Semester Ganjil 2026/2027" data-i18n-ph="i_ph_period"></div>
      </div>
      <div class="sec"><span class="num">D</span><h3 data-i18n="i_sD">Upload Dokumen (PDF/JPG)</h3><i class="dash"></i></div>
      <div class="grid">
        <div class="f"><div class="lrow"><label data-i18n="i_d_pass">Halaman Data Paspor (Scan)</label></div><small class="fh" data-i18n="i_h_pass">Masa berlaku minimal 6–12 bulan</small><div class="drop"><input type="file" name="scan_paspor" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="i_d_trans">Transkrip Akademik Resmi</label></div><div class="drop"><input type="file" name="transkrip" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="i_d_foto">Pas Foto Formal (Latar Merah/Putih)</label></div><div class="drop"><input type="file" name="foto" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f"><div class="lrow"><label data-i18n="i_d_eng">Sertifikat Bahasa Inggris / Surat Rekomendasi dari Universitas Asal</label></div><div class="drop"><input type="file" name="sertifikat_bahasa" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
        <div class="f full"><div class="lrow"><label data-i18n="i_d_health">Surat Keterangan Sehat / Medical Clearance</label></div><small class="fh" data-i18n="i_h_health">Diperlukan untuk pengurusan izin tinggal/visa</small><div class="drop"><input type="file" name="medical_clearance" required accept=".pdf,.jpg,.jpeg,.png"><div class="drop-ui"><span class="ico"></span><span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span><small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small></div><ul class="files"></ul></div></div>
      </div>
      <div class="actions">
        <span class="hint" data-i18n="hint_req">* wajib diisi</span>
        <button type="button" class="btn ghost" data-reset data-i18n="batal">Batal</button>
        <button type="submit" class="btn main" data-i18n="kirim">Kirim Pengajuan</button>
      </div>
    </form>
  </div>
</section>
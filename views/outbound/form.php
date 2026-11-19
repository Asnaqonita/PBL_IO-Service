<?php
// Ambil data profil mahasiswa yang sedang login dari $profil atau session supaya kolom identitas di Form Outbound langsung terisi otomatis
$u = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
// Amankan semua nilai string dengan htmlspecialchars sebelum dimasukkan ke atribut value HTML
$valNama = htmlspecialchars((string)($u['nama_lengkap'] ?? $u['nama'] ?? ''), ENT_QUOTES, 'UTF-8');
$valNim = htmlspecialchars((string)($u['nim'] ?? $u['nomor_induk'] ?? ''), ENT_QUOTES, 'UTF-8');
$valTempatLahir = htmlspecialchars((string)($u['tempat_lahir'] ?? ''), ENT_QUOTES, 'UTF-8');
$valTanggalLahir = htmlspecialchars((string)($u['tanggal_lahir'] ?? ''), ENT_QUOTES, 'UTF-8');
$valJurusan = trim((string)($u['jurusan'] ?? ''));
$valProdi = htmlspecialchars((string)($u['prodi'] ?? ''), ENT_QUOTES, 'UTF-8');
$valTahunAkademik = htmlspecialchars((string)($u['tahun_akademik'] ?? $u['academic_year'] ?? $u['semester_aktif'] ?? ''), ENT_QUOTES, 'UTF-8');
$valWa = htmlspecialchars((string)($u['no_hp'] ?? $u['whatsapp'] ?? ''), ENT_QUOTES, 'UTF-8');
$valEmail = htmlspecialchars((string)($u['email'] ?? ''), ENT_QUOTES, 'UTF-8');
$valPaspor = htmlspecialchars((string)($u['no_paspor'] ?? ''), ENT_QUOTES, 'UTF-8');
?>
<section class="page" id="page-outbound">
  <div class="wrap">
    <div class="crumb">
      <a href="#home" data-go="home" data-i18n="n_home">Beranda</a>
      /
      <a href="#outbound" data-go="outbound">Outbound</a>
      /
      <b>Form</b>
    </div>

    <div class="fhead">
      <h2 class="ftitle">Form<em>Outbound</em></h2>
      <div class="progress">
        <span><i></i></span>
        <b>0%</b>
      </div>
      <p class="fsub" data-i18n="ob_sub">Pengurusan dokumen yang memerlukan izin negara untuk civitas PNJ: paspor, visa, dan surat izin keluar negeri.</p>
    </div>

    <form class="shell" id="f-outbound" action="index.php?url=outbound/store" method="POST" enctype="multipart/form-data" data-mod="OUTBOUND" novalidate>
      <div class="sec">
        <span class="num">01</span>
        <h3 data-i18n="o_s1">Data Mahasiswa</h3>
        <i class="dash"></i>
      </div>

      <div class="grid">
        <div class="f">
          <label data-i18n="o_nama">Nama Lengkap</label>
          <input type="text" name="nama" required data-auto="name" value="<?= $valNama ?>">
        </div>

        <div class="f">
          <label data-i18n="o_nim">NIM</label>
          <input type="text" name="nim" required inputmode="numeric" value="<?= $valNim ?>">
        </div>

        <div class="f">
          <label data-i18n="o_tmp_lahir">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" required placeholder="Cth. Jakarta" value="<?= $valTempatLahir ?>">
        </div>

        <div class="f">
          <label data-i18n="o_tgl_lahir">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" required value="<?= $valTanggalLahir ?>">
        </div>

        <div class="f">
          <label data-i18n="o_jur">Jurusan</label>
          <select name="jurusan" required>
            <option value="" data-i18n="sel_pilih">Pilih…</option>
            <option value="Teknik Sipil" data-i18n="u_sipil" <?= strcasecmp($valJurusan, 'Teknik Sipil') === 0 ? 'selected' : '' ?>>Teknik Sipil</option>
            <option value="Teknik Mesin" data-i18n="u_mesin" <?= strcasecmp($valJurusan, 'Teknik Mesin') === 0 ? 'selected' : '' ?>>Teknik Mesin</option>
            <option value="Teknik Elektro" data-i18n="u_elek" <?= strcasecmp($valJurusan, 'Teknik Elektro') === 0 ? 'selected' : '' ?>>Teknik Elektro</option>
            <option value="Teknik Informatika dan Komputer" data-i18n="u_tik" <?= strcasecmp($valJurusan, 'Teknik Informatika dan Komputer') === 0 ? 'selected' : '' ?>>Teknik Informatika dan Komputer</option>
            <option value="Akuntansi" data-i18n="u_akun" <?= strcasecmp($valJurusan, 'Akuntansi') === 0 ? 'selected' : '' ?>>Akuntansi</option>
            <option value="Administrasi Niaga" data-i18n="u_niaga" <?= strcasecmp($valJurusan, 'Administrasi Niaga') === 0 ? 'selected' : '' ?>>Administrasi Niaga</option>
            <option value="Teknik Grafika dan Penerbitan" data-i18n="u_grafika" <?= strcasecmp($valJurusan, 'Teknik Grafika dan Penerbitan') === 0 ? 'selected' : '' ?>>Teknik Grafika dan Penerbitan</option>
            <option value="Pascasarjana" data-i18n="u_pasca" <?= strcasecmp($valJurusan, 'Pascasarjana') === 0 ? 'selected' : '' ?>>Pascasarjana</option>
          </select>
        </div>

        <div class="f">
          <label data-i18n="o_prodi">Program Studi</label>
          <input type="text" name="prodi" required placeholder="Contoh: Teknik Informatika" data-i18n-ph="o_ph_prodi" value="<?= $valProdi ?>">
        </div>

        <div class="f">
          <label data-i18n="o_semester">Semester</label>
          <input type="text" name="semester" required placeholder="Cth. 5" inputmode="numeric">
        </div>

        <div class="f">
          <label data-i18n="o_thn_akademik">Tahun Akademik</label>
          <input type="text" name="tahun_akademik" required value="<?= $valTahunAkademik ?>">
        </div>

        <div class="f">
          <label data-i18n="o_wa">Nomor Telepon / WhatsApp</label>
          <input type="tel" name="whatsapp" required placeholder="Cth. 08123456789" inputmode="tel" value="<?= $valWa ?>">
        </div>

        <div class="f">
          <label data-i18n="o_email">Email PNJ</label>
          <input type="email" name="email_pnj" required placeholder="nama@pnj.ac.id" data-auto="email" value="<?= $valEmail ?>">
        </div>
      </div>

      <div class="sec">
        <span class="num">02</span>
        <h3 data-i18n="o_s2">Data Program</h3>
        <i class="dash"></i>
      </div>

      <div class="grid">
        <div class="f full">
          <label data-i18n="o_jl">Jenis Layanan</label>
          <select name="jenis_layanan" required>
            <option value="" data-i18n="o_jl_pilih">Pilih Jenis Layanan</option>
            <option value="Surat Rekomendasi Mobilitas">Surat Rekomendasi Mobilitas</option>
            <option value="Surat Pengantar Visa">Surat Pengantar Visa</option>
            <option value="Clearance Letter">Clearance Letter</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </div>

        <div class="f">
          <label data-i18n="o_kat">Kategori Program</label>
          <select name="kategori_program" required>
            <option value="" data-i18n="o_kat_pilih">Pilih kategori program</option>
            <option value="IISMA">IISMA</option>
            <option value="Exchange/Student Mobility" data-i18n="o_k_ex">Exchange/Student Mobility</option>
            <option value="Short Course">Short Course</option>
            <option value="Joint Degree">Joint Degree</option>
            <option value="Internship/Magang Internasional" data-i18n="o_k_int">Internship/Magang Internasional</option>
            <option value="Program Liugong Scholarship to China.">Program Liugong Scholarship to China.</option>
            <option value="Program Exchange Student dengan Gumi University, Korea Selatan">Program Exchange Student dengan Gumi University, Korea Selatan</option>
            <option value="Program Intense 3+1 ST.John University, Taiwan">Program Intense 3+1 ST.John University, Taiwan</option>
            <option value="Program 2+1+1 Liuzhou Polytechnic University, China">Program 2+1+1 Liuzhou Polytechnic University, China</option>
            <option value="Program 1+1+1 Liugong - LZPU">Program 1+1+1 Liugong - LZPU</option>
            <option value="Program Intense - National United University">Program Intense - National United University</option>
          </select>
        </div>

        <div class="f">
          <label data-i18n="o_univ">Universitas / Perusahaan Tujuan</label>
          <input type="text" name="univ_tujuan" required placeholder="Nama universitas atau perusahaan" data-i18n-ph="o_ph_univ">
        </div>

        <div class="f">
          <label data-i18n="l_negara">Negara Tujuan</label>
          <input type="text" name="negara_tujuan" required placeholder="Contoh: Jepang" data-i18n-ph="ph_negara">
        </div>

        <div class="f">
          <label data-i18n="o_mulai">Durasi Program: Tanggal Mulai</label>
          <input type="date" name="tgl_mulai" required data-role="start">
        </div>

        <div class="f">
          <label data-i18n="o_selesai">Durasi Program: Tanggal Selesai</label>
          <input type="date" name="tgl_selesai" required data-role="end">
        </div>
      </div>

      <div class="sec">
        <span class="num">03</span>
        <h3 data-i18n="s_upload2">Upload Dokumen</h3>
        <i class="dash"></i>
      </div>

      <div class="grid">
        <div class="f">
          <div class="lrow">
            <label data-i18n="o_d_trans">Transkrip Nilai Akademik</label>
          </div>
          <div class="drop">
            <input type="file" name="dok_transkrip" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui">
              <span class="ico"></span>
              <span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
              <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small>
            </div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow">
            <label data-i18n="o_d_rek">Surat Rekomendasi dari Jurusan / Kaprodi</label>
          </div>
          <div class="drop">
            <input type="file" name="dok_rekomendasi" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui">
              <span class="ico"></span>
              <span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
              <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small>
            </div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow">
            <label data-i18n="o_d_ortu">Surat Izin Orang Tua / Wali</label>
          </div>
          <div class="drop">
            <input type="file" name="dok_izin_ortu" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui">
              <span class="ico"></span>
              <span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
              <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small>
            </div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow">
            <label data-i18n="o_d_pasp">Paspor Aktif</label>
          </div>
          <div class="drop">
            <input type="file" name="dok_paspor" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui">
              <span class="ico"></span>
              <span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
              <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small>
            </div>
            <ul class="files"></ul>
          </div>
        </div>

        <div class="f">
          <div class="lrow">
            <label data-i18n="o_d_toefl">Sertifikat TOEFL/IELTS</label>
          </div>
          <div class="drop">
            <input type="file" name="dok_toefl" required accept=".pdf,.jpg,.jpeg,.png">
            <div class="drop-ui">
              <span class="ico"></span>
              <span class="dz-t" data-i18n="drop_t">Pilih file atau seret ke sini</span>
              <small class="mono" data-i18n="drop_h">PDF / JPG / PNG · maks 5 MB</small>
            </div>
            <ul class="files"></ul>
          </div>
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
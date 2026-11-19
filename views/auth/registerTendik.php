<?php
// Potongan form registrasi khusus Tenaga Kependidikan (Tendik) PNJ, otomatis aktif saat user memilih status Tendik di dropdown registrasi
?>
<!-- ===================================================================== -->
<!-- FORM REGISTRASI ROLE 3: TENDIK PNJ (SESUAI DDL TABEL civitas)         -->
<!-- Kolom DDL: nip (PK), nidn (NULL), nama_lengkap, gelar_depan,          -->
<!-- gelar_belakang, jabatan, pangkat_golongan, unit_kerja, no_paspor,     -->
<!-- no_hp, email_pnj, alamat                                              -->
<!-- ===================================================================== -->

<!-- NIP Pegawai Tendik -->
<div class="f">
  <label for="regTdkNip">NIP / NRP Pegawai Tendik</label>
  <input type="text" name="nip" id="regTdkNip" maxlength="30" required placeholder="Contoh: 198806152014031001" inputmode="numeric" disabled>
  <span class="err">NIP / NRP pegawai wajib diisi.</span>
</div>

<!-- Nama Lengkap Tanpa Gelar -->
<div class="f">
  <label for="regTdkNama">Nama Lengkap Pegawai (Tanpa Gelar)</label>
  <input type="text" name="nama_lengkap" id="regTdkNama" maxlength="100" required placeholder="Contoh: Siti Rahmawati" disabled>
  <span class="err">Nama lengkap pegawai wajib diisi.</span>
</div>

<!-- Gelar Depan -->
<div class="f">
  <label for="regTdkGelarDepan">Gelar Depan</label>
  <input type="text" name="gelar_depan" id="regTdkGelarDepan" maxlength="30" placeholder="Contoh: Drs. / Ir. (Opsional)" disabled>
</div>

<!-- Gelar Belakang -->
<div class="f">
  <label for="regTdkGelarBelakang">Gelar Belakang</label>
  <input type="text" name="gelar_belakang" id="regTdkGelarBelakang" maxlength="50" placeholder="Contoh: S.Kom., M.M. (Opsional)" disabled>
</div>

<!-- Jabatan / Posisi Tendik -->
<div class="f">
  <label for="regTdkJabatan">Jabatan / Posisi Tendik</label>
  <input type="text" name="jabatan" id="regTdkJabatan" maxlength="100" required placeholder="Contoh: Tendik - Kepegawaian / Pranata Laboratorium" disabled>
  <span class="err">Jabatan atau posisi kerja wajib diisi.</span>
</div>

<!-- Pangkat / Golongan -->
<div class="f">
  <label for="regTdkPangkat">Pangkat / Golongan</label>
  <input type="text" name="pangkat_golongan" id="regTdkPangkat" maxlength="50" placeholder="Contoh: Penata Muda Tk. I / III/b (Opsional)" disabled>
</div>

<!-- Unit Kerja / Bagian -->
<div class="f">
  <label for="regTdkUnitKerja">Unit Kerja / Bagian</label>
  <select name="unit_kerja" id="regTdkUnitKerja" required disabled>
    <option value="">Pilih unit kerja / bagian…</option>
    <option value="Unit Kerja Pusat - Kepegawaian & Umum">Bagian Kepegawaian, Keuangan &amp; Umum (Pusat)</option>
    <option value="Unit Kerja Pusat - Akademik & Kemahasiswaan">Bagian Akademik, Kemahasiswaan &amp; Perencanaan (Pusat)</option>
    <option value="Kantor Urusan Internasional (KUI)">Kantor Urusan Internasional (KUI)</option>
    <option value="UPT Perpustakaan / TIK / Bahasa">UPT (Perpustakaan / TIK / Bahasa / Perawatan)</option>
    <option value="Administrasi Jurusan Teknik Informatika dan Komputer">Administrasi Jurusan TIK</option>
    <option value="Administrasi Jurusan Teknik Mesin">Administrasi Jurusan Teknik Mesin</option>
    <option value="Administrasi Jurusan Teknik Sipil">Administrasi Jurusan Teknik Sipil</option>
    <option value="Administrasi Jurusan Teknik Elektro">Administrasi Jurusan Teknik Elektro</option>
    <option value="Administrasi Jurusan Akuntansi">Administrasi Jurusan Akuntansi</option>
    <option value="Administrasi Jurusan Administrasi Niaga">Administrasi Jurusan Administrasi Niaga</option>
    <option value="Administrasi Jurusan Teknik Grafika dan Penerbitan">Administrasi Jurusan Teknik Grafika &amp; Penerbitan</option>
    <option value="Administrasi Pascasarjana">Administrasi Pascasarjana</option>
  </select>
  <span class="err">Unit kerja atau bagian wajib dipilih.</span>
</div>

<!-- Nomor Paspor -->
<div class="f">
  <label for="regTdkPaspor">Nomor Paspor (Jika Ada)</label>
  <input type="text" name="no_paspor" id="regTdkPaspor" maxlength="30" placeholder="Contoh: C1234567 (Opsional)" disabled>
</div>

<!-- Nomor WhatsApp / HP -->
<div class="f">
  <label for="regTdkHp">Nomor WhatsApp / HP</label>
  <input type="tel" name="no_hp" id="regTdkHp" maxlength="20" required placeholder="08xx xxxx xxxx" inputmode="tel" disabled>
  <span class="err">Nomor WhatsApp / HP wajib diisi.</span>
</div>

<!-- Email Resmi PNJ -->
<div class="f">
  <label for="regTdkEmail">Email Resmi PNJ (@pnj.ac.id)</label>
  <input type="email" name="email_pnj" id="regTdkEmail" maxlength="100" required placeholder="nama.pegawai@pnj.ac.id" autocomplete="email" disabled>
  <span class="err">Gunakan alamat email resmi @pnj.ac.id yang valid.</span>
</div>

<!-- Alamat Domisili -->
<div class="f full">
  <label for="regTdkAlamat">Alamat Lengkap</label>
  <textarea name="alamat" id="regTdkAlamat" rows="2" placeholder="Masukkan alamat lengkap tempat tinggal / domisili saat ini..." disabled></textarea>
</div>

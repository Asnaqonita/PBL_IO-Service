<!-- ===================================================================== -->
<!-- FORM REGISTRASI ROLE 1: MAHASISWA PNJ (SESUAI DDL TABEL mahasiswa)    -->
<!-- Kolom DDL: nim (PK), nama_lengkap, tempat_lahir, tanggal_lahir,       -->
<!-- jenis_kelamin, jurusan, prodi, angkatan, ipk, no_paspor, no_hp, alamat-->
<!-- ===================================================================== -->

<!-- NIM Mahasiswa -->
<div class="f">
  <label for="regMhsNim">NIM (Nomor Induk Mahasiswa)</label>
  <input type="text" name="nim" id="regMhsNim" maxlength="20" required placeholder="Contoh: 2107411001" inputmode="numeric" disabled>
  <span class="err">NIM wajib diisi sesuai Kartu Tanda Mahasiswa.</span>
</div>

<!-- Nama Lengkap -->
<div class="f">
  <label for="regMhsNama">Nama Lengkap (Sesuai KTP / KTM)</label>
  <input type="text" name="nama_lengkap" id="regMhsNama" maxlength="100" required placeholder="Contoh: Muhammad Farhan" disabled>
  <span class="err">Nama lengkap wajib diisi.</span>
</div>

<!-- Tempat Lahir -->
<div class="f">
  <label for="regMhsTempatLahir">Tempat Lahir</label>
  <input type="text" name="tempat_lahir" id="regMhsTempatLahir" maxlength="50" placeholder="Contoh: Jakarta" disabled>
</div>

<!-- Tanggal Lahir -->
<div class="f">
  <label for="regMhsTanggalLahir">Tanggal Lahir</label>
  <input type="date" name="tanggal_lahir" id="regMhsTanggalLahir" disabled>
</div>

<!-- Jenis Kelamin -->
<div class="f">
  <label for="regMhsGender">Jenis Kelamin</label>
  <select name="jenis_kelamin" id="regMhsGender" disabled>
    <option value="">Pilih jenis kelamin…</option>
    <option value="Laki-Laki">Laki-Laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
</div>

<!-- Tahun Angkatan -->
<div class="f">
  <label for="regMhsAngkatan">Tahun Angkatan</label>
  <input type="number" name="angkatan" id="regMhsAngkatan" min="2015" max="2035" placeholder="Contoh: 2024" inputmode="numeric" disabled>
</div>

<!-- Jurusan -->
<div class="f">
  <label for="regMhsJurusan">Jurusan</label>
  <select name="jurusan" id="regMhsJurusan" required disabled>
    <option value="">Pilih jurusan…</option>
    <option value="Teknik Informatika dan Komputer">Teknik Informatika dan Komputer (TIK)</option>
    <option value="Teknik Mesin">Teknik Mesin</option>
    <option value="Teknik Sipil">Teknik Sipil</option>
    <option value="Teknik Elektro">Teknik Elektro</option>
    <option value="Akuntansi">Akuntansi</option>
    <option value="Administrasi Niaga">Administrasi Niaga</option>
    <option value="Teknik Grafika dan Penerbitan">Teknik Grafika dan Penerbitan</option>
    <option value="Pascasarjana">Pascasarjana</option>
  </select>
  <span class="err">Jurusan wajib dipilih.</span>
</div>

<!-- Program Studi -->
<div class="f">
  <label for="regMhsProdi">Program Studi</label>
  <input type="text" name="prodi" id="regMhsProdi" maxlength="100" required placeholder="Contoh: D4 Teknik Informatika" disabled>
  <span class="err">Program studi wajib diisi.</span>
</div>

<!-- IPK Terakhir -->
<div class="f">
  <label for="regMhsIpk">IPK Terakhir (Skala 4.00)</label>
  <input type="number" name="ipk" id="regMhsIpk" step="0.01" min="0" max="4.00" data-max="4.00" placeholder="Contoh: 3.85" disabled>
</div>

<!-- Nomor Paspor -->
<div class="f">
  <label for="regMhsPaspor">Nomor Paspor (Jika Ada)</label>
  <input type="text" name="no_paspor" id="regMhsPaspor" maxlength="30" placeholder="Contoh: C1234567 (Opsional)" disabled>
</div>

<!-- Nomor WhatsApp / HP -->
<div class="f">
  <label for="regMhsHp">Nomor WhatsApp / HP</label>
  <input type="tel" name="no_hp" id="regMhsHp" maxlength="20" required placeholder="08xx xxxx xxxx" inputmode="tel" disabled>
  <span class="err">Nomor WhatsApp / HP wajib diisi.</span>
</div>

<!-- Email Mahasiswa (users.email) -->
<div class="f">
  <label for="regMhsEmail">Email Resmi PNJ (@mhsw.pnj.ac.id / @pnj.ac.id)</label>
  <input type="email" name="email" id="regMhsEmail" maxlength="100" required placeholder="nama@mhsw.pnj.ac.id" autocomplete="email" disabled>
  <span class="err">Gunakan alamat email resmi PNJ yang valid.</span>
</div>

<!-- Alamat Domisili -->
<div class="f full">
  <label for="regMhsAlamat">Alamat Lengkap</label>
  <textarea name="alamat" id="regMhsAlamat" rows="2" placeholder="Masukkan alamat lengkap tempat tinggal / domisili saat ini..." disabled></textarea>
</div>

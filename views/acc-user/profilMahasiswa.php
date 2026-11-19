<!-- ===================================================================== -->
<!-- FORM PROFIL MAHASISWA PNJ (SESUAI ATRIBUT ERD)                       -->
<!-- Atribut ERD: nim (PK), nama_lengkap, tempat_lahir, tanggal_lahir,    -->
<!-- jenis_kelamin, jurusan, prodi, angkatan, tahun_akademik, ipk,        -->
<!-- no_paspor, no_hp, alamat, email                                      -->
<!-- Relasi ERD: Mahasiswa mengajukan Outbound                             -->
<!-- ===================================================================== -->
<?php
// Ambil data profil mahasiswa yang sedang login supaya semua kotak input di halaman profil langsung terisi datanya
$uProf = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
// Baca nilai Tahun Akademik secara konsisten dari key tahun_akademik / academic_year / semester_aktif
$valThnAkademikProf = htmlspecialchars((string)($uProf['tahun_akademik'] ?? $uProf['academic_year'] ?? $uProf['semester_aktif'] ?? $uProf['semester'] ?? '2026/2027'), ENT_QUOTES, 'UTF-8');
$valAngkatanProf = htmlspecialchars((string)($uProf['angkatan'] ?? '2024'), ENT_QUOTES, 'UTF-8');
$valPasporProf = htmlspecialchars((string)($uProf['no_paspor'] ?? ''), ENT_QUOTES, 'UTF-8');
?>
<div class="f">
  <div class="lrow">
    <label for="profMhsNim">NIM (Nomor Induk Mahasiswa)</label>
  </div>
  <input type="text" name="nim" id="profMhsNim" value="<?= htmlspecialchars((string)($uProf['nim'] ?? $uProf['nomor_induk'] ?? '2507411018'), ENT_QUOTES, 'UTF-8') ?>" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profMhsNama">Nama Lengkap Mahasiswa</label>
  <input type="text" name="nama_lengkap" id="profMhsNama" value="<?= htmlspecialchars((string)($uProf['nama_lengkap'] ?? $uProf['nama'] ?? 'Asna Qonita'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsEmail">Email Mahasiswa Aktif</label>
  <input type="email" name="email" id="profMhsEmail" value="<?= htmlspecialchars((string)($uProf['email'] ?? 'asna.qonita.tik24@mhsw.pnj.ac.id'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsWA">Nomor Handphone / WhatsApp</label>
  <input type="tel" name="no_hp" id="profMhsWA" value="<?= htmlspecialchars((string)($uProf['no_hp'] ?? $uProf['whatsapp'] ?? '081234567890'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsTmpLahir">Tempat Lahir</label>
  <input type="text" name="tempat_lahir" id="profMhsTmpLahir" value="<?= htmlspecialchars((string)($uProf['tempat_lahir'] ?? 'Jakarta'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsTglLahir">Tanggal Lahir</label>
  <input type="date" name="tanggal_lahir" id="profMhsTglLahir" value="<?= htmlspecialchars((string)($uProf['tanggal_lahir'] ?? '2004-12-18'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsGender">Jenis Kelamin</label>
  <select name="jenis_kelamin" id="profMhsGender" required>
    <option value="Perempuan" <?= (strcasecmp((string)($uProf['jenis_kelamin'] ?? 'Perempuan'), 'Perempuan') === 0) ? 'selected' : '' ?>>Perempuan</option>
    <option value="Laki-Laki" <?= (strcasecmp((string)($uProf['jenis_kelamin'] ?? ''), 'Laki-Laki') === 0) ? 'selected' : '' ?>>Laki-Laki</option>
  </select>
</div>

<div class="f">
  <label for="profMhsJurusan">Jurusan di PNJ</label>
  <input type="text" name="jurusan" id="profMhsJurusan" value="<?= htmlspecialchars((string)($uProf['jurusan'] ?? 'Teknik Informatika dan Komputer'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsProdi">Program Studi</label>
  <input type="text" name="prodi" id="profMhsProdi" value="<?= htmlspecialchars((string)($uProf['prodi'] ?? 'Teknik Informatika'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsAngkatan">Tahun Angkatan</label>
  <input type="number" name="angkatan" id="profMhsAngkatan" min="2015" max="2035" placeholder="Cth. 2024" value="<?= $valAngkatanProf ?>" required>
</div>

<div class="f">
  <label for="profMhsSemester">Tahun Akademik</label>
  <input type="text" name="tahun_akademik" id="profMhsSemester" placeholder="Cth. 2026/2027" value="<?= $valThnAkademikProf ?>" required>
</div>

<div class="f">
  <label for="profMhsIpk">IPK Terakhir (Skala 4.00)</label>
  <input type="text" name="ipk" id="profMhsIpk" value="<?= htmlspecialchars((string)($uProf['ipk'] ?? '3.88'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profMhsPaspor">Nomor Paspor</label>
  <input type="text" name="no_paspor" id="profMhsPaspor" placeholder="Cth. C1234567 atau ." value="<?= $valPasporProf ?>">
</div>

<div class="f full">
  <label for="profMhsAlamat">Alamat Domisili Lengkap</label>
  <textarea name="alamat" id="profMhsAlamat" rows="2" required><?= htmlspecialchars((string)($uProf['alamat'] ?? 'Jl. Prof. DR. G.A. Siwabessy, Kampus UI Depok, Jawa Barat 16425'), ENT_QUOTES, 'UTF-8') ?></textarea>
</div>

<!-- ===================================================================== -->
<!-- FORM PROFIL MAHASISWA PNJ (SESUAI ATRIBUT ERD)                       -->
<!-- Atribut ERD: nim (PK), nama, tempat_lahir, tanggal_lahir,           -->
<!-- jenis_kelamin, jurusan, prodi, semester, kelas, ipk, no_hp, alamat, email -->
<!-- Relasi ERD: Mahasiswa mengajukan Outbound                             -->
<!-- ===================================================================== -->
<div class="f">
  <div class="lrow">
    <label for="profMhsNim">NIM (Nomor Induk Mahasiswa)</label>
  </div>
  <input type="text" name="nim" id="profMhsNim" value="2507411018" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profMhsNama">Nama Lengkap Mahasiswa</label>
  <input type="text" name="nama" id="profMhsNama" value="Asna Qonita" required>
</div>

<div class="f">
  <label for="profMhsEmail">Email Mahasiswa Aktif</label>
  <input type="email" name="email" id="profMhsEmail" value="asna.qonita.tik24@mhsw.pnj.ac.id" required>
</div>

<div class="f">
  <label for="profMhsWA">Nomor Handphone / WhatsApp</label>
  <input type="tel" name="no_hp" id="profMhsWA" value="081234567890" required>
</div>

<div class="f">
  <label for="profMhsTmpLahir">Tempat Lahir</label>
  <input type="text" name="tempat_lahir" id="profMhsTmpLahir" value="Jakarta" required>
</div>

<div class="f">
  <label for="profMhsTglLahir">Tanggal Lahir</label>
  <input type="date" name="tanggal_lahir" id="profMhsTglLahir" value="2004-12-18" required>
</div>

<div class="f">
  <label for="profMhsGender">Jenis Kelamin</label>
  <select name="jenis_kelamin" id="profMhsGender" required>
    <option value="Perempuan" selected>Perempuan</option>
    <option value="Laki-Laki">Laki-Laki</option>
  </select>
</div>

<div class="f">
  <label for="profMhsJurusan">Jurusan di PNJ</label>
  <input type="text" name="jurusan" id="profMhsJurusan" value="Teknik Informatika dan Komputer" required>
</div>

<div class="f">
  <label for="profMhsProdi">Program Studi</label>
  <input type="text" name="prodi" id="profMhsProdi" value="Teknik Informatika" required>
</div>

<div class="f">
  <label for="profMhsSemester">Semester Aktif</label>
  <input type="text" name="semester" id="profMhsSemester" value="Semester 5" required>
</div>

<div class="f">
  <label for="profMhsKelas">Kelas</label>
  <input type="text" name="kelas" id="profMhsKelas" value="TI-5A" required>
</div>

<div class="f">
  <label for="profMhsIpk">IPK Terakhir (Skala 4.00)</label>
  <input type="text" name="ipk" id="profMhsIpk" value="3.88" required>
</div>

<div class="f full">
  <label for="profMhsAlamat">Alamat Domisili Lengkap</label>
  <textarea name="alamat" id="profMhsAlamat" rows="2" required>Jl. Prof. DR. G.A. Siwabessy, Kampus UI Depok, Jawa Barat 16425</textarea>
</div>

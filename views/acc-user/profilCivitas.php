<!-- ===================================================================== -->
<!-- FORM PROFIL CIVITAS PNJ: DOSEN / TENDIK (SESUAI ATRIBUT ERD)         -->
<!-- Atribut ERD: nip (PK), nama_lengkap (gelar_depan, nama, gelar_belakang),-->
<!-- unit_kerja, jabatan, no_hp, email, alamat, jenis_kelamin             -->
<!-- Relasi ERD: Civitas mengajukan PDLN                                   -->
<!-- ===================================================================== -->
<div class="f">
  <div class="lrow">
    <label for="profCivNip">NIP / NIDN Pegawai</label>
    <span class="bdg">PRIMARY KEY</span>
  </div>
  <input type="text" name="nip" id="profCivNip" value="197804122005011002" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profCivNama">Nama Lengkap (Tanpa Gelar)</label>
  <input type="text" name="nama" id="profCivNama" value="Hendra Wijaya" required>
</div>

<div class="f">
  <label for="profCivGelarDepan">Gelar Depan</label>
  <input type="text" name="gelar_depan" id="profCivGelarDepan" value="Dr.">
</div>

<div class="f">
  <label for="profCivGelarBelakang">Gelar Belakang</label>
  <input type="text" name="gelar_belakang" id="profCivGelarBelakang" value="S.T., M.T.">
</div>

<div class="f">
  <label for="profCivEmail">Email Resmi PNJ (@pnj.ac.id)</label>
  <input type="email" name="email" id="profCivEmail" value="hendra.wijaya@pnj.ac.id" required>
</div>

<div class="f">
  <label for="profCivWA">Nomor Handphone / WhatsApp</label>
  <input type="tel" name="no_hp" id="profCivWA" value="085678901234" required>
</div>

<div class="f">
  <label for="profCivJabatan">Jabatan Fungsional / Struktural</label>
  <select name="jabatan" id="profCivJabatan" required>
    <option value="Lektor Kepala" selected>Lektor Kepala</option>
    <option value="Lektor">Lektor</option>
    <option value="Asisten Ahli">Asisten Ahli</option>
    <option value="Guru Besar / Profesor">Guru Besar / Profesor</option>
    <option value="Tenaga Kependidikan">Tenaga Kependidikan (Tendik)</option>
  </select>
</div>

<div class="f">
  <label for="profCivUnit">Unit Kerja / Jurusan Asal</label>
  <input type="text" name="unit_kerja" id="profCivUnit" value="Jurusan Teknik Elektro" required>
</div>

<div class="f">
  <label for="profCivGender">Jenis Kelamin</label>
  <select name="jenis_kelamin" id="profCivGender" required>
    <option value="Laki-Laki" selected>Laki-Laki</option>
    <option value="Perempuan">Perempuan</option>
  </select>
</div>

<div class="f">
  <label for="profCivStatus">Status Kepegawaian</label>
  <input type="text" name="status" id="profCivStatus" value="PNS / Dosen Tetap" readonly style="background:#F2FBFB;">
</div>

<div class="f full">
  <label for="profCivAlamat">Alamat Domisili / Rumah</label>
  <textarea name="alamat" id="profCivAlamat" rows="2" required>Komp. Pesona Depok Estate Blok B2 No. 14, Depok, Jawa Barat</textarea>
</div>

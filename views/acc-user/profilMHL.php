<!-- ===================================================================== -->
<!-- FORM PROFIL MAHASISWA LUAR / EKSTERNAL (SESUAI ATRIBUT ERD)           -->
<!-- Atribut ERD: no_paspor (PK), nama, negara_asal, asal_instansi,       -->
<!-- jurusan_asal, prodi_tujuan, jenis_kelamin, tgl_lahir, no_telp,       -->
<!-- email, alamat                                                        -->
<!-- Relasi ERD: Mahasiswa Luar mengajukan Inbound                         -->
<!-- ===================================================================== -->
<div class="f">
  <div class="lrow">
    <label for="profExtPaspor">Passport Number / ID Resmi</label>
  </div>
  <input type="text" name="no_paspor" id="profExtPaspor" value="TK8891201" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profExtNama">Full Name (as in Passport)</label>
  <input type="text" name="nama" id="profExtNama" value="Kenji Takahashi" required>
</div>

<div class="f">
  <label for="profExtNegara">Country of Origin (Negara Asal)</label>
  <input type="text" name="negara_asal" id="profExtNegara" value="Japan" required>
</div>

<div class="f">
  <label for="profExtInstansi">Home Institution / University (Asal Instansi)</label>
  <input type="text" name="asal_instansi" id="profExtInstansi" value="National Institute of Technology (NIT), Gunma College" required>
</div>

<div class="f">
  <label for="profExtJurusanAsal">Department / Major in Home University (Jurusan Asal)</label>
  <input type="text" name="jurusan_asal" id="profExtJurusanAsal" value="Electronic &amp; Information Engineering" required>
</div>

<div class="f">
  <label for="profExtProdiTujuan">Host Department in PNJ (Prodi Tujuan di PNJ)</label>
  <input type="text" name="prodi_tujuan" id="profExtProdiTujuan" value="Teknik Informatika dan Komputer" required>
</div>

<div class="f">
  <label for="profExtGender">Gender (Jenis Kelamin)</label>
  <select name="jenis_kelamin" id="profExtGender" required>
    <option value="Male" selected>Male (Laki-Laki)</option>
    <option value="Female">Female (Perempuan)</option>
  </select>
</div>

<div class="f">
  <label for="profExtDOB">Date of Birth (Tanggal Lahir)</label>
  <input type="date" name="tgl_lahir" id="profExtDOB" value="1998-08-22" required>
</div>

<div class="f">
  <label for="profExtEmail">Active Email Address</label>
  <input type="email" name="email" id="profExtEmail" value="kenji.takahashi@gunma.ac.jp" required>
</div>

<div class="f">
  <label for="profExtPhone">Contact Number (WhatsApp with Country Code)</label>
  <input type="tel" name="no_telp" id="profExtPhone" value="+81 90 1234 5678" required>
</div>

<div class="f full">
  <label for="profExtAlamat">Current Address / Local Accommodation (Alamat)</label>
  <textarea name="alamat" id="profExtAlamat" rows="2" required>Dormitory Building 3, Gunma College / Guest House PNJ Depok</textarea>
</div>

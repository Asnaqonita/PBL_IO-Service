<!-- ===================================================================== -->
<!-- FORM REGISTRASI ROLE 2: DOSEN PNJ (SESUAI DDL TABEL civitas)          -->
<!-- Kolom DDL: nip (PK), nidn, nama_lengkap, gelar_depan, gelar_belakang, -->
<!-- jabatan, pangkat_golongan, unit_kerja, no_paspor, no_hp, email_pnj,   -->
<!-- alamat                                                                -->
<!-- ===================================================================== -->

<!-- NIP Dosen -->
<div class="f">
  <label for="regDsnNip">NIP (Nomor Induk Pegawai)</label>
  <input type="text" name="nip" id="regDsnNip" maxlength="30" required placeholder="Contoh: 197804122005011002" inputmode="numeric" disabled>
  <span class="err">NIP dosen wajib diisi.</span>
</div>

<!-- NIDN Dosen -->
<div class="f">
  <label for="regDsnNidn">NIDN (Nomor Induk Dosen Nasional)</label>
  <input type="text" name="nidn" id="regDsnNidn" maxlength="30" placeholder="Contoh: 0012047802" inputmode="numeric" disabled>
</div>

<!-- Nama Lengkap Tanpa Gelar -->
<div class="f">
  <label for="regDsnNama">Nama Lengkap Dosen (Tanpa Gelar)</label>
  <input type="text" name="nama_lengkap" id="regDsnNama" maxlength="100" required placeholder="Contoh: Hendra Wijaya" disabled>
  <span class="err">Nama lengkap dosen wajib diisi.</span>
</div>

<!-- Jabatan Fungsional Dosen -->
<div class="f">
  <label for="regDsnJabatan">Jabatan Fungsional Dosen</label>
  <select name="jabatan" id="regDsnJabatan" required disabled>
    <option value="">Pilih jabatan fungsional…</option>
    <option value="Dosen PNJ - Asisten Ahli">Dosen PNJ — Asisten Ahli</option>
    <option value="Dosen PNJ - Lektor">Dosen PNJ — Lektor</option>
    <option value="Dosen PNJ - Lektor Kepala">Dosen PNJ — Lektor Kepala</option>
    <option value="Dosen PNJ - Guru Besar / Profesor">Dosen PNJ — Guru Besar / Profesor</option>
    <option value="Dosen PNJ - Tenaga Pengajar">Dosen PNJ — Tenaga Pengajar</option>
  </select>
  <span class="err">Jabatan fungsional dosen wajib dipilih.</span>
</div>

<!-- Gelar Depan -->
<div class="f">
  <label for="regDsnGelarDepan">Gelar Depan</label>
  <input type="text" name="gelar_depan" id="regDsnGelarDepan" maxlength="30" placeholder="Contoh: Dr. / Prof. / Ir. (Opsional)" disabled>
</div>

<!-- Gelar Belakang -->
<div class="f">
  <label for="regDsnGelarBelakang">Gelar Belakang</label>
  <input type="text" name="gelar_belakang" id="regDsnGelarBelakang" maxlength="50" placeholder="Contoh: S.T., M.T., Ph.D. (Opsional)" disabled>
</div>

<!-- Pangkat / Golongan -->
<div class="f">
  <label for="regDsnPangkat">Pangkat / Golongan</label>
  <input type="text" name="pangkat_golongan" id="regDsnPangkat" maxlength="50" placeholder="Contoh: Pembina / IV/a atau Penata Tk. I / III/d" disabled>
</div>

<!-- Unit Kerja / Jurusan Homebase -->
<div class="f">
  <label for="regDsnUnitKerja">Jurusan / Unit Kerja Homebase</label>
  <select name="unit_kerja" id="regDsnUnitKerja" required disabled>
    <option value="">Pilih jurusan homebase…</option>
    <option value="Jurusan Teknik Informatika dan Komputer">Jurusan Teknik Informatika dan Komputer (TIK)</option>
    <option value="Jurusan Teknik Mesin">Jurusan Teknik Mesin</option>
    <option value="Jurusan Teknik Sipil">Jurusan Teknik Sipil</option>
    <option value="Jurusan Teknik Elektro">Jurusan Teknik Elektro</option>
    <option value="Jurusan Akuntansi">Jurusan Akuntansi</option>
    <option value="Jurusan Administrasi Niaga">Jurusan Administrasi Niaga</option>
    <option value="Jurusan Teknik Grafika dan Penerbitan">Jurusan Teknik Grafika dan Penerbitan</option>
    <option value="Pascasarjana">Pascasarjana</option>
  </select>
  <span class="err">Jurusan homebase wajib dipilih.</span>
</div>

<!-- Nomor Paspor -->
<div class="f">
  <label for="regDsnPaspor">Nomor Paspor (Jika Ada)</label>
  <input type="text" name="no_paspor" id="regDsnPaspor" maxlength="30" placeholder="Contoh: C1234567 (Opsional)" disabled>
</div>

<!-- Nomor WhatsApp / HP -->
<div class="f">
  <label for="regDsnHp">Nomor WhatsApp / HP</label>
  <input type="tel" name="no_hp" id="regDsnHp" maxlength="20" required placeholder="08xx xxxx xxxx" inputmode="tel" disabled>
  <span class="err">Nomor WhatsApp / HP wajib diisi.</span>
</div>

<!-- Email Resmi PNJ -->
<div class="f full">
  <label for="regDsnEmail">Email Resmi Dosen (@pnj.ac.id)</label>
  <input type="email" name="email_pnj" id="regDsnEmail" maxlength="100" required placeholder="nama.dosen@pnj.ac.id" autocomplete="email" disabled>
  <span class="err">Gunakan alamat email resmi @pnj.ac.id yang valid.</span>
</div>

<!-- Alamat Domisili -->
<div class="f full">
  <label for="regDsnAlamat">Alamat Lengkap</label>
  <textarea name="alamat" id="regDsnAlamat" rows="2" placeholder="Masukkan alamat lengkap tempat tinggal / domisili saat ini..." disabled></textarea>
</div>

<!-- ===================================================================== -->
<!-- FORM PROFIL CIVITAS PNJ: DOSEN / TENDIK (SESUAI ATRIBUT ERD)         -->
<!-- Atribut ERD: nip (PK), nidn, nama_lengkap, gelar_depan,               -->
<!-- gelar_belakang, jabatan, pangkat_golongan, unit_kerja, no_paspor,     -->
<!-- no_hp, email_pnj, alamat                                             -->
<!-- Relasi ERD: Civitas mengajukan PDLN                                   -->
<!-- ===================================================================== -->
<?php
// Ambil data profil dosen atau tendik dari session/database untuk mengisi kolom-kolom identitas kepegawaian
$uCiv = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
$valCivJabatan = (string)($uCiv['jabatan'] ?? 'Lektor Kepala');
// Daftar pilihan jabatan standar dosen dan tendik PNJ untuk dropdown
$defaultJabatanOpts = [
    'Lektor Kepala',
    'Lektor',
    'Asisten Ahli',
    'Guru Besar / Profesor',
    'Tenaga Kependidikan',
    'Dosen PNJ - Asisten Ahli',
    'Dosen PNJ - Lektor',
    'Dosen PNJ - Lektor Kepala',
    'Dosen PNJ - Guru Besar / Profesor',
    'Dosen PNJ - Tenaga Pengajar'
];
?>
<div class="f">
  <div class="lrow">
    <label for="profCivNip">NIP Pegawai</label>
  </div>
  <input type="text" name="nip" id="profCivNip" value="<?= htmlspecialchars((string)($uCiv['nip'] ?? $uCiv['nomor_induk'] ?? '197804122005011002'), ENT_QUOTES, 'UTF-8') ?>" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profCivNidn">NIDN (Opsional / Khusus Dosen)</label>
  <input type="text" name="nidn" id="profCivNidn" placeholder="Cth. 0012047802" value="<?= htmlspecialchars((string)($uCiv['nidn'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
</div>

<div class="f">
  <label for="profCivNama">Nama Lengkap (Tanpa Gelar)</label>
  <input type="text" name="nama_lengkap" id="profCivNama" value="<?= htmlspecialchars((string)($uCiv['nama_asli'] ?? $uCiv['nama_lengkap'] ?? 'Hendra Wijaya'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profCivGelarDepan">Gelar Depan</label>
  <input type="text" name="gelar_depan" id="profCivGelarDepan" value="<?= htmlspecialchars((string)($uCiv['gelar_depan'] ?? 'Dr.'), ENT_QUOTES, 'UTF-8') ?>">
</div>

<div class="f">
  <label for="profCivGelarBelakang">Gelar Belakang</label>
  <input type="text" name="gelar_belakang" id="profCivGelarBelakang" value="<?= htmlspecialchars((string)($uCiv['gelar_belakang'] ?? 'S.T., M.T.'), ENT_QUOTES, 'UTF-8') ?>">
</div>

<div class="f">
  <label for="profCivEmail">Email Resmi PNJ (@pnj.ac.id)</label>
  <input type="email" name="email_pnj" id="profCivEmail" value="<?= htmlspecialchars((string)($uCiv['email_pnj'] ?? $uCiv['email'] ?? 'hendra.wijaya@pnj.ac.id'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profCivWA">Nomor Handphone / WhatsApp</label>
  <input type="tel" name="no_hp" id="profCivWA" value="<?= htmlspecialchars((string)($uCiv['no_hp'] ?? $uCiv['whatsapp'] ?? '085678901234'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profCivJabatan">Jabatan Fungsional / Struktural</label>
  <select name="jabatan" id="profCivJabatan" required>
    <?php if ($valCivJabatan !== '' && !in_array($valCivJabatan, $defaultJabatanOpts, true)): ?>
      <option value="<?= htmlspecialchars($valCivJabatan, ENT_QUOTES, 'UTF-8') ?>" selected><?= htmlspecialchars($valCivJabatan, ENT_QUOTES, 'UTF-8') ?></option>
    <?php endif; ?>
    <?php foreach ($defaultJabatanOpts as $optJab): ?>
      <option value="<?= htmlspecialchars($optJab, ENT_QUOTES, 'UTF-8') ?>" <?= strcasecmp($valCivJabatan, $optJab) === 0 ? 'selected' : '' ?>><?= htmlspecialchars($optJab, ENT_QUOTES, 'UTF-8') ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="f">
  <label for="profCivPangkat">Pangkat / Golongan</label>
  <input type="text" name="pangkat_golongan" id="profCivPangkat" placeholder="Cth. Pembina / IV/a" value="<?= htmlspecialchars((string)($uCiv['pangkat_golongan'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
</div>

<div class="f">
  <label for="profCivUnit">Unit Kerja / Jurusan Asal</label>
  <input type="text" name="unit_kerja" id="profCivUnit" value="<?= htmlspecialchars((string)($uCiv['unit_kerja'] ?? 'Jurusan Teknik Elektro'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profCivPaspor">Nomor Paspor</label>
  <input type="text" name="no_paspor" id="profCivPaspor" placeholder="Cth. C1234567" value="<?= htmlspecialchars((string)($uCiv['no_paspor'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
</div>

<div class="f full">
  <label for="profCivAlamat">Alamat Domisili / Rumah</label>
  <textarea name="alamat" id="profCivAlamat" rows="2" required><?= htmlspecialchars((string)($uCiv['alamat'] ?? 'Komp. Pesona Depok Estate Blok B2 No. 14, Depok, Jawa Barat'), ENT_QUOTES, 'UTF-8') ?></textarea>
</div>

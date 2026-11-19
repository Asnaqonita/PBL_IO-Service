<!-- ===================================================================== -->
<!-- FORM PROFIL MAHASISWA LUAR / EKSTERNAL (SESUAI ATRIBUT ERD)           -->
<!-- Atribut ERD: no_paspor (PK), full_name, nationality, home_institution,-->
<!-- country_origin, phone_number, email                                  -->
<!-- Relasi ERD: Mahasiswa Luar mengajukan Inbound                         -->
<!-- ===================================================================== -->
<?php
// Ambil data profil mahasiswa luar negeri / tamu internasional dari session atau database untuk mengisi form profil eksternal
$uExt = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
?>
<div class="f">
  <div class="lrow">
    <label for="profExtPaspor">Passport Number / ID Resmi</label>
  </div>
  <input type="text" name="no_paspor" id="profExtPaspor" value="<?= htmlspecialchars((string)($uExt['no_paspor'] ?? $uExt['nomor_induk'] ?? 'TK8891201'), ENT_QUOTES, 'UTF-8') ?>" readonly style="background:#F2FBFB;font-weight:700;">
</div>

<div class="f">
  <label for="profExtNama">Full Name (as in Passport)</label>
  <input type="text" name="full_name" id="profExtNama" value="<?= htmlspecialchars((string)($uExt['full_name'] ?? $uExt['nama_lengkap'] ?? $uExt['nama'] ?? 'Kenji Takahashi'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profExtNegara">Country of Origin (Negara Asal)</label>
  <input type="text" name="country_origin" id="profExtNegara" value="<?= htmlspecialchars((string)($uExt['country_origin'] ?? $uExt['negara_asal'] ?? 'Japan'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profExtNationality">Nationality (Kewarganegaraan)</label>
  <input type="text" name="nationality" id="profExtNationality" value="<?= htmlspecialchars((string)($uExt['nationality'] ?? $uExt['negara_asal'] ?? 'Japan'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profExtInstansi">Home Institution / University (Asal Instansi)</label>
  <input type="text" name="home_institution" id="profExtInstansi" value="<?= htmlspecialchars((string)($uExt['home_institution'] ?? $uExt['asal_instansi'] ?? 'National Institute of Technology (NIT), Gunma College'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f">
  <label for="profExtEmail">Active Email Address</label>
  <input type="email" name="email" id="profExtEmail" value="<?= htmlspecialchars((string)($uExt['email'] ?? 'kenji.takahashi@gunma.ac.jp'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

<div class="f full">
  <label for="profExtPhone">Contact Number (WhatsApp with Country Code)</label>
  <input type="tel" name="phone_number" id="profExtPhone" value="<?= htmlspecialchars((string)($uExt['phone_number'] ?? $uExt['no_hp'] ?? $uExt['no_telp'] ?? '+81 90 1234 5678'), ENT_QUOTES, 'UTF-8') ?>" required>
</div>

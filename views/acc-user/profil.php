<!-- TAB 1: FORM IDENTITAS PENGGUNA (PROFIL BERDASARKAN ERD) -->
<?php
// Cek siapa user yang sedang login supaya formulir profil langsung menampilkan blok input yang sesuai dengan rolenya
$uProfMain = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
$rawRoleMain = strtolower(trim((string)($uProfMain['role'] ?? 'mahasiswa')));
if (in_array($rawRoleMain, ['dosen', 'tendik', 'civitas', 'sivitas'], true)) {
    $activeProfRole = 'sivitas';
} elseif ($rawRoleMain === 'eksternal') {
    $activeProfRole = 'eksternal';
} else {
    $activeProfRole = 'mahasiswa';
}
?>
<section id="pane-profil" class="profile-pane">
  <div class="shell">
    <div class="sec">
      <span class="num">01</span>
      <h3 id="pane-profil-sec-title">Informasi Identitas Mahasiswa (ERD)</h3>
      <i class="dash"></i>
    </div>

    <form id="form-profile-main" action="<?= BASE_URL ?>index.php?url=auth/updateProfile" method="POST">
      <input type="hidden" name="role" id="profActiveRoleInput" value="<?= htmlspecialchars($activeProfRole, ENT_QUOTES, 'UTF-8') ?>">

      <!-- 1. Form Mahasiswa PNJ (Fokus Outbound) -->
      <div id="form-fields-mahasiswa" class="grid role-form-section" style="<?= $activeProfRole === 'mahasiswa' ? 'display:grid;' : 'display:none;' ?>">
        <?php require __DIR__ . '/profilMahasiswa.php'; ?>
      </div>

      <!-- 2. Form Civitas PNJ Dosen/Tendik (Fokus PDLN) -->
      <div id="form-fields-civitas" class="grid role-form-section" style="<?= $activeProfRole === 'sivitas' ? 'display:grid;' : 'display:none;' ?>">
        <?php require __DIR__ . '/profilCivitas.php'; ?>
      </div>

      <!-- 3. Form Mahasiswa Luar / Tamu Eksternal (Fokus Inbound) -->
      <div id="form-fields-eksternal" class="grid role-form-section" style="<?= $activeProfRole === 'eksternal' ? 'display:grid;' : 'display:none;' ?>">
        <?php require __DIR__ . '/profilMHL.php'; ?>
      </div>

      <!-- Bagian Kontak Darurat & Penanggung Jawab -->
      <div class="sec" style="margin-top:32px;">
        <span class="num">02</span>
        <h3 id="pane-profil-sec2-title">Kontak Darurat / Penanggung Jawab</h3>
        <i class="dash"></i>
      </div>

      <div class="grid">
        <div class="f">
          <label id="lbl-emg-name">Nama Kontak Darurat</label>
          <input type="text" name="kontak_darurat_nama" id="profEmergencyName" value="Drs. H. Mulyadi (Orang Tua)" required>
        </div>
        <div class="f">
          <label id="lbl-emg-rel">Hubungan</label>
          <input type="text" name="kontak_darurat_hubungan" id="profEmergencyRel" value="Orang Tua / Wali" required>
        </div>
        <div class="f full">
          <label id="lbl-emg-phone">Nomor Telepon Darurat (WhatsApp)</label>
          <input type="tel" name="kontak_darurat_telepon" id="profEmergencyPhone" value="081398765432" required>
        </div>
      </div>

      <!-- Tombol Simpan Perubahan -->
      <div style="margin-top:32px;padding-top:20px;border-top:1px dashed var(--t300);display:flex;justify-content:flex-end;">
        <button type="submit" class="btn main">
          <span>SIMPAN PERUBAHAN PROFIL</span>
          <svg class="ic"><use href="#i-arrow-r"/></svg>
        </button>
      </div>
    </form>
  </div>
</section>

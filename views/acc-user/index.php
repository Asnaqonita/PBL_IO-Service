<?php
// Halaman utama Portal Akun & Profil Pengguna (menampilkan kartu identitas di kiri dan tab konten di kanan)
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}

// Ambil data profil terbaru dari $profil atau session supaya Kartu Identitas di samping kiri selalu sinkron
$uCard = (!empty($profil) && is_array($profil)) ? $profil : ($_SESSION['user'] ?? []);
$rawRoleCard = strtolower(trim((string)($uCard['role'] ?? 'mahasiswa')));
if (in_array($rawRoleCard, ['dosen', 'tendik', 'civitas', 'sivitas'], true)) {
    $roleCard = 'sivitas';
} elseif ($rawRoleCard === 'eksternal') {
    $roleCard = 'eksternal';
} else {
    $roleCard = 'mahasiswa';
}

// Sesuaikan isi label dan data Kartu Identitas berdasarkan role user yang sedang login (mahasiswa, sivitas, atau eksternal)
if ($roleCard === 'sivitas') {
    $cardName       = trim((string)($uCard['nama_lengkap'] ?? $uCard['name'] ?? $uCard['nama'] ?? 'Dr. Hendra Wijaya, S.T., M.T.'));
    $cardEmail      = trim((string)($uCard['email_pnj'] ?? $uCard['email'] ?? 'hendra@pnj.ac.id'));
    $cardHp         = trim((string)($uCard['no_hp'] ?? $uCard['whatsapp'] ?? '085678901234'));
    $cardBadge      = 'Sivitas (Dosen / Tendik)';
    $cardIdLabel    = 'Nomor Induk Pegawai (NIP)';
    $cardIdVal      = trim((string)($uCard['nip'] ?? $uCard['nomor_induk'] ?? $uCard['id'] ?? '197804122005011002'));
    $cardMeta1Label = 'Jabatan';
    $cardMeta1Val   = trim((string)($uCard['jabatan'] ?? 'Lektor Kepala'));
    $cardMeta2Label = 'Unit Kerja';
    $cardMeta2Val   = trim((string)($uCard['unit_kerja'] ?? 'Jurusan Teknik Elektro'));
    $menuPengTitle  = 'Riwayat PDLN';
} elseif ($roleCard === 'eksternal') {
    $cardName       = trim((string)($uCard['nama_lengkap'] ?? $uCard['full_name'] ?? $uCard['name'] ?? $uCard['nama'] ?? 'Kenji Takahashi'));
    $cardEmail      = trim((string)($uCard['email'] ?? 'kenji@gunma.ac.jp'));
    $cardHp         = trim((string)($uCard['no_hp'] ?? $uCard['phone_number'] ?? $uCard['no_telp'] ?? $uCard['whatsapp'] ?? '+81 90 1234 5678'));
    $cardBadge      = 'External / Inbound Guest';
    $cardIdLabel    = 'Nomor Paspor (Passport Number)';
    $cardIdVal      = trim((string)($uCard['no_paspor'] ?? $uCard['nomor_induk'] ?? $uCard['id'] ?? 'TK8891201'));
    $cardMeta1Label = 'Asal Institusi';
    $cardMeta1Val   = trim((string)($uCard['asal_instansi'] ?? $uCard['home_institution'] ?? 'NIT Gunma College'));
    $cardMeta2Label = 'Negara Asal';
    $cardMeta2Val   = trim((string)($uCard['negara_asal'] ?? $uCard['country_origin'] ?? $uCard['nationality'] ?? 'Japan'));
    $menuPengTitle  = 'My Inbound Records';
} else {
    $cardName       = trim((string)($uCard['nama_lengkap'] ?? $uCard['name'] ?? $uCard['nama'] ?? 'Asna Qonita'));
    $cardEmail      = trim((string)($uCard['email'] ?? 'snqnt1812@gmail.com'));
    $cardHp         = trim((string)($uCard['no_hp'] ?? $uCard['whatsapp'] ?? '081234567890'));
    $cardBadge      = 'Mahasiswa PNJ';
    $cardIdLabel    = 'Nomor Induk Mahasiswa (NIM)';
    $cardIdVal      = trim((string)($uCard['nim'] ?? $uCard['nomor_induk'] ?? $uCard['id'] ?? '2507411018'));
    $jurStr         = trim((string)($uCard['jurusan'] ?? 'Teknik Informatika dan Komputer'));
    $prdStr         = trim((string)($uCard['prodi'] ?? 'Teknik Informatika'));
    $cardMeta1Label = 'Jurusan & Program Studi';
    $cardMeta1Val   = ($jurStr !== '' && $prdStr !== '') ? ($jurStr . ' · ' . $prdStr) : ($jurStr ?: ($prdStr ?: '-'));
    $cardMeta2Label = 'Tahun Akademik';
    $cardMeta2Val   = trim((string)($uCard['tahun_akademik'] ?? $uCard['academic_year'] ?? $uCard['semester_aktif'] ?? '2026/2027'));
    $menuPengTitle  = 'Riwayat Outbound';
}
// Ambil huruf pertama dari nama user untuk ditampilkan pada ikon avatar poligon
$cardInitial = $cardName !== '' ? strtoupper(substr($cardName, 0, 1)) : 'U';
?>

<!-- ===================================================================== -->
<!-- HALAMAN PROFIL & AKUN PENGGUNA                                        -->
<!-- ===================================================================== -->
<section class="page" id="page-profile">
  <div class="wrap" style="padding-top:28px;padding-bottom:60px;">
    
    <!-- Breadcrumb Navigasi -->
    <div class="crumb">
      <a href="#home" data-go="home">Beranda</a> / 
      <a href="#profile" data-go="profile">Portal Akun</a> / 
      <b id="crumb-active-title">Profil Pengguna</b>
    </div>

    <!-- Header Halaman -->
    <div class="fhead">
      <h2 class="ftitle">Profil<em>Pengguna</em></h2>
    </div>

    <!-- Layout Grid Profil 2 Kolom -->
    <div class="profile-grid">
      
      <!-- ============================================================= -->
      <!-- KOLOM KIRI: KARTU IDENTITAS PENGGUNA & MENU AKUN              -->
      <!-- ============================================================= -->
      <aside>
        <div class="shell profile-card">
          
          <!-- Avatar Poligon Khas Sistem User -->
          <div class="profile-avatar-wrap">
            <div class="profile-avatar" id="side-avatar"><?= htmlspecialchars($cardInitial, ENT_QUOTES, 'UTF-8') ?></div>
          </div>

          <h3 class="profile-user-name" id="side-name"><?= htmlspecialchars($cardName, ENT_QUOTES, 'UTF-8') ?></h3>
          <p class="profile-user-email" id="side-email"><?= htmlspecialchars($cardEmail, ENT_QUOTES, 'UTF-8') ?></p>
          
          <div class="profile-role-badge">
            <span id="side-badge"><?= htmlspecialchars($cardBadge, ENT_QUOTES, 'UTF-8') ?></span>
          </div>

          <!-- Kotak rincian identitas utama (NIM/NIP/Paspor, Jurusan/Jabatan/Institusi, Tahun Akademik/Unit/Negara, dan No. HP) -->
          <div class="profile-id-box">
            <span class="id-label" id="side-id-label"><?= htmlspecialchars($cardIdLabel, ENT_QUOTES, 'UTF-8') ?></span>
            <span class="id-val" id="side-id-val"><?= htmlspecialchars($cardIdVal, ENT_QUOTES, 'UTF-8') ?></span>

            <div style="margin-top:10px;padding-top:10px;border-top:1px dashed var(--t200);">
              <span class="id-label" id="side-meta1-label"><?= htmlspecialchars($cardMeta1Label, ENT_QUOTES, 'UTF-8') ?></span>
              <span class="id-val" id="side-meta1-val" style="font-size:13.5px;display:block;"><?= htmlspecialchars($cardMeta1Val ?: '-', ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <div style="margin-top:8px;padding-top:8px;border-top:1px dashed var(--t200);">
              <span class="id-label" id="side-meta2-label"><?= htmlspecialchars($cardMeta2Label, ENT_QUOTES, 'UTF-8') ?></span>
              <span class="id-val" id="side-meta2-val" style="font-size:13.5px;display:block;"><?= htmlspecialchars($cardMeta2Val ?: '-', ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <div style="margin-top:8px;padding-top:8px;border-top:1px dashed var(--t200);">
              <span class="id-label" id="side-hp-label">No. Handphone / WhatsApp</span>
              <span class="id-val" id="side-hp-val" style="font-size:13.5px;display:block;"><?= htmlspecialchars($cardHp ?: '-', ENT_QUOTES, 'UTF-8') ?></span>
            </div>
          </div>

          <!-- Menu Navigasi Vertikal Akun -->
          <div class="profile-menu">
            <button type="button" id="tab-btn-profil" class="active" onclick="switchProfileTab('profil')">
              <i>01</i>
              <span id="menu-txt-profil">Profil Pengguna</span>
            </button>
            <button type="button" id="tab-btn-pengajuan" onclick="switchProfileTab('pengajuan')">
              <i>02</i>
              <span id="menu-txt-pengajuan"><?= htmlspecialchars($menuPengTitle, ENT_QUOTES, 'UTF-8') ?></span>
              <span class="badge" id="menu-badge-pengajuan">1 Berkas</span>
            </button>
            <button type="button" id="tab-btn-notifikasi" onclick="switchProfileTab('notifikasi')">
              <i>03</i>
              <span>Pusat Notifikasi</span>
              <span class="badge" id="menu-badge-notif">2 Baru</span>
            </button>
            <button type="button" id="tab-btn-pengaturan" onclick="switchProfileTab('pengaturan')">
              <i>04</i>
              <span>Pengaturan Akun</span>
            </button>
          </div>
        </div>
      </aside>

      <!-- ============================================================= -->
      <!-- KOLOM KANAN: KONTEN TAB DINAMIS                               -->
      <!-- ============================================================= -->
      <div>
        <?php require __DIR__ . '/profil.php'; ?>
        <?php require __DIR__ . '/pengajuan.php'; ?>
        <?php require __DIR__ . '/notifikasi.php'; ?>
        <?php require __DIR__ . '/pengaturan.php'; ?>
      </div>

    </div>

  </div>
</section>

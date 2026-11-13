<?php
/**
 * View Akun & Profil Pengguna (Sistem User)
 * I/O Service — Kantor Urusan Internasional Politeknik Negeri Jakarta
 */
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
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
            <div class="profile-avatar" id="side-avatar">A</div>
          </div>

          <h3 class="profile-user-name" id="side-name">Asna Qonita</h3>
          <p class="profile-user-email" id="side-email">snqnt1812@gmail.com</p>
          
          <div class="profile-role-badge">
            <span id="side-badge">Mahasiswa PNJ</span>
          </div>

          <!-- Highlight Box ID Utama -->
          <div class="profile-id-box">
            <span class="id-label" id="side-id-label">Nomor Induk Mahasiswa (NIM)</span>
            <span class="id-val" id="side-id-val">2507411018</span>
          </div>

          <!-- Menu Navigasi Vertikal Akun -->
          <div class="profile-menu">
            <button type="button" id="tab-btn-profil" class="active" onclick="switchProfileTab('profil')">
              <i>01</i>
              <span id="menu-txt-profil">Profil Pengguna</span>
            </button>
            <button type="button" id="tab-btn-pengajuan" onclick="switchProfileTab('pengajuan')">
              <i>02</i>
              <span id="menu-txt-pengajuan">Riwayat Outbound</span>
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

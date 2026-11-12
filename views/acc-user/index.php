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
      <div class="auth-kicker"><span class="bdg">MANAJEMEN AKUN &amp; IDENTITAS KUI</span></div>
      <h2 class="ftitle">Profil<em>Pengguna</em></h2>
      <p class="fsub">Kelola data identitas resmi sesuai database ERD KUI PNJ, pantau status dan riwayat dokumen internasional, serta atur preferensi akun Anda.</p>
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

        <!-- Kartu Layanan Cepat & Bantuan KUI -->
        <div class="kui-support-card">
          <h4>
            <svg width="16" height="16" style="fill:none;stroke:currentColor;stroke-width:2"><use href="#i-hourglass"/></svg>
            Jam Operasional KUI
          </h4>
          <p>
            <b>Senin – Kamis:</b> 08.00 – 15.30 WIB<br>
            <b>Jumat:</b> 08.00 – 16.00 WIB<br>
            <span style="color:var(--red);font-weight:600;font-size:12px;">Sabtu, Minggu &amp; Libur Nasional: TUTUP</span>
          </p>
          <a href="https://wa.me/6281234567890" target="_blank" class="btn-kui-wa">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.711 2.598 2.669-.699c.969.584 1.777.892 2.791.893h.001c3.181 0 5.768-2.586 5.768-5.766 0-3.18-2.587-5.779-5.769-5.779zm0 10.373c-.933 0-1.782-.267-2.545-.733l-.182-.109-1.58.414.421-1.539-.12-.191c-.512-.814-.829-1.637-.828-2.615.001-2.529 2.059-4.587 4.588-4.587 2.528 0 4.586 2.058 4.586 4.587 0 2.529-2.058 4.773-4.54 4.773z"/></svg>
            <span>Bantuan WhatsApp KUI</span>
          </a>
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

<?php
if (!defined('BASE_URL')) {
    $configFile = __DIR__ . '/../../config/config.php';
    if (file_exists($configFile)) {
        require_once $configFile;
    } else {
        define('BASE_URL', '/IO_Service/');
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>I/O Service — PNJ</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,500..700;1,8..60,500..700&family=Source+Sans+3:ital,wght@0,400..700;1,400..600&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Archivo:wdth,wght@100..125,400..800&family=JetBrains+Mono:wght@400;500&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/style.css">

</head>
<body>

<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false"><defs>
<symbol id="i-send" viewBox="0 0 24 24"><path d="M21 4L10 14M21 4l-6.5 16-4.5-6-6-4.5z"/></symbol>
<symbol id="i-pie" viewBox="0 0 24 24"><path d="M12 3v9h9"/><path d="M20.4 15.5A9 9 0 1 1 8.5 3.6"/></symbol>
<symbol id="i-doc" viewBox="0 0 24 24"><path d="M7 3h7l4 4v14H7z"/><path d="M14 3v4h4M10 12h5M10 16h5"/></symbol>
<symbol id="i-docok" viewBox="0 0 24 24"><path d="M7 3h7l4 4v14H7z"/><path d="M14 3v4h4M9.5 14l2 2 3.5-4"/></symbol>
<symbol id="i-book" viewBox="0 0 24 24"><path d="M3.5 5.5C6.5 4 9.5 4.2 12 6.2c2.5-2 5.5-2.2 8.5-.7V19c-3-1.5-6-1.3-8.5.7-2.5-2-5.5-2.2-8.5-.7z"/><path d="M12 6.2v13.5"/></symbol>
<symbol id="i-folder" viewBox="0 0 24 24"><path d="M3.5 6.5V19h17V9h-9L10 6.5z"/></symbol>
<symbol id="i-search" viewBox="0 0 24 24"><circle cx="11" cy="11" r="6.5"/><path d="M16 16l4.5 4.5"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><path d="M5 12.5l4.5 4.5L19 7.5"/></symbol>
<symbol id="i-x" viewBox="0 0 24 24"><path d="M6 6l12 12M18 6L6 18"/></symbol>
<symbol id="i-circle" viewBox="0 0 24 24"><circle cx="12" cy="12" r="6.5"/></symbol>
<symbol id="i-hourglass" viewBox="0 0 24 24"><path d="M7 4h10M7 20h10"/><path d="M8 4v3.5L12 12l4-4.5V4M8 20v-3.5L12 12l4 4.5V20"/></symbol>
<symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.5"/><path d="M5 20c0-4 3-6 7-6s7 2 7 6"/></symbol>
<symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5"/><path d="M3.5 12h17M12 3.5c3.2 3.2 3.2 13.8 0 17M12 3.5c-3.2 3.2-3.2 13.8 0 17"/></symbol>
<symbol id="i-cal" viewBox="0 0 24 24"><rect x="4" y="5.5" width="16" height="14.5"/><path d="M4 10h16M8.5 3.5v4M15.5 3.5v4"/></symbol>
<symbol id="i-pin" viewBox="0 0 24 24"><path d="M12 21v-6M8 4h8l-1.5 6 3 3H6.5l3-3z"/></symbol>
<symbol id="i-ext" viewBox="0 0 24 24"><path d="M13.5 4.5H20V11M20 4.5L11 13.5M18 14.5V19H5V6h4.5"/></symbol>
<symbol id="i-lock" viewBox="0 0 24 24"><rect x="5" y="11" width="14" height="10" rx="2"/><circle cx="12" cy="16" r="1.5"/><path d="M8 11V7a4 4 0 0 1 8 0v4"/></symbol>
<symbol id="i-arrow-r" viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></symbol>
<symbol id="i-shield" viewBox="0 0 24 24"><path d="M12 3s7 3 7 8c0 5-7 10-7 10S5 16 5 11c0-5 7-8 7-8z"/></symbol>
<symbol id="i-eye" viewBox="0 0 24 24"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></symbol>
<symbol id="i-school" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></symbol>
</defs></svg>

<!-- ============ HEADER ============ -->
<header class="top">
  <a class="brand" href="#home" data-go="home"><b>I</b><i>/</i><b>O</b><span>Service</span></a>
  <nav class="nav" aria-label="Menu utama">
    <ul>
      <li><a href="#home" data-go="home" data-page="home" data-i18n="n_home">Beranda</a></li>
      <li><a href="#outbound" data-go="outbound" data-page="outbound">Outbound</a></li>
      <li><a href="#inbound" data-go="inbound" data-page="inbound">Inbound</a></li>
      <li><a href="#pdln" data-go="pdln" data-page="pdln">PDLN</a></li>
      <li><a href="#faq" data-go="faq" data-page="faq">FAQ</a></li>
    </ul>
  </nav>
  <div class="tools">
    <div class="lang" role="group" aria-label="Language">
      <button type="button" data-lang="id" class="on">ID</button>
      <button type="button" data-lang="en">EN</button>
    </div>
    <button type="button" class="burger" id="burger" aria-label="Menu akun" aria-controls="drawer"><span></span><span></span><span></span></button>
  </div>
</header>
<!-- ============ DRAWER (akun) ============ -->
<div class="scrim" id="scrim"></div>
<aside class="drawer" id="drawer" aria-hidden="true">
  <div class="d-head"><span data-i18n="acc">Akun</span><button type="button" class="x" id="drawerClose" aria-label="Close">✕</button></div>
  <div class="user" style="cursor:pointer" data-go="profile">
    <div class="avatar guest" id="avatar">?</div>
    <div><b id="uName" data-i18n="belum">Belum masuk</b><small id="uMeta" data-i18n="silakan">Silakan login untuk melanjutkan</small></div>
  </div>
  <div class="d-menu">
    <a href="profile.html#profil" data-go="profile/profil"><i>01</i><span data-i18n="m_profil">Profil Saya</span></a>
    <a href="profile.html#pengajuan" data-go="profile/pengajuan"><i>02</i><span data-i18n="m_ajuan">Pengajuan Saya</span><em class="badge" style="font-style:normal">1</em></a>
    <a href="profile.html#notifikasi" data-go="profile/notifikasi"><i>03</i><span data-i18n="m_notif">Notifikasi</span><em class="badge" style="font-style:normal">2</em></a>
    <a href="profile.html#pengaturan" data-go="profile/pengaturan"><i>04</i><span data-i18n="m_set">Pengaturan Akun</span></a>
  </div>
  <div class="d-lang"><span data-i18n="m_lang">Bahasa</span>
    <div class="lang"><button type="button" data-lang="id" class="on">ID</button><button type="button" data-lang="en">EN</button></div>
  </div>
  <div class="d-foot">
    <button type="button" class="btn slate" id="authBtn" data-i18n="m_login">Login</button>
  </div>
</aside>
<main>

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
<title>I/O Service — PNJ (Admin Dashboard)</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+4:ital,opsz,wght@0,8..60,500..700;1,8..60,500..700&family=Source+Sans+3:ital,wght@0,400..700;1,400..600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/admin.css">
</head>
<body>

<!-- SVG SYMBOLS -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false"><defs>
<symbol id="i-globe" viewBox="0 0 24 24"><circle cx="12" cy="12" r="8.5" fill="none" stroke="currentColor" stroke-width="2"/><path d="M3.5 12h17M12 3.5c3.2 3.2 3.2 13.8 0 17M12 3.5c-3.2 3.2-3.2 13.8 0 17" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-hourglass" viewBox="0 0 24 24"><path d="M7 4h10M7 20h10" fill="none" stroke="currentColor" stroke-width="2"/><path d="M8 4v3.5L12 12l4-4.5V4M8 20v-3.5L12 12l4 4.5V20" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-bell" viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" fill="none" stroke="currentColor" stroke-width="2"/><path d="M13.73 21a2 2 0 0 1-3.46 0" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4" fill="none" stroke="currentColor" stroke-width="2"/><path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
<symbol id="i-check" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12" fill="none" stroke="currentColor" stroke-width="2"/></symbol>
</defs></svg>

<!-- ============ TOP BAR ============ -->
<header class="top">
  <a class="brand" href="#" onclick="switchTab('dashboard'); return false;">
    <b>I<i>/</i>O</b><span>Service</span>
  </a>
  <nav class="nav" aria-label="Menu navigasi admin">
    <ul>
      <li><a href="#" onclick="switchTab('dashboard'); return false;" id="nav-dashboard" class="active">Beranda</a></li>
      <li><a href="#" onclick="switchTab('outbound'); return false;" id="nav-outbound">Outbound</a></li>
      <li><a href="#" onclick="switchTab('inbound'); return false;" id="nav-inbound">Inbound</a></li>
      <li><a href="#" onclick="switchTab('pdln'); return false;" id="nav-pdln">PDLN</a></li>
      <li><a href="#" onclick="switchTab('akun'); return false;" id="nav-akun">Data Akun</a></li>
      <li><a href="#" onclick="switchTab('faq'); return false;" id="nav-faq">FAQ</a></li>
      <li><a href="#" onclick="switchTab('loket'); return false;" id="nav-loket">Loket</a></li>
      <li><a href="#" onclick="switchTab('profil'); return false;" id="nav-profil">Profil</a></li>
      <li><a href="#" onclick="switchTab('notifikasi'); return false;" id="nav-notifikasi">Notifikasi</a></li>
    </ul>
  </nav>
  <div class="tools">
    <div class="lang">
      <button type="button" class="on">ID</button>
      <button type="button">EN</button>
    </div>
    <button type="button" class="burger dot" onclick="toggleDrawer(true)" aria-label="Menu Akun">
      <span></span><span></span>
    </button>
  </div>
</header>

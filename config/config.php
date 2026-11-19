<?php
// Pengaturan alamat dasar (BASE_URL) aplikasi supaya link gambar, CSS, JS, dan pindah halaman tidak nyasar

if (!defined('BASE_URL')) {
    // Cek dulu apakah website lagi dibuka lewat jalur aman (HTTPS) atau HTTP biasa
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    $protocol = $isHttps ? 'https://' : 'http://';
    
    // Ambil nama domain atau localhost tempat aplikasi ini jalan
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    
    // Cari tahu posisi folder proyek ini di dalam folder utama web server (misalnya htdocs/IO_Service)
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== '' ? str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])) : '';
    $projectDir = str_replace('\\', '/', realpath(__DIR__ . '/..'));
    
    if (!empty($docRoot) && strpos($projectDir, $docRoot) === 0) {
        $subDir = substr($projectDir, strlen($docRoot));
    } else {
        // Kalau dibuka lewat terminal/CLI, pakai nama folder bawaan ini
        $subDir = '/IO_Service';
    }
    
    // Pastikan format garis miring di awal dan akhir alamat folder selalu rapi
    $subDir = '/' . trim($subDir, '/');
    if ($subDir !== '/') {
        $subDir .= '/';
    }
    
    // Simpan alamat utuhnya ke konstanta BASE_URL biar bisa dipanggil dari file mana saja
    define('BASE_URL', $protocol . $host . $subDir);
}

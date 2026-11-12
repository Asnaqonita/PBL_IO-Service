<?php
/**
 * Konfigurasi Aplikasi & BASE_URL
 */

if (!defined('BASE_URL')) {
    // Deteksi protokol HTTP atau HTTPS
    $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443);
    $protocol = $isHttps ? 'https://' : 'http://';
    
    // Deteksi Host (misal localhost atau localhost:8080)
    $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
    
    // Deteksi sub-direktori project relatif terhadap DOCUMENT_ROOT web server
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] !== '' ? str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])) : '';
    $projectDir = str_replace('\\', '/', realpath(__DIR__ . '/..'));
    
    if (!empty($docRoot) && strpos($projectDir, $docRoot) === 0) {
        $subDir = substr($projectDir, strlen($docRoot));
    } else {
        // Fallback jika dijalankan di CLI atau konfigurasi khusus
        $subDir = '/IO_Service';
    }
    
    $subDir = '/' . trim($subDir, '/');
    if ($subDir !== '/') {
        $subDir .= '/';
    }
    
    define('BASE_URL', $protocol . $host . $subDir);
}

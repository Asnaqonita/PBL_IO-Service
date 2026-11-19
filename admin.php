<?php
// Pintu masuk khusus halaman Panel Admin KUI PNJ
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/AdminController.php';

// Jalankan controller admin untuk mengecek status login petugas KUI
$admin = new AdminController();
$admin->index();

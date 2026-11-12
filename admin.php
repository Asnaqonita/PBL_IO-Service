<?php
/**
 * Admin Panel Entry Point
 * I/O Service — Kantor Urusan Internasional Politeknik Negeri Jakarta
 */
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/controllers/AdminController.php';

$admin = new AdminController();
$admin->index();

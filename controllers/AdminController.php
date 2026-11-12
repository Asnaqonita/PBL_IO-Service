<?php
/**
 * AdminController
 * Mengelola antarmuka dan proses pada Panel Administrator KUI (I/O Service)
 */
require_once __DIR__ . '/../config/config.php';

class AdminController {

    /**
     * Menampilkan halaman utama panel admin
     */
    public function index() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Outbound secara spesifik (opsional)
     */
    public function outbound() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Inbound secara spesifik (opsional)
     */
    public function inbound() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view PDLN secara spesifik (opsional)
     */
    public function pdln() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Data Akun Pengguna (opsional)
     */
    public function akun() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view FAQ (opsional)
     */
    public function faq() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Loket (opsional)
     */
    public function loket() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Profil Admin (opsional)
     */
    public function profil() {
        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Menampilkan view Notifikasi (opsional)
     */
    public function notifikasi() {
        require_once __DIR__ . '/../views/admin/index.php';
    }
}

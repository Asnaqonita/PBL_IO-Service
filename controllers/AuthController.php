<?php
/**
 * Controller untuk Autentikasi (Login, Register, SSO, Logout)
 */
require_once __DIR__ . '/../config/config.php';

class AuthController {
    
    /**
     * Menampilkan halaman login
     */
    public function login() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Menampilkan halaman register
     */
    public function register() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/register.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Simulasi Single Sign-On (SSO) PNJ
     */
    public function sso() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['user'] = [
            'name' => 'Sivitas PNJ',
            'email' => 'sivitas@pnj.ac.id',
            'role' => 'sivitas_pnj'
        ];
        header('Location: ' . BASE_URL . 'test.php#home');
        exit;
    }

    /**
     * Proses logout
     */
    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ' . BASE_URL . 'test.php#login');
        exit;
    }
}

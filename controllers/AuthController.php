<?php
// File: controllers/AuthController.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';

class AuthController {
    private $userModel;

    public function __construct() {
        // Koneksi model diinisialisasi saat dibutuhkan
    }

    private function getModel() {
        if ($this->userModel === null) {
            $this->userModel = new UserModel();
        }
        return $this->userModel;
    }

    public function login() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    public function register() {
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/register.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Proses Login Form Standar (POST)
     */
    public function authenticate() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }

        $identifier = trim($_POST['identifier'] ?? '');
        $password   = $_POST['password'] ?? '';

        if (empty($identifier) || empty($password)) {
            $_SESSION['error'] = 'Silakan masukkan Email / NIM / NIP / No. Paspor dan Kata Sandi Anda!';
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }

        try {
            $user = $this->getModel()->login($identifier, $password);
            if ($user) {
                $_SESSION['user']    = $user;
                $_SESSION['success'] = 'Selamat datang kembali, ' . $user['name'] . '!';
                header('Location: ' . BASE_URL . 'test.php#profile');
                exit;
            } else {
                $_SESSION['error'] = 'Email / NIM / NIP / No. Paspor atau Kata Sandi yang Anda masukkan salah!';
                header('Location: ' . BASE_URL . 'test.php#login');
                exit;
            }
        } catch (Exception $e) {
            $_SESSION['error'] = 'Gagal melakukan autentikasi: ' . $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
        }
    }

    /**
     * Proses Registrasi Internal Sivitas PNJ: Mahasiswa, Dosen, Tendik (POST)
     */
    public function storePnj() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        $subRole  = trim($_POST['sub_role'] ?? '');
        $password = $_POST['password'] ?? '';
        $passConf = $_POST['password_confirmation'] ?? '';

        if (empty($subRole)) {
            $_SESSION['error'] = 'Silakan pilih Status Sivitas (Mahasiswa, Dosen, atau Tendik) terlebih dahulu!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        if (strlen($password) < 8) {
            $_SESSION['error'] = 'Kata sandi baru minimal harus 8 karakter!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        if ($password !== $passConf) {
            $_SESSION['error'] = 'Konfirmasi kata sandi tidak cocok!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        try {
            $user = $this->getModel()->registerInternal($_POST);
            $_SESSION['user']    = $user;
            $_SESSION['success'] = 'Pendaftaran Sivitas PNJ berhasil! Selamat datang, ' . $user['name'] . '.';
            header('Location: ' . BASE_URL . 'test.php#profile');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }
    }

    /**
     * Proses Registrasi Mahasiswa Luar / Eksternal (POST)
     */
    public function storeExt() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        $password = $_POST['password'] ?? '';
        $passConf = $_POST['password_confirmation'] ?? '';

        if (strlen($password) < 8) {
            $_SESSION['error'] = 'Password must be at least 8 characters!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        if ($password !== $passConf) {
            $_SESSION['error'] = 'Password confirmation does not match!';
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }

        try {
            $user = $this->getModel()->registerEksternal($_POST);
            $_SESSION['user']    = $user;
            $_SESSION['success'] = 'Registration successful! Welcome to I/O Service PNJ, ' . $user['name'] . '.';
            header('Location: ' . BASE_URL . 'test.php#profile');
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: ' . BASE_URL . 'test.php#register');
            exit;
        }
    }

    /**
     * Simulasi Login SSO PNJ
     */
    public function sso() {
        $_SESSION['user'] = [
            'id'    => '197804122005011002',
            'nip'   => '197804122005011002',
            'name'  => 'Sivitas PNJ',
            'nama'  => 'Sivitas PNJ',
            'email' => 'sivitas@pnj.ac.id',
            'role'  => 'sivitas'
        ];
        $_SESSION['success'] = 'Berhasil masuk melalui Single Sign-On (SSO) PNJ.';
        header('Location: ' . BASE_URL . 'test.php#home');
        exit;
    }

    /**
     * Proses Logout & Hapus Sesi Server
     */
    public function logout() {
        unset($_SESSION['user']);
        session_unset();
        session_destroy();

        session_start();
        $_SESSION['success'] = 'Anda telah berhasil keluar dari sesi akun.';
        header('Location: ' . BASE_URL . 'test.php#login');
        exit;
    }
}

// Router penangkap $_GET['action']
if (isset($_GET['action'])) {
    $auth = new AuthController();
    switch ($_GET['action']) {
        case 'authenticate':
            $auth->authenticate();
            break;
        case 'storePnj':
            $auth->storePnj();
            break;
        case 'storeExt':
            $auth->storeExt();
            break;
        case 'sso':
            $auth->sso();
            break;
        case 'logout':
            $auth->logout();
            break;
        default:
            header('Location: ' . BASE_URL . 'test.php#login');
            exit;
    }
}

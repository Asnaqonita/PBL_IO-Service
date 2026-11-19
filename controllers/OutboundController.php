<?php
// Controller untuk mengatur halaman layanan Outbound (khusus Mahasiswa PNJ)
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/OutboundModel.php';

class OutboundController {
    private $userModel;
    private $outboundModel;

    public function __construct() {
        // Pastikan session aktif supaya kita bisa mengecek siapa user yang sedang login
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new UserModel();
        $this->outboundModel = new OutboundModel();
    }

    public function index() {
        // Cek dulu apakah user sudah login, kalau belum arahkan ke halaman login
        $idUser = $_SESSION['user']['id_user'] ?? $_SESSION['id_user'] ?? null;
        if (!$idUser) {
            $_SESSION['error'] = "Silakan login terlebih dahulu untuk mengakses layanan Outbound.";
            header("Location: " . BASE_URL . "test.php#login");
            exit;
        }

        // Tarik data profil lengkap user dari database supaya kolom-kolom di form Outbound langsung terisi otomatis
        $profil = $this->userModel->getUserProfile($idUser);

        if (!$profil) {
            $_SESSION['error'] = "Data profil pengguna tidak ditemukan. Silakan login kembali.";
            header("Location: " . BASE_URL . "test.php#login");
            exit;
        }

        // Batasi akses Outbound khusus untuk Mahasiswa PNJ saja (Dosen dan Tendik diarahkan memakai layanan PDLN)
        $role = strtolower(trim((string)($profil['role'] ?? '')));
        if ($role !== 'mahasiswa') {
            $_SESSION['error'] = "Layanan Form Outbound khusus untuk Mahasiswa PNJ. Dosen dan Tenaga Kependidikan (Tendik) silakan menggunakan layanan PDLN.";
            header("Location: " . BASE_URL . "test.php#home");
            exit;
        }

        // Sinkronkan data profil terbaru ke session
        $_SESSION['user'] = array_merge($_SESSION['user'] ?? [], $profil);

        // Tampilkan halaman formulir pengajuan Outbound dengan membawa data $profil tadi
        $viewIndex = __DIR__ . '/../views/outbound/index.php';
        $viewForm  = __DIR__ . '/../views/outbound/form.php';
        if (file_exists($viewIndex)) {
            require_once $viewIndex;
        } else {
            require_once $viewForm;
        }
    }
}

<?php
// Controller untuk mengatur modul PDLN (Perjalanan Dinas Luar Negeri untuk Mahasiswa, Dosen, dan Tendik PNJ)
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../model/PdlnModel.php';

class PdlnController {
    private $userModel;
    private $pdlnModel;

    public function __construct() {
        // Nyalakan session buat membaca identitas user yang sedang aktif
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->userModel = new UserModel();
        $this->pdlnModel = new PdlnModel();
    }

    // Pastikan user sudah login dan cek rolenya (hanya Mahasiswa, Dosen, dan Tendik PNJ yang boleh akses PDLN)
    private function authorizeAndGetProfile($redirectTarget = 'test.php#login') {
        $idUser = $_SESSION['user']['id_user'] ?? $_SESSION['id_user'] ?? null;
        if (!$idUser) {
            $_SESSION['error'] = "Silakan login terlebih dahulu untuk mengakses layanan PDLN.";
            header("Location: " . BASE_URL . $redirectTarget);
            exit;
        }

        // Ambil profil lengkap dari PostgreSQL untuk kebutuhan auto-fill di Form PDLN
        $profil = $this->userModel->getUserProfile($idUser);
        if (!$profil) {
            $_SESSION['error'] = "Data profil pengguna tidak ditemukan. Silakan login kembali.";
            header("Location: " . BASE_URL . $redirectTarget);
            exit;
        }

        $role = strtolower(trim((string)($profil['role'] ?? '')));
        if (in_array($role, ['dosen', 'tendik', 'civitas', 'sivitas'], true)) {
            $role = 'sivitas';
            $profil['role'] = 'sivitas';
        }

        // Tolak akses kalau yang mencoba masuk adalah akun tamu luar / eksternal
        if (!in_array($role, ['mahasiswa', 'sivitas'], true)) {
            $_SESSION['error'] = "Layanan PDLN hanya tersedia untuk Mahasiswa dan Sivitas (Dosen & Tendik) PNJ.";
            header("Location: " . BASE_URL . "test.php#home");
            exit;
        }

        // Perbarui session user dengan data profil paling baru
        $_SESSION['user'] = array_merge($_SESSION['user'] ?? [], $profil);
        return $profil;
    }

    // Muat halaman utama modul PDLN beserta daftar pengajuan milik user yang sedang login
    public function index() {
        $profil = $this->authorizeAndGetProfile();
        $idUser = $profil['id_user'];
        $listPengajuanPdln = $this->pdlnModel->getPengajuanByUser($idUser);
        require_once __DIR__ . '/../views/pdln/index.php';
    }

    // Muat halaman formulir pengajuan PDLN dengan data profil user yang siap di-autofill
    public function form() {
        $profil = $this->authorizeAndGetProfile();
        $idUser = $profil['id_user'];
        $listPengajuanPdln = $this->pdlnModel->getPengajuanByUser($idUser);
        require_once __DIR__ . '/../views/pdln/form.php';
    }

    // Muat halaman pemantauan progress pengajuan PDLN milik user
    public function progress() {
        $profil = $this->authorizeAndGetProfile();
        $idUser = $profil['id_user'];
        $listPengajuanPdln = $this->pdlnModel->getPengajuanByUser($idUser);
        require_once __DIR__ . '/../views/pdln/progress.php';
    }

    // Tangani pengiriman form pengajuan PDLN baru, simpan file syarat Setneg, dan catat ke database PostgreSQL
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: " . BASE_URL . "test.php#pdln/input");
            exit;
        }

        $profil = $this->authorizeAndGetProfile('test.php#login');
        $idUser = $profil['id_user'];

        try {
            // Simpan data kegiatan dan 7 berkas syarat ke tabel pdln dengan status awal 'baru' (0%)
            $created = $this->pdlnModel->createPengajuan($idUser, $_POST, $_FILES, $profil);
            $_SESSION['success'] = "Pengajuan PDLN (" . $created['kode_pdln'] . ") berhasil dikirim! Status saat ini: Baru Diajukan (0%).";
            // Langsung arahkan user ke tab Progress PDLN supaya pengajuannya langsung terlihat di tabel
            header("Location: " . BASE_URL . "test.php#pdln/progress");
            exit;
        } catch (Exception $e) {
            $_SESSION['error'] = "Gagal mengirim pengajuan PDLN: " . $e->getMessage();
            header("Location: " . BASE_URL . "test.php#pdln/input");
            exit;
        }
    }
}

// Jalankan method sesuai parameter ?action=... saat controller ini dipanggil
if (isset($_GET['action'])) {
    $ctrl = new PdlnController();
    switch ($_GET['action']) {
        case 'store':
            $ctrl->store();
            break;
        case 'progress':
            $ctrl->progress();
            break;
        case 'form':
            $ctrl->form();
            break;
        default:
            $ctrl->index();
            break;
    }
}

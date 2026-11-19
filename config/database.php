<?php
// Pengaturan koneksi ke database PostgreSQL lokal untuk proyek I/O Service
class Database {
    private $host = "localhost";
    // Port bawaan PostgreSQL di komputer lokal
    private $port = "5432";
    // Nama database tempat semua tabel I/O Service disimpan
    private $db_name = "io_service_1_db"; 
    // Akun utama PostgreSQL lokal
    private $username = "postgres";
    public $conn;

    // Buka sambungan ke PostgreSQL dan kembalikan objek PDO yang siap dipakai query
    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username);
            // Nyalakan mode error exception supaya kalau ada query yang salah langsung ketahuan penyebabnya
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Ambil hasil query dalam bentuk array asosiatif (nama_kolom => nilai) biar gampang dipakai di PHP
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            // Kalau database belum nyala atau salah pengaturan, hentikan proses dan tampilkan pesannya
            die("Koneksi Database Lokal Gagal: " . $exception->getMessage());
        }
        return $this->conn;
    }
}

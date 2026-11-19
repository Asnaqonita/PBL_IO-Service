<?php
// File: config/Database.php
class Database {
    private $host = "localhost";
    private $port = "5432";          // Port default PostgreSQL
    private $db_name = "io_service_1_db"; 
    private $username = "postgres";  // Username default PostgreSQL lokal
    private $password = "password_postgres_laptopmu"; // Isi sesuai password saat kamu install PostgreSQL
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            die("Koneksi Database Lokal Gagal: " . $exception->getMessage());
        }
        return $this->conn;
    }
}
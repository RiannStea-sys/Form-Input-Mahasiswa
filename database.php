<?php
class Database {
    public $conn;

    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "db_pwl5");

        if ($this->conn->connect_error) {
            die ("koneksi gagal : " . $this->conn->connect_error);
        }
    }
}
?>
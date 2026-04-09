<?php
require_once 'database.php';

Class Mahasiswa extends Database {
    public function simpan($nim, $nama, $prodi) {
        $sql = "INSERT INTO mahasiswa (nim, nama, prodi)
                VALUES ('$nim', '$nama', '$prodi')";
        return $this->conn->query($sql);
    }

    public function tampil () {
        $sql = "SELECT * FROM mahasiswa ORDER BY nim DESC";
        return $this->conn->query($sql);
    }

    
//tambahan pertemuan 6

    public function getByNim($nim) {
        $sql = "SELECT * FROM mahasiswa WHERE nim='$nim'";
        return $this->conn->query($sql);
    }

    public function update($nim_lama, $nim, $nama, $prodi) {
        $sql = "UPDATE mahasiswa
                SET nim= '$nim', nama='$nama', prodi='$prodi'
                WHERE nim='$nim_lama'";
        return $this->conn->query($sql);
    }

    public function delete($nim) {
    $sql = "DELETE FROM mahasiswa WHERE nim='$nim'";
    return $this->conn->query($sql);
}
}

?>
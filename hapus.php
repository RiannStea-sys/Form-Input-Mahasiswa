<?php
require_once 'mahasiswa.php';
$mhs = new Mahasiswa();

//ambil nim dari url
$nim = $_GET['nim'];

//hapus data
$mhs->delete($nim);

header("Location: index.php");
exit;
?>
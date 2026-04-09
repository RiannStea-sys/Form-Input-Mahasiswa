<?php
require_once 'mahasiswa.php';

$mhs = new Mahasiswa();

//ambil nim dari url
$nim_lama = $_GET['nim'];

//ambil data berdasarkan nim
$data = $mhs->getByNim($nim_lama);
$row = $data->fetch_assoc();

//uptade
if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    if ($mhs->update($nim_lama, $nim, $nama, $prodi)) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>EDIT DATA MAHASISWA</title>
</head>
<body>
    <h2> Edit Data Mahasiswa</h2>

    <form method="POST">
        NIM:<br>
        <input type="text" name="nim" value="<?php echo $row['nim']; ?>"><br><br>

        Nama:<br>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>"><br><br>

        Prodi:<br>
        <input type="text" name="prodi" value="<?php echo $row['prodi']; ?>"><br><br>
        <button name="update">Update Data</button>
    </form>

    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
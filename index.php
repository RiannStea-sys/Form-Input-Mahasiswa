<?php
require_once 'mahasiswa.php';

$mhs = new Mahasiswa();

//Create (simpan data)
if (isset($_POST['simpan'])) {

    
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    if ($mhs->simpan($nim, $nama, $prodi)) {
        //cegah data double saat refresh
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Mahasiswa</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form method="POST">
        <input type="text" name="nim" placeholder="nim"><br><br>
        <input type="text" name="nama" placeholder="nama"><br><br>
        <input type="text" name="prodi" placeholder="prodi"><br><br>

        <button type="submit" name="simpan">Simpan Data </button>
    </form>
    <hr>
    <h2>Data Mahasiswa</h2>

    <?php 
    $data = $mhs->tampil();
    ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Aksi</th>
        </tr>

        <?php
        $id = 1;

        while ($row = $data->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $id++ . "</td>";
            echo "<td>" . $row['nim'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['prodi'] . "</td>";
            echo "<td>
                    <a href = 'edit.php?nim=" . $row['nim'] . "'> Edit </a> |
                <a href = 'hapus.php?nim=" . $row['nim'] . 
                "' onclick=\"return confirm('Yakin ingin menghapus data tersebut?')\">Hapus </a>
                </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
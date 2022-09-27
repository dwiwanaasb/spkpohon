<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$id = $_GET["id"];
$kriteria = query("SELECT * FROM kriteria WHERE id_kriteria = $id")[0];

if (isset($_POST["update"])) {
    if (updateKriteria($_POST, $id) > 0) {
        echo "<script>
                    alert('Data berhasil diperbarui!');
                    document.location.href = 'manajemenKriteria.php';
                </script>";
    } else {
        echo "<script>
                    alert('Tidak ada data yang diperbarui!');
                    document.location.href = 'manajemenKriteria.php';
                </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleCreatePohon.css">
    <title>Update Data Kriteria</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>Update Data Kriteria</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="namaKriteria" placeholder="Masukkan Nama Kriteria..." value="<?= $kriteria["nama_kriteria"] ?>" autocomplete="off" required />
                </div>
                <div class="form-button">
                    <button type="submit" name="update">Update</button>
                    <a href="manajemenKriteria.php">Kembali ke Data Kriteria</a>
                </div>
            </form>
        </div>
    </article>
</body>

</html>
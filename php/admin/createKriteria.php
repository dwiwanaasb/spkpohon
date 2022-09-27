<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

if (isset($_POST["submit"])) {
    $subkriteria = $_POST["subkriteria"];
    if (createKriteria($_POST, $subkriteria) > 0) {
        echo "<script>
                    alert('Data berhasil ditambahkan!');
                    document.location.href = 'manajemenKriteria.php';
                </script>";
    } else {
        echo "<script>
                    alert('Data gagal ditambahkan!');
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
    <title>Tambah Kriteria Penilaian</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>Tambah Kriteria Penilaian</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Nama Kriteria</label>
                    <input type="text" name="namaKriteria" placeholder="Masukkan Nama Kriteria..." autocomplete="off" required />
                </div>
                <div class="form-input">
                    <label for="">Banyak Subkriteria</label>
                    <div class="input-subkriteria">
                        <input type="number" id="count" name="count" min=0 placeholder="Masukkan Banyak Subkriteria..." autocomplete="off" required />
                        <a href="#" id="countItem" onclick="addFields()">Tambah Subkriteria</a>
                    </div>
                </div>
                <div class="form-input subkriteria" id="item-subkriteria"></div>
                <div class="form-button">
                    <button type="submit" name="submit">Submit</button>
                    <a href="manajemenKriteria.php">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </article>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>
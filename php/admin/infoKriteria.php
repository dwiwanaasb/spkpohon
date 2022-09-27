<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$nama_kriteria = $_GET["nama_kriteria"];
$id = query("SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$nama_kriteria'")[0];
$id_kriteria = $id["id_kriteria"];

$subkriteria = query("SELECT nama_subkriteria FROM subkriteria WHERE kriteria_id = $id_kriteria");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/styleCreatePohon.css">
    <title>Info Kriteria</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>List subkriteria <?= $nama_kriteria; ?></h2>
            <div class="infoKriteria">
                <?php foreach ($subkriteria as $data) : ?>
                    <ul class="infoKriteria">
                        <li><?= $data["nama_subkriteria"]; ?></li>
                    </ul>
                <?php endforeach; ?>
            </div>
            <a href="manajemenKriteria.php">Kembali ke dashboard</a>
        </div>
    </article>
</body>

</html>
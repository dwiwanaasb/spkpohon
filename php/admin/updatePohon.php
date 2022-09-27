<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$id = $_GET["id"];
$pohon = query("SELECT * FROM pohon WHERE id_pohon = $id")[0];

if (isset($_POST["update"])) {
    if (updatePohon($_POST, $id) > 0) {
        echo "<script>
                    alert('Data berhasil diperbarui!');
                    document.location.href = 'manajemenPohon.php';
                </script>";
    } else {
        echo "<script>
                    alert('Tidak ada data yang diperbarui!');
                    document.location.href = 'manajemenPohon.php';
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
    <title>Update Data Pohon</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>Update Data Pohon</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?= $pohon['gambar']; ?>">
                <div class="form-input">
                    <label for="">Jenis Pohon</label>
                    <input type="text" name="jenisPohon" placeholder="Masukkan Jenis Pohon..." value="<?= $pohon['jenis_pohon'] ?>" autocomplete="off" required />
                </div>
                <div class="form-input">
                    <label for="">Nama Latin</label>
                    <input type="text" name="namaLatin" placeholder="Masukkan Nama Latin..." value="<?= $pohon['nama_latin'] ?>" autocomplete="off" required />
                </div>
                <div class="form-input">
                    <label for="">Gambar</label>
                    <img src="../img/fotoPohon/<?= $pohon['gambar']; ?>" class="imgPohon" alt="">
                    <input type="file" name="gambar" />
                </div>
                <div class="form-button">
                    <button type="submit" name="update">Update</button>
                    <a href="manajemenPohon.php">Kembali ke Data Pohon</a>
                </div>
            </form>
        </div>
    </article>
</body>

</html>2
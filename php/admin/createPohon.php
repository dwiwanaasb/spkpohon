<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

if (isset($_POST["submit"])) {
    if (createPohon($_POST) > 0) {
        echo "<script>
                        alert('Data berhasil ditambahkan!');
                        document.location.href = 'manajemenPohon.php';
                    </script>";
    } else {
        echo "<script>
                        alert('Data gagal ditambahkan!');
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
    <title>Tambah Data Pohon</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>Tambah Data Pohon</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-input">
                    <label for="">Jenis Pohon</label>
                    <input type="text" name="jenisPohon" placeholder="Masukkan Jenis Pohon..." autocomplete="off" required />
                </div>
                <div class="form-input">
                    <label for="">Nama Latin</label>
                    <input type="text" name="namaLatin" placeholder="Masukkan Nama Latin..." autocomplete="off" required />
                </div>
                <div class="form-input">
                    <label for="">Gambar</label>
                    <input type="file" name="gambar" required />
                </div>
                <div class="form-button">
                    <button type="submit" name="submit">Submit</button>
                    <a href="manajemenPohon.php">Kembali ke Dashboard</a>
                </div>
            </form>
        </div>
    </article>
</body>

</html>
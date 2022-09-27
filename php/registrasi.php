<?php
require 'config/functions.php';

if (isset($_POST['registrasi'])) {
    if (registrasi($_POST) == 'already') {
        echo "<script>
                    alert('Username telah terdaftar sebelumnya!');
                    document.location.href = 'registrasi.php';
                </script>";
    } else if (registrasi($_POST) == 'error konfirmasi') {
        echo "<script>
                    alert('Konfirmasi password tidak sesuai');
                    document.location.href = 'registrasi.php';
                </script>";
    } else if (registrasi($_POST) == 'error') {
        echo "<script>
                    alert('Akun gagal didaftarkan');
                    document.location.href = 'registrasi.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/styleRegistrasi.css">
    <title>Registrasi</title>
</head>

<body>
    <article>
        <div class="container">
            <h2>Registrasi</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username..." autocomplete="off" />
                </div>
                <div class="form-input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="id_password" placeholder="Masukkan password..." autocomplete="off" />
                    <i class="fa-regular fa-eye" id="togglePassword"></i>
                </div>
                <div class="form-input">
                    <label for="">Konfirmasi Password</label>
                    <input type="password" name="cpassword" id="id_cpassword" placeholder="Masukkan konfirmasi password..." autocomplete="off" />
                    <i class="fa-regular fa-eye" id="toggleCPassword"></i>
                </div>
                <div class="form-button">
                    <button type="submit" name="registrasi">Register</button>
                    <a href="login.php">Ke halaman login</a>
                </div>
            </form>
        </div>
    </article>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
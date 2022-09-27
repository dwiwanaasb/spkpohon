<?php
session_start();
error_reporting(E_ERROR | E_PARSE);
require 'config/functions.php';

if ($_SESSION["level"] == 'admin') {
    header('location: admin/index.php');
    exit;
}

if ($_SESSION["level"] == 'decisionmaker') {
    header('location: decisionmaker/index.php');
    exit;
}

if (isset($_POST["login"])) {
    $_SESSION["username"] = $_POST["username"];
    if (login($_POST) == 'admin') {
        $_SESSION["level"] = 'admin';
        echo "<script>
                    alert('Selamat datang Admin!');
                    document.location.href = 'admin/index.php';
                </script>";
    } else if (login($_POST) == 'decisionmaker') {
        $_SESSION["level"] = 'decisionmaker';
        echo "<script>
                    alert('Selamat datang Decision Maker!');
                    document.location.href = 'decisionmaker/index.php';
                </script>";
    } else {
        echo "<script>
                    alert('Periksa kembali username dan password anda');
                    document.location.href = 'login.php';
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
    <link rel="stylesheet" href="../css/styleLogin.css">
    <title>Login</title>
</head>

<body>
    <article>
        <div class="container" data-aos="zoom-in" data-aos-delay="300">
            <h2>Login</h2>
            <form action="" method="post">
                <div class="form-input">
                    <label for="">Username</label>
                    <input type="text" name="username" placeholder="Masukkan username..." autocomplete="off" />
                </div>
                <div class="form-input">
                    <label for="">Password</label>
                    <input type="password" name="password" id="id_password" placeholder=" Masukkan password..." autocomplete="off" />
                    <i class="fa-regular fa-eye" id="togglePassword"></i>
                </div>
                <div class="form-button">
                    <button type="submit" name="login" id="login">Login</button>
                    <a href="../index.php" class="home">Kembali ke home</a>
                </div>
            </form>
        </div>
    </article>

    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/script.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
</body>

</html>
<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$username = $_SESSION["username"];
$query = query("SELECT id_user FROM users WHERE username = '$username'")[0];
$id_user = $query["id_user"];
$query = query("SELECT * FROM users WHERE id_user = $id_user")[0];

if (isset($_POST["update"])) {
    if (updateProfile($_POST, $id_user) == 'berhasil') {
        echo "<script>
                    alert('Akun berhasil diperbarui');
                    document.location.href = 'updateProfile.php';
                </script>";
    } else if (updateProfile($_POST, $id_user) == 'error konfirmasi') {
        echo "<script>
                    alert('Konfirmasi password tidak sesuai');
                    document.location.href = 'updateProfile.php';
                </script>";
    } else if (updateProfile($_POST, $id_user) == 'error') {
        echo "<script>
                    alert('Akun gagal diupdate');
                    document.location.href = 'updateProfile.php';
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
    <link rel=" stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../../css/styleUser.css">
    <title>Update Profile</title>
</head>

<body>
    <div class="area">
        <div class="sidebar">
            <div class="title">
                <h4>SPK Pohon Peneduh Jalan</h4>
            </div>
            <div class="list">
                <ul>
                    <li><a href="index.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Dashboard</a></li>
                    <li><a href="penentuanAHP.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Penentuan AHP</a></li>
                    <li><a href="penentuanWASPAS.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Penentuan WASPAS</a></li>
                    <li><a href="updateProfile.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">Update Profile</a></li>
                    <li><a href="../../downloadPDF.php?path=MANUAL_BOOK_SPK_POHON.pdf" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Download Manual Book</a></li>
                </ul>
            </div>
        </div>
        <div class="content">
            <div class="navbar">
                <div class="home">
                    <a href="../logout.php">
                        <button>
                            <img src="../../img/sign-out-alt.svg" alt="">Logout
                        </button>
                    </a>
                </div>
            </div>
            <div class="area">
                <div class="container">
                    <h2>Update Profile User</h2>
                    <form action="" method="post">
                        <div class="form-input">
                            <label for="">Username</label>
                            <input type="text" name="username" value="<?= $query["username"] ?>" placeholder="Masukkan username..." autocomplete="off" readonly />
                        </div>
                        <div class="form-input">
                            <label for="">Password</label>
                            <input type="password" name="password" id="id_password" placeholder="Masukkan password..." autocomplete="off" required />
                            <i class="fa-regular fa-eye" id="togglePassword"></i>
                        </div>
                        <div class="form-input">
                            <label for="">Konfirmasi Password</label>
                            <input type="password" name="cpassword" id="id_cpassword" placeholder="Masukkan konfirmasi password..." autocomplete="off" required />
                            <i class="fa-regular fa-eye" id="toggleCPassword"></i>
                        </div>
                        <div class="form-button">
                            <button type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>
<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM history"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$history = query("SELECT * FROM history LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/styleDataPohonKriteria.css">
    <title>History</title>
</head>

<body>
    <div class="area">
        <div class="sidebar">
            <div class="title">
                <h4>SPK Pohon Peneduh Jalan</h4>
            </div>
            <div class="list">
                <ul>
                    <li>
                        <a href="dashboardAdmin.php" class="anc">
                            <img src="../../img/chevron-right.svg" alt="" class="icon">Dashboard
                        </a>
                    </li>
                    <li><a href="manajemenPohon.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen Pohon</a></li>
                    <li><a href="manajemenKriteria.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen Kriteria</a></li>
                    <li><a href="manajemenUser.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen User</a></li>
                    <li><a href="history.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">History</a></li>
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
            <div class="header">
                <div class="title">
                    <h2>Riwayat Pengambilan Keputusan</h2>
                </div>
            </div>
            <div class="detail">
                <div class="addArea">
                    <form action="" method="get">
                        <img src="../../img/search.png" alt=""><input type="text" name="search" placeholder="Masukkan keyword pencarian..." id="keyword" autocomplete="off" autofocus>
                    </form>
                </div>

                <div class="tableArea" id="content-table">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Created Date</th>
                            <th>Created By</th>
                            <th>Description</th>
                        </tr>
                        <?php $i = $awalData + 1; ?>
                        <?php foreach ($history as $row) : ?>
                            <tr>
                                <td class="no"><?= $i; ?></td>
                                <td class="item"><?= $row["created_date"]; ?></td>
                                <td class="item"><?= $row["created_by"]; ?></td>
                                <td class="item"><?= $row["description"]; ?></td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="paginition">
                    <?php if ($halamanAktif > 1) : ?>
                        <a href="?halaman=<?= $halamanAktif - 1; ?>" class="list arrow">&laquo</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                        <?php if ($i == $halamanAktif) : ?>
                            <a href="?halaman=<?= $i; ?>" class="list active"><?= $i; ?></a>
                        <?php else : ?>
                            <a href="?halaman=<?= $i; ?>" class="list"><?= $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    <?php if ($halamanAktif < $jumlahHalaman) : ?>
                        <a href="?halaman=<?= $halamanAktif + 1; ?>" class="list arrow">&raquo</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/ajaxHistory.js"></script>
</body>

</html>
<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM kriteria"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$kriteria = query("SELECT * FROM kriteria LIMIT $awalData, $jumlahDataPerHalaman");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel=" stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../../css/styleDataPohonKriteria.css">
    <title>Dashboard Admin</title>
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
                        <a href="index.php" class="anc">
                            <img src="../../img/chevron-right.svg" alt="" class="icon">Dashboard
                        </a>
                    </li>
                    <li><a href="manajemenPohon.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen Pohon</a></li>
                    <li><a href="manajemenKriteria.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">Manajemen Kriteria</a></li>
                    <li><a href="manajemenUser.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen User</a></li>
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
                    <h2>Data Kriteria</h2>
                </div>
            </div>
            <div class="detail">
                <div class="addArea">
                    <form action="" method="get">
                        <img src="../../img/search.png" alt=""><input type="text" name="search" placeholder="Masukkan keyword pencarian..." id="keyword" autocomplete="off" autofocus>
                    </form>
                    <a href="createKriteria.php"><button><i class="fa-regular fa-plus"></i>Tambah Data</button></a>
                </div>

                <div class="tableArea" id="content-table">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Nama Kriteria</th>
                            <th>Bobot</th>
                            <th>Jumlah Subkriteria</th>
                            <th>Aksi</th>
                        </tr>
                        <?php $i = $awalData + 1; ?>
                        <?php foreach ($kriteria as $row) : ?>
                            <tr>
                                <td class="no"><?= $i; ?></td>
                                <td class="item2"><?= $row["nama_kriteria"]; ?></td>
                                <td class="item2"><?= number_format($row["bobot"], 3); ?></td>
                                <td class="item2"><?= countForeignKriteria($row["nama_kriteria"]); ?></td>
                                <td class="item2">
                                    <a href="infoKriteria.php?nama_kriteria=<?= $row["nama_kriteria"]; ?>"><button class="detail"><i class="fas fa-info  "></i></button></a>
                                    <a href="updateKriteria.php?id=<?= $row["id_kriteria"]; ?>"><button class=" update"><i class="fas fa-pen"></i></button></a>
                                    <a href="deleteKriteria.php?id=<?= $row["id_kriteria"]; ?>" onclick="return confirm('Yakin untuk menghapus data ini?')"><button class="delete"><i class="fas fa-trash"></i></button></a>
                                </td>
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
    <script src="../../js/ajaxKriteria.js"></script>
</body>

</html>
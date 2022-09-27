<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM nilai_preferensi"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pohon = query("SELECT pohon.jenis_pohon, nilai_preferensi.nilai, nilai_preferensi.peringkat FROM pohon, nilai_preferensi WHERE 
            nilai_preferensi.pohon_id = pohon.id_pohon LIMIT $awalData, $jumlahDataPerHalaman"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel=" stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../../css/styleAdmin.css">
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
                        <a href="" class="anc active">
                            <img src="../../img/chevron-right.svg" alt="" class="on">Dashboard
                        </a>
                    </li>
                    <li><a href="manajemenPohon.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen Pohon</a></li>
                    <li><a href="manajemenKriteria.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Manajemen Kriteria</a></li>
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
                    <label for="">Admin</label>
                    <h2>Dashboard</h2>
                </div>
            </div>
            <div class="detail">
                <div class="detail-one">
                    <div class="detail-two">
                        <p>
                            Dashboard admin adalah halaman yang berisi mengenai informasi pada sistem seperti jumlah alternatif,
                            jumlah kriteria, jumlah metode dan jumlah users atau pengguna.
                            Admin dapat mengelola data pohon, data kriteria, dan data user seperti menambah, melihat, memperbarui, dan menghapus.
                        </p>
                    </div>
                    <div class="detail-three">
                        <div class="data alternatif">
                            <div class="title">
                                <label for="">ALTERNATIF</label>
                                <?php $countAlternatif = countAlternatif(); ?>
                                <h4><?= $countAlternatif["totalPohon"]; ?></h4>
                            </div>
                            <div class="logo">
                                <img src="../../img/file-text.svg" alt="">
                            </div>
                        </div>
                        <div class="data kriteria">
                            <div class="title">
                                <label for="">KRITERIA</label>
                                <?php $countKriteria = countKriteria(); ?>
                                <h4><?= $countKriteria["totalKriteria"]; ?></h4>
                            </div>
                            <div class="logo">
                                <img src="../../img/file-text.svg" alt="">
                            </div>
                        </div>
                        <div class="data method">
                            <div class="title">
                                <label for="">METODE</label>
                                <h4>2</h4>
                            </div>
                            <div class="logo">
                                <img src="../../img/settings.svg" alt="">
                            </div>
                        </div>
                        <div class="data user">
                            <div class="title">
                                <label for="">USERS</label>
                                <?php $countUser = countUser(); ?>
                                <h4><?= $countUser["totalUser"]; ?></h4>
                            </div>
                            <div class="logo">
                                <img src="../../img/users.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="addArea">
                    <form action="" method="get">
                        <img src="../../img/search.png" alt=""><input type="text" name="search" placeholder="Masukkan keyword pencarian..." id="keyword" autocomplete="off" autofocus>
                    </form>
                </div>

                <div class="note">
                    <p>*Apabila ada salah satu atau lebih data pohon tidak tertampil pada tabel, silahkan kontak decision maker untuk menghitung terlebih dahulu data pohon tersebut pada penentuan WASPAS.</p>
                </div>

                <div class="tableArea" id="content-table">
                    <table>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pohon</th>
                            <th>Nilai</th>
                            <th>Peringkat</th>
                        </tr>
                        <?php $i = $awalData + 1; ?>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td class="no"><?= $i; ?></td>
                                <td class="item"><?= $row["jenis_pohon"]; ?></td>
                                <td class="item"><?= number_format($row["nilai"], 3); ?></td>
                                <td class="item"><?= $row["peringkat"]; ?></td>
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
    <script src="../../js/ajaxNilaiPreferensi.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>

</body>

</html>
<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$sessionUsername = $_SESSION["username"];
$pohon = query("SELECT * FROM pohon");
date_default_timezone_set('Asia/Makassar');
$today = date("d-M-Y H:i:s");

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM nilai_preferensi"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$pohon = query("SELECT pohon.jenis_pohon, pohon.gambar, nilai_preferensi.nilai, nilai_preferensi.peringkat FROM pohon, nilai_preferensi WHERE 
            nilai_preferensi.pohon_id = pohon.id_pohon AND 
            (jenis_pohon LIKE '%$keyword%' OR 
            nama_latin LIKE '%$keyword%') 
            ORDER BY nilai_preferensi.peringkat ASC
            LIMIT $awalData, $jumlahDataPerHalaman");
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
    <title>Dashboard Decision Maker</title>
</head>

<body>
    <div class="area">
        <div class="sidebar">
            <div class="title">
                <h4>SPK Pohon Peneduh Jalan</h4>
            </div>
            <div class="list">
                <ul>
                    <li><a href="index.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">Dashboard</a></li>
                    <li><a href="penentuanAHP.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Penentuan AHP</a></li>
                    <li><a href="penentuanWASPAS.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Penentuan WASPAS</a></li>
                    <li><a href="updateProfile.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Update Profile</a></li>
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
            <div class="header">
                <div class="title">
                    <label for="">Decision Maker</label>
                    <h2>Dashboard</h2>
                </div>
            </div>
            <div class="detail">
                <div class="detail-one">
                    <div class="detail-two">
                        <p>
                            Dashboard decision maker adalah halaman yang berisi mengenai informasi pada sistem seperti jumlah alternatif,
                            jumlah kriteria, jumlah metode dan jumlah users atau pengguna.
                            Decision maker dapat memasukkan nilai perbandingan berdasarkan kriteria yang ada. Selain itu
                            decision maker juga dapat memasukkan data awal alternatif pohon.
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

                <div class="container">
                    <p>Alternatif pohon peneduh terbaik adalah</p>
                    <?php
                    $query = query("SELECT pohon_id FROM nilai_preferensi ORDER BY nilai DESC LIMIT 1")[0];
                    $id_pohon = $query["pohon_id"];
                    $query = query("SELECT jenis_pohon FROM pohon WHERE id_pohon = $id_pohon")[0]
                    ?>
                    <h2>Pohon <?= $query["jenis_pohon"]; ?></h2>
                </div>

                <div class="addArea">
                    <form action="" method="get">
                        <img src="../../img/search.png" alt=""><input type="text" name="search" placeholder="Masukkan keyword pencarian..." id="keyword" autocomplete="off" autofocus>
                    </form>
                </div>

                <div class="note">
                    <p>*Apabila ada salah satu atau lebih data pohon tidak tertampil pada tabel, silahkan lakukan perhitungan terlebih dahulu data pohon tersebut pada penentuan WASPAS.</p>
                </div>

                <div class="tableArea" id="content-table">
                    <table>
                        <tr>
                            <th>Rank</th>
                            <th>Jenis Pohon</th>
                            <th>Nilai</th>
                            <th>Gambar</th>
                        </tr>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td class="item"><?= $row["peringkat"]; ?></td>
                                <td class="item"><?= $row["jenis_pohon"]; ?></td>
                                <td class="item"><?= number_format($row["nilai"], 3); ?></td>
                                <td class="item btn">
                                    <a href="#<?= $row["gambar"]; ?>"><button class="detail"><i class="fa-regular fa-image"></i></button></a>
                                    <div class="overlay" id="<?= $row["gambar"]; ?>">
                                        <div class="title">
                                            <h3>Pohon <?= $row["jenis_pohon"]; ?></h3>
                                        </div>
                                        <div class="text">
                                            <a href="#"><img src="../../img/x.svg" alt=""></a>
                                        </div>
                                        <div class="image">
                                            <img src="../../img/fotoPohon/<?= $row["gambar"]; ?>" alt="">
                                        </div>
                                    </div>
                                </td>
                            </tr>
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
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
    <script src="../../js/ajaxRank.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 1200,
        });
    </script>
</body>

</html>
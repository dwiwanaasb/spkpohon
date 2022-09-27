<?php
session_start();
error_reporting(E_ERROR);
require '../php/config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM nilai_preferensi"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$keyword = $_GET["keyword"];

$pohon = query("SELECT pohon.jenis_pohon, pohon.gambar, nilai_preferensi.nilai, nilai_preferensi.peringkat FROM pohon, nilai_preferensi WHERE 
            nilai_preferensi.pohon_id = pohon.id_pohon AND 
            (jenis_pohon LIKE '%$keyword%' OR 
            nama_latin LIKE '%$keyword%') 
            ORDER BY nilai_preferensi.peringkat ASC
            LIMIT $awalData, $jumlahDataPerHalaman");
?>

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
<?php
session_start();
error_reporting(E_ERROR);
require '../php/config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM pohon"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$keyword = $_GET["keyword"];
$pohon = query("SELECT * FROM pohon WHERE 
                    jenis_pohon LIKE '%$keyword%' OR 
                    nama_latin LIKE '%$keyword%' LIMIT $awalData, $jumlahDataPerHalaman");
?>

<table>
    <tr>
        <th>No</th>
        <th>Jenis Pohon</th>
        <th>Nama Latin</th>
        <th>Aksi</th>
    </tr>
    <?php $i = $awalData + 1; ?>
    <?php foreach ($pohon as $row) : ?>
        <tr>
            <td class="no"><?= $i; ?></td>
            <td class="item"><?= $row["jenis_pohon"]; ?></td>
            <td class=" item latin"><?= $row["nama_latin"]; ?></td>
            <td class="item btn">
                <a href="#<?= $row["gambar"]; ?>"><button class="detail"><i class="fa-regular fa-image"></i></button></a>
                <a href="updatePohon.php?id=<?= $row["id_pohon"]; ?>"><button class="update"><i class="fas fa-pen"></i></button></a>
                <a href="deletePohon.php?id=<?= $row["id_pohon"]; ?>" onclick="return confirm('Yakin untuk menghapus data ini?')"><button class="delete"><i class="fas fa-trash"></i></button></a>
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
        <?php $i++; ?>
    <?php endforeach; ?>
</table>
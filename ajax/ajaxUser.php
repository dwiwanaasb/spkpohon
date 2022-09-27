<?php
session_start();
require '../php/config/functions.php';
error_reporting(E_ERROR);

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM users"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$keyword = $_GET["keyword"];
$users = query("SELECT * FROM users LIMIT $awalData, $jumlahDataPerHalaman");

?>

<table>
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($users as $row) : ?>
        <tr>
            <td class="no"><?= $i; ?></td>
            <td class="item"><?= $row["username"]; ?></td>
            <td class="item">
                <a href="delete.php?id=<?= $row["id_user"]; ?>" onclick="return confirm('Yakin untuk menghapus data ini?')"><button class="delete"><i class="fas fa-trash"></i></button></a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>
<?php
session_start();
require '../php/config/functions.php';
error_reporting(E_ERROR);

$keyword = $_GET["keyword"];
$query = "SELECT * FROM kriteria WHERE 
                    nama_kriteria LIKE '%$keyword%'";
$kriteria = query($query);
?>

<table>
    <tr>
        <th>No</th>
        <th>Nama Kriteria</th>
        <th>Bobot</th>
        <th>Jumlah Subkriteria</th>
        <th>Aksi</th>
    </tr>
    <?php $i = 1; ?>
    <?php foreach ($kriteria as $row) : ?>
        <tr>
            <td class="no"><?= $i; ?></td>
            <td class="item2"><?= $row["nama_kriteria"]; ?></td>
            <td class="item2"><?= number_format($row["bobot"], 3); ?></td>
            <td class="item2"><?= countForeignKriteria($row["nama_kriteria"]);; ?></td>
            <td class="item2">
                <a href="dataSubkriteria.php"><button class="detail"><i class="fas fa-info  "></i></button></a>
                <a href="updateKriteria.php?id=<?= $row["id_kriteria"]; ?>"><button class=" update"><i class="fas fa-pen"></i></button></a>
                <a href="deleteKriteria.php?id=<?= $row["id_kriteria"]; ?>" onclick="return confirm('Yakin untuk menghapus data ini?')"><button class="delete"><i class="fas fa-trash"></i></button></a>
            </td>
        </tr>
        <?php $i++; ?>
    <?php endforeach; ?>
</table>
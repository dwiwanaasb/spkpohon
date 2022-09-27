<?php
session_start();
require '../php/config/functions.php';
error_reporting(E_ERROR);

$keyword = $_GET["keyword"];
$query = "SELECT pohon.jenis_pohon, nilai_preferensi.nilai, nilai_preferensi.peringkat FROM pohon, nilai_preferensi WHERE 
            nilai_preferensi.pohon_id = pohon.id_pohon AND pohon.jenis_pohon LIKE '%$keyword%'";
$pohon = query($query);
?>

<table>
    <tr>
        <th>No</th>
        <th>Jenis Pohon</th>
        <th>Nilai</th>
        <th>Peringkat</th>
    </tr>
    <?php $i = 1; ?>
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
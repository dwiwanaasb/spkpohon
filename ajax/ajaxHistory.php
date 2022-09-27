<?php
session_start();
require '../php/config/functions.php';
error_reporting(E_ERROR);

$keyword = $_GET["keyword"];
$query = "SELECT * FROM history WHERE 
                    created_date LIKE '%$keyword%' OR 
                    created_by LIKE '%$keyword%'";
$history = query($query);
?>

<table>
    <tr>
        <th>No</th>
        <th>Created Date</th>
        <th>Created By</th>
        <th>Description</th>
    </tr>
    <?php $i = 1; ?>
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
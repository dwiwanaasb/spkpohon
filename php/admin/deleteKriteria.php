<?php
session_start();
error_reporting(E_ERROR);
require '../config/functions.php';

if ($_SESSION["level"] == '') {
    header('location: ../login.php');
    exit;
}

$id = $_GET["id"];

if (deleteKriteria($id) > 0) {
    echo "<script>
                    alert('Data berhasil dihapus!');
                    document.location.href = 'manajemenKriteria.php';
        </script>";
} else {
    echo "<script>
                    alert('Data gagal dihapus!');
                    document.location.href = 'manajemenKriteria.php';
        </script>";
}

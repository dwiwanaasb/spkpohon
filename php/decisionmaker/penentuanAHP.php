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

$kriteria = query("SELECT * FROM kriteria");
error_reporting(E_ERROR);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../../css/styleAhpWaspas.css">
    <script src="../../js/sweetalert2.all.min.js" defer async></script>
    <title>Penentuan AHP</title>
</head>

<body>
    <div class="area">
        <div class="sidebar">
            <div class="title">
                <h4>SPK Pohon Peneduh Jalan</h4>
            </div>
            <div class="list">
                <ul>
                    <li><a href="index.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Dashboard</a></li>
                    <li><a href="penentuanAHP.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">Penentuan AHP</a></li>
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
                    <h2>Penentuan AHP</h2>
                </div>
            </div>
            <div class="detail">
                <div class="container">
                    <div class="title">
                        <h3>Perbandingan Kriteria</h3>
                        <a href="#petunjuk"><label for="">Petunjuk Penggunaan</label></a>
                        <div class="overlay" id="petunjuk">
                            <div class="title">
                                <h3>Perbandingan Kriteria</h3>
                            </div>
                            <div class="text">
                                <a href="#"><img src="../../img/x.svg" alt=""></a>
                            </div>
                            <div class="content">
                                <div>
                                    <p>
                                        1. Pilih kriteria yang akan dimasukkan data, selanjutnya akan ada radio button untuk memilih kriteria yang lebih penting beserta nilai perbandingannya.<br><br>
                                        2. Pilih nilai perbandingan yang tersedia, nilai tersebutlah yang akan diubah menjadi nilai di dalam penentuan AHP.<br><br>
                                        3. Selanjutnya akan terdapat informasi pada bagian Consistency Ratio (CR) untuk memberitahu apakah hasil perhitungan metode AHP konsisten atau tidak.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menuKriteria">
                        <label for="">Pilih Kriteria</label>
                        <form action="" method="get" onsubmit="submitForm();return false;">
                            <select name="listKriteria" id="listKriteria" onchange="this.form.submit()">
                                <option disabled selected>Pilih</option>
                                <?php foreach ($kriteria as $row) : ?>
                                    <option value="<?= $row['nama_kriteria']; ?>"><?= $row['nama_kriteria']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                    <?php if (isset($_GET["listKriteria"])) : ?>
                        <?php $namaKriteria = $_GET["listKriteria"]; ?><br>
                        <label for="">Kriteria: <b><?= $namaKriteria; ?></b></label>
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <th colspan="2">Pilih yang lebih penting</th>
                                    <th>Nilai perbandingan</th>
                                </tr>
                                <?php $i = 0; ?>
                                <?php $arrSaaty = [
                                    "Mendekati Sedikit Lebih Penting",
                                    "Sedikit Lebih Penting",
                                    "Mendekati Lebih Penting",
                                    "Lebih Penting",
                                    "Mendekati Jelas Lebih Penting",
                                    "Jelas Lebih Penting",
                                    "Mendekati Mutlak Penting",
                                    "Mutlak Penting"
                                ]; ?>
                                <?php foreach ($kriteria as $row) : ?>
                                    <tr>
                                        <td>
                                            <input type="radio" name="pilKriteria[<?= $i; ?>]" value="<?= $namaKriteria; ?>" required>
                                            <?= $namaKriteria; ?>
                                        </td>
                                        <td>
                                            <input type="radio" name="pilKriteria[<?= $i; ?>]" value="<?= $row['nama_kriteria']; ?>" required>
                                            <?= $row['nama_kriteria']; ?>
                                        </td>
                                        <?php if ($namaKriteria == $row['nama_kriteria']) { ?>
                                            <?php $a = intVal(1); ?>
                                            <td class="inputField">
                                                <input type="hidden" name="nilaiPerbandingan[<?= $i; ?>]" value=<?= $a; ?>>
                                                Sama Pentingnya
                                            </td>
                                        <?php } else {; ?>
                                            <td class="inputField">
                                                <select name="nilaiPerbandingan[<?= $i; ?>]" id="">
                                                    <?php $b = 2; ?>
                                                    <?php for ($a = 0; $a < count($arrSaaty); $a++) { ?>
                                                        <option value="<?= $b; ?>"><?= $arrSaaty[$a]; ?></option>
                                                        <?php $b++; ?>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        <?php }; ?>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </table>
                            <div class="btn-simpan">
                                <a href=""><button name="simpan" type="submit">Simpan</button></a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
                <?php
                if (isset($_POST["simpan"])) {
                    updateMatriksPerbandingan($simpanKriteria, $nilai, $namaKriteria, $i);
                }
                ?>
                <div class="container">
                    <div class="title">
                        <h3>Matriks Perbandingan Kriteria</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria</strong></td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td><strong><?= $row["nama_kriteria"]; ?><strong></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php foreach ($kriteria as $row) : ?>
                            <tr>
                                <td class="textLeft"><?= $row["nama_kriteria"]; ?></td>
                                <?php
                                $namaKriteria = $row["nama_kriteria"];
                                $query = query("SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$namaKriteria'")[0];
                                $kriteria_id = $query["id_kriteria"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM matriks_perbandingan WHERE kriteria_id = $kriteria_id");
                                    $nilai = $query[$i]["nilai"];
                                    ?>
                                    <?php if (is_null($nilai)) { ?>
                                        <td><?= 0; ?></td>
                                    <?php } else { ?>
                                        <td><?= number_format($nilai, 3); ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="textLeft"><strong>&#x3A3<strong></td>
                            <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                <?php
                                $query = query("SELECT SUM(nilai) AS sumKriteria$i FROM matriks_perbandingan WHERE colKriteria_id = $i+1")[0];
                                $nilai = $query["sumKriteria$i"];
                                $query = "UPDATE sum_matriks SET nilai = $nilai WHERE kriteria_id = $i+1";
                                mysqli_query($conn, $query);
                                ?>
                                <td><?= number_format($nilai, 3); ?></td>
                            <?php endfor; ?>
                        </tr>
                    </table>
                </div>

                <div class="container">
                    <div class="title">
                        <h3>Normalisasi Matriks Perbandingan Kriteria</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria</strong></td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td><strong><?= $row["nama_kriteria"]; ?><strong></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php foreach ($kriteria as $row) : ?>
                            <tr>
                                <td class="textLeft"><?= $row["nama_kriteria"]; ?></td>
                                <?php
                                $namaKriteria = $row["nama_kriteria"];
                                $query = query("SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$namaKriteria'")[0];
                                $kriteria_id = $query["id_kriteria"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM sum_matriks WHERE kriteria_id = $i+1")[0];
                                    $nilaiSumMatriks = $query["nilai"];
                                    $query = query("SELECT nilai FROM matriks_perbandingan WHERE kriteria_id = $kriteria_id");
                                    if ($nilai != 0) {
                                        $nilai = $query[$i]["nilai"];
                                        $nilaiNormalisasi = $nilai / $nilaiSumMatriks;
                                    }

                                    $query = "UPDATE matriks_normalisasi SET nilai = $nilaiNormalisasi WHERE kriteria_id = $kriteria_id AND colKriteria_id = $i+1";
                                    mysqli_query($conn, $query);
                                    ?>
                                    <?php if (is_null($nilai)) { ?>
                                        <td><?= 0; ?></td>
                                    <?php } else { ?>
                                        <td><?= number_format($nilaiNormalisasi, 3); ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="textLeft"><strong>&#x3A3<strong></td>
                            <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                <?php
                                $query = query("SELECT SUM(nilai) AS sumKriteria$i FROM matriks_normalisasi WHERE colKriteria_id = $i+1")[0];
                                $nilai = $query["sumKriteria$i"];
                                $query = "UPDATE sum_matriksNormalisasi SET nilai = $nilai WHERE kriteria_id = $i+1";
                                mysqli_query($conn, $query);
                                ?>
                                <td><?= number_format($nilai, 3); ?></td>
                            <?php endfor; ?>
                        </tr>
                    </table>
                </div>

                <div class="container half">
                    <div class="title">
                        <h3>Prioritas Relatif</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria<strong></td>
                            <td><strong>Prioritas<strong></td>
                        </tr>
                        <?php foreach ($kriteria as $key => $row) : ?>
                            <tr>
                                <?php
                                $query = query("SELECT SUM(nilai) AS sumNilai FROM matriks_normalisasi WHERE kriteria_id = $key+1")[0];
                                $sumNilai = $query["sumNilai"];
                                $n = count($kriteria);
                                $nilai = $sumNilai / $n;
                                $query = "UPDATE prioritas_relatif SET nilai = $nilai WHERE kriteria_id = $key+1";
                                mysqli_query($conn, $query);
                                ?>
                                <td class="textLeft"><?= $row["nama_kriteria"]; ?></td>
                                <td><?= number_format($nilai, 3); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="textLeft"><strong>&#x3A3<strong></td>
                            <?php
                            $sumPrioritasRelatif = query("SELECT SUM(nilai) AS valSumPrioritasRelatif FROM prioritas_relatif")[0];
                            ?>
                            <td><?= number_format($sumPrioritasRelatif["valSumPrioritasRelatif"], 3); ?></td>
                        </tr>
                    </table>
                </div>

                <div class="container half">
                    <div class="title">
                        <h3>Nilai Eigen Maksimum</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria<strong></td>
                            <td><strong>Nilai Eigen<strong></td>
                        </tr>
                        <?php foreach ($kriteria as $key => $row) : ?>
                            <tr>
                                <td class="textLeft"><?= $row["nama_kriteria"]; ?></td>
                                <?php
                                $query = query("SELECT nilai FROM prioritas_relatif WHERE kriteria_id = $key+1")[0];
                                $nilaiPrioritasRelatif = $query["nilai"];
                                $query = query("SELECT nilai FROM sum_matriks WHERE kriteria_id = $key+1")[0];
                                $nilaiSumMatriks = $query["nilai"];
                                $nilai = $nilaiPrioritasRelatif * $nilaiSumMatriks;
                                $query = "UPDATE nilai_eigen SET nilai = $nilai WHERE kriteria_id = $key+1";
                                mysqli_query($conn, $query);
                                ?>
                                <td><?= number_format($nilai, 3); ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="textLeft"><strong>&#x3A3<strong></td>
                            <?php
                            $sumNilaiEigen = query("SELECT SUM(nilai) AS valSumNilaiEigen FROM nilai_eigen")[0];
                            ?>
                            <td><?= number_format($sumNilaiEigen["valSumNilaiEigen"], 3); ?></td>
                        </tr>
                    </table>
                </div>

                <div class="container half">
                    <div class="title">
                        <h3>Consistency Index (CI)</h3>
                    </div>
                    <table>
                        <tr>
                            <td>CI</td>
                            <?php
                            $sumNilaiEigen = $sumNilaiEigen["valSumNilaiEigen"];
                            $n = count($kriteria);
                            $ci = ($sumNilaiEigen - $n) / ($n - 1);
                            ?>
                            <td><?= number_format($ci, 3) ?></td>
                        </tr>
                    </table>
                </div>

                <div class="container half">
                    <div class="title">
                        <h3>Consistency Ratio (CR)</h3>
                    </div>
                    <table>
                        <tr>
                            <td></td>
                            <td><strong>Nilai<strong></td>
                            <td><strong>Hasil<strong></td>
                        </tr>
                        <tr>
                            <td>CR</td>
                            <?php $ir = 1.120; ?>
                            <?php $cr = $ci / $ir; ?>
                            <?php
                            $query = "UPDATE cr SET nilai_cr = $cr";
                            mysqli_query($conn, $query);
                            ?>
                            <td><?= number_format($cr, 3); ?></td>
                            <?php
                            if ($cr >= 0 && $cr <= 0.1) {
                                $hasil = "Konsisten";
                                for ($i = 0; $i < count($kriteria); $i++) {
                                    $namaKriteria = $kriteria[$i]["nama_kriteria"];
                                    $query = query("SELECT * FROM prioritas_relatif")[$i];
                                    $nilai = $query["nilai"];
                                    $query = "UPDATE kriteria SET bobot = $nilai WHERE id_kriteria = $i+1";
                                    mysqli_query($conn, $query);
                                }
                                echo "<script>
                                    Swal.fire({
                                        title: 'Perhitungan konsisten!',
                                        text: 'Silahkan lihat bobot tiap kriteria pada tabel prioritas relatif  ',
                                        icon: 'success',
                                        confirmButtonText: 'OK'
                                    })
                                </script>";
                            ?>
                                <td><strong><?= $hasil; ?></strong></td>
                            <?php } else { ?>
                                <?php $hasil = "Tidak Konsisten"; ?>
                                <?php
                                echo "<script>
                                    Swal.fire({
                                        title: 'Perhitungan tidak konsisten!',
                                        text: 'Silahkan masukkan ulang nilai perbandingan',
                                        icon: 'error',
                                        confirmButtonText: 'OK'
                                    })
                                </script>";
                                ?>
                                <td><strong style="color: red;"><?= $hasil; ?></strong></td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>
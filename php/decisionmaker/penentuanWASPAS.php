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

$pohon = query("SELECT * FROM pohon");
$kriteria = query("SELECT * FROM kriteria");
$nilaiMatriks = query("SELECT * FROM matriks_perbandingan");
$nilaiMatriksNormalisasi = query("SELECT * FROM matriks_normalisasi");
error_reporting(E_ERROR);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel=" stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../../css/styleAhpWaspas.css">
    <title>Penentuan WASPAS</title>
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
                    <li><a href="penentuanAHP.php" class="anc"><img src="../../img/chevron-right.svg" alt="" class="icon">Penentuan AHP</a></li>
                    <li><a href="penentuanWASPAS.php" class="anc active"><img src="../../img/chevron-right.svg" alt="" class="on">Penentuan WASPAS</a></li>
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
                    <h2>Penentuan WASPAS</h2>
                </div>
            </div>
            <div class="detail">
                <div class="container">
                    <div class="title">
                        <h3>Data Awal</h3>
                        <a href="#petunjuk"><label for="">Petunjuk Penggunaan</label></a>
                        <div class="overlay" id="petunjuk">
                            <div class="title">
                                <h3>Penentuan Data Awal</h3>
                            </div>
                            <div class="text">
                                <a href="#"><img src="../../img/x.svg" alt=""></a>
                            </div>
                            <div class="content">
                                <div>
                                    <p>
                                        1. Pilih alternatif yang akan dimasukkan data, selanjutnya akan ada kriteria beserta dropdown nilai yang berisi subkriteria. <br><br>
                                        2. Pilih nilai yang tersedia sesuai dengan kriterianya. Nilai tersebutlah yang akan diubah menjadi nilai di dalam penentuan WASPAS.<br><br>
                                        3. Hasil akhir dari penentuan WASPAS adalah urutan peringkat alternatif pohon peneduh jalan akan ditampilkan pada bagian nilai preferensi.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria</strong></td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td><strong><?= $row["nama_kriteria"]; ?><strong></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td><?= $row["jenis_pohon"]; ?></td>
                                <?php
                                $jenisPohon = $row["jenis_pohon"];
                                $query = query("SELECT id_pohon FROM pohon WHERE jenis_pohon = '$jenisPohon'")[0];
                                $pohon_id = $query["id_pohon"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM data_awal WHERE pohon_id = $pohon_id");
                                    $nilai = $query[$i]["nilai"];
                                    ?>
                                    <?php if (is_null($nilai)) { ?>
                                        <td><?= 0; ?></td>
                                    <?php } else { ?>
                                        <td><?= $nilai; ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <div class="ubahAlternatif" id="ubahAlternatif">
                        <div class="title">
                            <h3>Update Data Awal</h3>
                        </div>
                        <div class="menu">
                            <label for="">Pilih Alternatif</label>
                            <form action="" method="get">
                                <select name="listPohon" id="listPohon" onchange="this.form.submit()">
                                    <option disabled selected>Pilih</option>
                                    <?php foreach ($pohon as $row) : ?>
                                        <option value="<?= $row['jenis_pohon']; ?>"><?= $row['jenis_pohon']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>

                        <?php if (isset($_GET["listPohon"])) : ?>
                            <?php $namaPohon = $_GET["listPohon"]; ?>
                            <br><label for="">Alternatif: <b>Pohon <?= $namaPohon; ?></b></label>
                            <form action="" method="post">
                                <table>
                                    <tr>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                    </tr>
                                    <?php $i; ?>
                                    <?php foreach ($kriteria as $row) : ?>
                                        <tr>
                                            <td class="textLeft">
                                                <input type="text" name="pilKriteria[<?= $i; ?>]" value="<?= $row['nama_kriteria']; ?>" class="labelKriteria" readonly>
                                                <?php $namaKriteria = $row['nama_kriteria']; ?>
                                            </td>
                                            <td>
                                                <?php $data = selectSubKriteria($namaKriteria); ?>
                                                <select name="listSubkriteria[<?= $i; ?>]" id="listKepentingan">
                                                    <option disabled selected>Pilih</option>
                                                    <?php foreach ($data as $valData) : ?>
                                                        <option class="optSubkriteria" value="<?= $valData["nama_subkriteria"]; ?>"><?= $valData["nama_subkriteria"]; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!-- <?php if ($namaKriteria == 'Bentuk Daun' or $namaKriteria == 'Bentuk Akar' or $namaKriteria == 'Bentuk Tajuk') { ?>
                                                <input type="text" step="any" name="dataAwal[<?= $i; ?>]" id="dataAwal" autocomplete="off" required>
                                            <?php } else {; ?>
                                                <input type="number" step="any" name="dataAwal[<?= $i; ?>]" id="dataAwal" autocomplete="off" min="0" required>
                                            <?php }; ?> -->
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach; ?>
                                </table>
                                <div class="btn-simpan">
                                    <button name="simpan" type="submit">Simpan</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>

                <?php
                if (isset($_POST["simpan"])) {
                    $simpanKriteria = [];
                    $simpanKriteria = $_POST["pilKriteria"];
                    $simpanSubkriteria = [];
                    $simpanSubkriteria = $_POST["listSubkriteria"];
                    foreach ($simpanKriteria as $index => $row) {
                        $dataSubkriteria = $simpanSubkriteria[$index];
                        updateMatriksKeputusan($namaPohon, $row, $dataSubkriteria);
                    }
                    echo "<script>
                            alert('Update data berhasil!');
                            document.location.href = 'penentuanWaspas.php';
                        </script>";
                    exit;
                }
                ?>

                <div class="container">
                    <div class="title">
                        <h3>Matriks Keputusan</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria</strong></td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td><strong><?= $row["nama_kriteria"]; ?><strong></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td><?= $row["jenis_pohon"]; ?></td>
                                <?php
                                $jenisPohon = $row["jenis_pohon"];
                                $query = query("SELECT id_pohon FROM pohon WHERE jenis_pohon = '$jenisPohon'")[0];
                                $pohon_id = $query["id_pohon"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM matriks_keputusan WHERE pohon_id = $pohon_id");
                                    $nilai = $query[$i]["nilai"];
                                    ?>
                                    <?php if (is_null($nilai)) { ?>
                                        <td><?= 0; ?></td>
                                    <?php } else { ?>
                                        <td><?= number_format($nilai, 0); ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="container">
                    <div class="title">
                        <h3>Matriks Keputusan Normalisasi</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Kriteria</strong></td>
                            <?php foreach ($kriteria as $row) : ?>
                                <td><strong><?= $row["nama_kriteria"]; ?><strong></td>
                            <?php endforeach; ?>
                        </tr>
                        <?php foreach ($pohon as $row) : ?>
                            <tr>
                                <td><?= $row["jenis_pohon"]; ?></td>
                                <?php
                                $jenisPohon = $row["jenis_pohon"];
                                $query = query("SELECT id_pohon FROM pohon WHERE jenis_pohon = '$jenisPohon'")[0];
                                $pohon_id = $query["id_pohon"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM matriks_keputusan WHERE pohon_id = $pohon_id");
                                    $nilai_matriks = $query[$i]["nilai"];
                                    $query = query("SELECT tipe FROM kriteria WHERE id_kriteria = $i+1")[0];
                                    $tipe = $query["tipe"];
                                    ?>
                                    <?php if ($tipe == "Benefit") { ?>
                                        <?php
                                        $query = query("SELECT MAX(nilai) AS maxNilai FROM matriks_keputusan WHERE kriteria_id = $i+1")[0];
                                        $nilai = $nilai_matriks / $query["maxNilai"];
                                        ?>
                                    <?php } else { ?>
                                        <?php
                                        $query = query("SELECT MIN(nilai) AS minNilai FROM matriks_keputusan WHERE kriteria_id = $i+1")[0];
                                        $nilai = $query["minNilai"] / $nilai_matriks;
                                        ?>
                                    <?php
                                    };
                                    $query = "UPDATE matriks_keputusannormalisasi SET nilai = $nilai WHERE pohon_id = $pohon_id AND kriteria_id = $i+1";
                                    mysqli_query($conn, $query);
                                    ?>
                                    <?php if (is_null($nilai)) { ?>
                                        <td><?= 0; ?></td>
                                    <?php } else { ?>
                                        <td><?= number_format($nilai, 3); ?></td>
                                    <?php } ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="container half">
                    <div class="title">
                        <h3>Nilai Preferensi</h3>
                    </div>
                    <table>
                        <tr>
                            <td><strong>Alternatif<strong></td>
                            <td><strong>Nilai Preferensi<strong></td>
                            <td><strong>Peringkat<strong></td>
                        </tr>
                        <?php foreach ($pohon as $key => $row) : ?>
                            <tr>
                                <td><?= $row["jenis_pohon"]; ?></td>
                                <?php
                                $jenisPohon = $row["jenis_pohon"];
                                $query = query("SELECT id_pohon FROM pohon WHERE jenis_pohon = '$jenisPohon'")[0];
                                $pohon_id = $query["id_pohon"];
                                ?>
                                <?php for ($i = 0; $i < count($kriteria); $i++) : ?>
                                    <?php
                                    $query = query("SELECT nilai FROM matriks_keputusannormalisasi WHERE pohon_id = $pohon_id AND kriteria_id = $i+1")[0];
                                    $nilai_matriks = $query["nilai"];
                                    $query = query("SELECT bobot FROM kriteria WHERE id_kriteria = $i+1")[0];
                                    $bobot = $query["bobot"];
                                    $nilai1 = $nilai_matriks * $bobot;
                                    $nilai2 = pow($nilai_matriks, $bobot);
                                    if ($i == 0) {
                                        $var2 = $nilai2;
                                    } else {
                                        $var2 *= $nilai2;
                                    }

                                    $var1 += $nilai1;
                                    ?>
                                <?php endfor; ?>
                                <?php
                                $hasil1 = 0.5 * $var1;
                                $hasil2 = 0.5 * $var2;
                                $total = $hasil1 + $hasil2;
                                unset($var1);
                                unset($var2);
                                $query = "UPDATE nilai_preferensi SET nilai = $total WHERE pohon_id = $pohon_id";
                                mysqli_query($conn, $query);
                                $query = query("SELECT peringkat FROM nilai_preferensi WHERE pohon_id=$pohon_id")[0];
                                $peringkat = $query["peringkat"];
                                ?>
                                <td><?= number_format($total, 3); ?></td>
                                <td><?= $peringkat; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php
                        $result = mysqli_query($conn, "SELECT * FROM nilai_preferensi ORDER BY nilai");
                        $rows = mysqli_num_rows($result);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $pohon_id = $row['pohon_id'];
                            $nilai = $row['nilai'];
                            if ($lastValue != $nilai) {
                                $lastValue = $nilai;
                                $rank = $rows;
                            }
                            $query = "UPDATE nilai_preferensi SET peringkat = $rank WHERE pohon_id = $pohon_id";
                            mysqli_query($conn, $query);
                            $rows--;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery-3.6.0.js"></script>
    <script src="../../js/script.js"></script>
</body>

</html>
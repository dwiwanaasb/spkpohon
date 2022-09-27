<?php
require 'connection.php';

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function createPohon($post)
{
    global $conn;

    $jenisPohon = $post['jenisPohon'];
    $namaLatin = $post['namaLatin'];
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                    alert('Data gagal ditambahkan!');
            </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                    alert('Bukan gambar yang anda upload!');
            </script>";
        return false;
    }

    if ($ukuranFile > 10000000) {
        echo "<script>
                    alert('Ukuran gambar terlalu besar!');
            </script>";
        return false;
    }

    $namaFileBaru = $jenisPohon;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../img/fotoPohon/' . $namaFileBaru);

    $gambar = $namaFileBaru;

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO pohon (jenis_pohon, nama_latin, gambar) VALUES ('$jenisPohon','$namaLatin','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deletePohon($id)
{
    global $conn;

    $query = "DELETE FROM pohon WHERE id_pohon = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteKriteria($id)
{
    global $conn;

    $query = "DELETE FROM kriteria WHERE id_kriteria = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updatePohon($post, $id)
{
    global $conn;

    $jenisPohon = htmlspecialchars($post['jenisPohon']);
    $namaLatin = htmlspecialchars($post['namaLatin']);
    $gambarLama = $post['gambarLama'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        if ($error === 4) {
            echo "<script>
                    alert('Data gagal ditambahkan!');
            </script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = pathinfo($namaFile, PATHINFO_EXTENSION);

        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
                    alert('Bukan gambar yang anda upload!');
            </script>";
            return false;
        }

        if ($ukuranFile > 10000000) {
            echo "<script>
                    alert('Ukuran gambar terlalu besar!');
            </script>";
            return false;
        }

        $namaFileBaru = $jenisPohon;
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, '../../img/fotoPohon/' . $namaFileBaru);

        $gambar = $namaFileBaru;

        if (!$gambar) {
            return false;
        }
    }

    $query = "UPDATE pohon SET jenis_pohon = '$jenisPohon', nama_latin = '$namaLatin', gambar='$gambar' WHERE id_pohon = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateKriteria($post, $id)
{
    global $conn;

    $namaKriteria = htmlspecialchars($post['namaKriteria']);

    $query = "UPDATE kriteria SET nama_kriteria = '$namaKriteria' WHERE id_kriteria = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateProfile($post, $id)
{
    global $conn;

    $username = htmlspecialchars($post['username']);
    $password = mysqli_real_escape_string($conn, $post['password']);
    $cpassword = mysqli_real_escape_string($conn, $post['cpassword']);

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET username = '$username', password = '$password' WHERE id_user = $id";
        mysqli_query($conn, $query);

        $update = 'berhasil';
        return $update;
    } else {
        $update = 'error konfirmasi';
        return $update;
    }
}

function login($post)
{
    global $conn;
    $login = 'sukses';

    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars($post['password']);

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            if ($row['username'] == 'admin') {
                $login = 'admin';
            } else if ($row['username'] == 'decisionmaker') {
                $login = 'decisionmaker';
            } else {
                $login = 'wrong';
            }
        }
    }

    return $login;
}

function registrasi($post)
{
    global $conn;
    $registrasi = 'sukses';

    $username = htmlspecialchars($post['username']);
    $password = mysqli_real_escape_string($conn, $post['password']);
    $cpassword = mysqli_real_escape_string($conn, $post['cpassword']);

    if ($password === $cpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "SELECT username FROM users WHERE username = '$username'";
        $cek_user = mysqli_query($conn, $query);

        if (mysqli_fetch_assoc($cek_user)) {
            $registrasi = 'already';
            return $registrasi;
        } else {
            $query = "INSERT INTO users (username,password) VALUES ('$username','$password')";
            mysqli_query($conn, $query);

            if (mysqli_affected_rows($conn) > 0) {
                echo "<script>
                    alert('Akun berhasil didaftarkan');
                    document.location.href = 'registrasi.php';
                </script>";
            }
        }
    } else {
        $registrasi = 'error konfirmasi';
        return $registrasi;
    }
}

function getForeignKeyKriteria($namaKriteria)
{
    global $conn;

    $kriteriaId = "SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$namaKriteria'";
    $result = mysqli_query($conn, $kriteriaId);
    $fk = mysqli_fetch_assoc($result);
    $fk_id = $fk['id_kriteria'];

    return $fk_id;
}

function createKriteria($post, $subkriteria)
{
    global $conn;

    $namaKriteria = htmlspecialchars($post['namaKriteria']);

    $query = "INSERT INTO kriteria (nama_kriteria) VALUES ('$namaKriteria')";
    mysqli_query($conn, $query);

    $fk_id = getForeignKeyKriteria($namaKriteria);

    foreach ($subkriteria as $sk) {
        $query = "INSERT INTO subkriteria (kriteria_id, nama_subkriteria) VALUES ($fk_id, '$sk')";
        mysqli_query($conn, $query);
    }

    return mysqli_affected_rows($conn);
}

function countForeignKriteria($namaKriteria)
{
    global $conn;

    $fk_id = getForeignKeyKriteria($namaKriteria);
    $query = "SELECT nama_subkriteria FROM subkriteria WHERE kriteria_id = $fk_id";
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return count($rows);
}

function countAlternatif()
{
    $data = query("SELECT COUNT(*) AS totalPohon FROM pohon")[0];

    return $data;
}

function countKriteria()
{
    $data = query("SELECT COUNT(*) AS totalKriteria FROM kriteria")[0];

    return $data;
}

function countUser()
{
    $data = query("SELECT COUNT(*) AS totalUser FROM users")[0];

    return $data;
}

function updatePrioritasRelatif($namaKriteria, $nilai)
{
    global $conn;

    $fk_id = getForeignKeyKriteria($namaKriteria);
    $query = "UPDATE prioritas_relatif SET nilai = $nilai WHERE kriteria_id = $fk_id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateEigenValue($namaKriteria, $nilai)
{
    global $conn;

    $fk_id = getForeignKeyKriteria($namaKriteria);
    $query = "UPDATE nilai_eigen SET nilai = $nilai WHERE kriteria_id = $fk_id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function updateBobotKriteria($namaKriteria, $nilai)
{
    global $conn;

    $query = "UPDATE kriteria SET bobot = $nilai WHERE nama_kriteria = '$namaKriteria'";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function selectSubKriteria($namaKriteria)
{
    $fk_id = getForeignKeyKriteria($namaKriteria);
    $data = query("SELECT * FROM subkriteria WHERE kriteria_id = $fk_id");

    return $data;
}

function updateMatriksPerbandingan($simpanKriteria, $nilai, $namaKriteria, $i)
{
    global $conn;

    $simpanKriteria = $_POST["pilKriteria"];
    $nilai = $_POST["nilaiPerbandingan"];

    for ($x = 0; $x < $i; $x++) {
        if ($simpanKriteria[$x] != $namaKriteria) {
            $nilai[$x] = 1 / $nilai[$x];
        }
    }
    $query = query("SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$namaKriteria'")[0];
    $kriteria_id = $query["id_kriteria"];

    for ($x = 0; $x < $i; $x++) {
        $query = query("SELECT id_kriteria FROM kriteria");
        $colKriteria_id = $query[$x]["id_kriteria"];

        $query = "UPDATE matriks_perbandingan SET nilai = $nilai[$x] WHERE kriteria_id = $kriteria_id AND colKriteria_id = $colKriteria_id";
        mysqli_query($conn, $query);
    }

    return $query;
}

function updateMatriksKeputusan($namaPohon, $kriteria, $simpanSubkriteria)
{
    global $conn;

    $query = query("SELECT id_pohon FROM pohon WHERE jenis_pohon = '$namaPohon'")[0];
    $pohon_id = $query["id_pohon"];

    $query = query("SELECT id_kriteria FROM kriteria WHERE nama_kriteria = '$kriteria'")[0];
    $kriteria_id = $query["id_kriteria"];

    $query = query("SELECT nilai FROM subkriteria WHERE nama_subkriteria = '$simpanSubkriteria'")[0];
    $nilai_subkriteria = $query["nilai"];

    $query = "UPDATE matriks_keputusan SET nilai = $nilai_subkriteria WHERE pohon_id = $pohon_id AND kriteria_id = $kriteria_id";
    mysqli_query($conn, $query);


    $query = "UPDATE data_awal SET nilai = '$simpanSubkriteria' WHERE pohon_id = $pohon_id AND kriteria_id = $kriteria_id";
    mysqli_query($conn, $query);

    return $query;
}

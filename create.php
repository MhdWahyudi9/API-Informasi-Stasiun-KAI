<?php
    require("koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $kota = $_POST['kota'];
        $luas = $_POST['luas'];
        $sejarah = $_POST['sejarah'];
        $foto = $_POST['foto'];

        $query = "INSERT INTO tbl_stasiunkai (nama, kota, luas, sejarah, foto) VALUES ('$nama', '$kota', '$luas', '$sejarah', '$foto')";
        $execute = mysqli_query($connect, $query);

        $affected = mysqli_affected_rows($connect);

        if ($affected > 0) {
            $response["code"] = 1;
            $response["message"] = "Data Berhasil Disimpan";
        } else {
            $response["code"] = 0;
            $response["message"] = "Gagal Menyimpan Data";
        }

    } else {
        $response["code"] = 0;
        $response["message"] = "Tidak Ada Post Data";
    }

    echo json_encode($response);
    mysqli_close($connect);
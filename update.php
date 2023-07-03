<?php
    require("koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $kota = $_POST['kota'];
        $luas = $_POST['luas'];
        $sejarah = $_POST['sejarah'];
        $foto = $_POST['foto'];

        $query = "UPDATE tbl_stasiunkai SET nama='$nama', kota='$kota', luas='$luas', sejarah='$sejarah', foto='$foto' WHERE id='$id'";
        $execute = mysqli_query($connect, $query);

        $affected = mysqli_affected_rows($connect);

        if ($affected > 0) {
            $response["code"] = 1;
            $response["message"] = "Data Berhasil Diubah";
        } else {
            $response["code"] = 0;
            $response["message"] = "Gagal Mengubah Data";
        }

    } else {
        $response["code"] = 0;
        $response["message"] = "Tidak Ada Post Data";
    }

    echo json_encode($response);
    mysqli_close($connect);
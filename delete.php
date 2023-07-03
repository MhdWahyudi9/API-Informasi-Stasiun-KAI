<?php
    require("koneksi.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];

        $query = "DELETE FROM tbl_stasiunkai WHERE id='$id'";
        $execute = mysqli_query($connect, $query);

        $affected = mysqli_affected_rows($connect);

        if ($affected > 0) {
            $response["code"] = 1;
            $response["message"] = "Data Berhasil Dihapus";
        } else {
            $response["code"] = 0;
            $response["message"] = "Gagal Menghapus Data";
        }

    } else {
        $response["code"] = 0;
        $response["message"] = "Tidak Ada Post Data";
    }

    echo json_encode($response);
    mysqli_close($connect);
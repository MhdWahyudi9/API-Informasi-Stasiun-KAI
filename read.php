<?php
    require("koneksi.php");

    $query = "SELECT * FROM tbl_stasiunkai";

    $execute = mysqli_query($connect, $query);

    $affected = mysqli_affected_rows($connect);

    if ($affected > 0) {
        $response["code"] = 1;
        $response["message"] = "Data Tersedia";
        $response["data"] = array();

        while($data = mysqli_fetch_object($execute)){
            $temp["id"] = $data->id;
            $temp["nama"] = $data->nama;
            $temp["luas"] = $data->luas;
            $temp["sejarah"] = $data->sejarah;
            $temp["kota"] = $data->kota;
            $temp["foto"] = $data->foto;

            array_push($response["data"], $temp);
        }
    } else {
        $response["code"] = 0;
        $response["message"] = "Data Tidak Tersedia";
    }

    echo json_encode($response);
    mysqli_close($connect);
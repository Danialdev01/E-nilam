<?php
    require_once('../../db/config.php');

    // get id pengguna
    $jenis = $_GET['jenis'];
    $id_pengguna = $_GET['id_pengguna'];

    // check jenis pengguna
    if($jenis == "perpustakawan"){
        $delete_perpustakawan = mysqli_query($connect, "DELETE FROM perpustakawan WHERE id_perpustakawan = '$id_pengguna'");
    }
    else if($jenis == "pelajar"){
        $delete_pelajar = mysqli_query($connect, "DELETE FROM pelajar WHERE id_pelajar = '$id_pengguna'");
    }
    else{
        echo "error";
    }
    header("location:../pengguna");

?>
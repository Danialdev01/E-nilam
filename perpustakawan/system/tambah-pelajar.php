<?php
    require_once('../../db/config.php');

    $ic_pelajar = $_POST['ic_pelajar'];
    $no_kad_pelajar= $_POST['no_kad_pelajar'];
    $nama_pelajar = $_POST['nama_pelajar'];
    $id_kelas = $_POST['id_kelas'];
     	
    $tambah_pelajar = mysqli_query($connect, "INSERT INTO pelajar VALUES (NULL,'$ic_pelajar','$no_kad_pelajar','$nama_pelajar',NULL,'$id_kelas','0','0','0','1')");
    header("location:../pengguna")
?>
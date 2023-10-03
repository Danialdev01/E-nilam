<?php
    include('../../db/config.php');

    echo $id_buku = $_POST['id_buku'];
    echo $tajuk_buku = $_POST['tajuk_buku'];
    echo $id_genre = $_POST['id_genre'];
    echo $bahasa_buku = $_POST['bahasa_buku'];
    echo $penulis_buku = $_POST['penulis_buku'];
    echo $penerbit_buku = $_POST['penerbit_buku'];
    echo $penerangan_buku = $_POST['penerangan_buku'];

    $upload = mysqli_query($connect, "UPDATE buku SET tajuk_buku='$tajuk_buku',id_genre='$id_genre',bahasa_buku='$bahasa_buku',penulis_buku='$penulis_buku',penerbit_buku='$penerbit_buku',penerangan_buku='$penerangan_buku' WHERE id_buku ='$id_buku'");
    header("location:../buku");

?>
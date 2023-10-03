<?php
    require_once('../../db/config.php');

    $id_buku = $_GET['id_buku'];

    $delete_buku = mysqli_query($connect, "DELETE FROM buku WHERE id_buku = '$id_buku'");
    header("location:../buku");
?>
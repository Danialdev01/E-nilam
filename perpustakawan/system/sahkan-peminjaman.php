<?php
    session_start();
    require_once('../../db/config.php');
    
    $id_permohonan = $_GET['id_permohonan'];

    // tukar id kepada 2 untuk sahkan
    $sahkan_permohonan = mysqli_query($connect, "UPDATE permohonan SET status_permohonan = '2' WHERE id_permohonan = '$id_permohonan'; ");
    
    // cari id pelajar
    $id_pelajarFind_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_permohonan ='$id_permohonan'");
    $id_pelajarFind = mysqli_fetch_array($id_pelajarFind_sql);
    $id_pelajar = $id_pelajarFind['id_pelajar'];
    
    // cari bilangan pinjaman lama pelajar
    $bil_pinjaman_pelajarFind_sql = mysqli_query($connect, "SELECT bil_pinjaman_pelajar FROM pelajar WHERE id_pelajar = '$id_pelajar'");
    $bil_pinjaman_pelajarFind = mysqli_fetch_array($bil_pinjaman_pelajarFind_sql);
    $bil_pinjaman_pelajar = $bil_pinjaman_pelajarFind['bil_pinjaman_pelajar'];
    $bil_pinjaman_pelajar += 1; 

    // tambah nilai pinjaman kepada murid
    $tambah_bil_pinjaman_pelajar_sql = mysqli_query($connect, "UPDATE pelajar SET bil_pinjaman_pelajar = '$bil_pinjaman_pelajar' WHERE id_pelajar = '$id_pelajar'");
    
    $id_buku = $id_pelajarFind['id_buku'];
    $bil_pinjaman_bukuFind_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
    $bil_pinjaman_bukuFind = mysqli_fetch_array($bil_pinjaman_bukuFind_sql);
    $bil_pinjaman_buku = $bil_pinjaman_bukuFind['bil_pinjaman_buku'];
    $bil_pinjaman_buku += 1;
    $tambah_bil_pinjaman_buku_sql = mysqli_query($connect, "UPDATE buku SET bil_pinjaman_buku = '$bil_pinjaman_buku' WHERE id_buku = '$id_buku'");
    
    

    // prompt berjaya
    $_SESSION['prompt'] = "Berjaya sahkan";
    header("location:../permohonan");
?>
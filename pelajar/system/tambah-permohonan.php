<?php
    session_start();
    require_once('../../db/config.php');

    $ic_pelajar = $_SESSION['icCurrentPengguna'];
    $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE ic_pelajar = '$ic_pelajar'");
    $pelajar = mysqli_fetch_array($pelajar_sql);

    $id_buku = $_POST['id_buku'];
    // CLEANUP buat kalau user mohon buku yang sama dia akan kluar error

    if($check_duplicate_permohonan = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_buku"))
    
    $tarikh_permohonan = $_POST['tarikh_permohonan'];
    
    $id_pelajar = $pelajar['id_pelajar'];

    $tarikh_hantar = date("Y/m/d", strtotime("$tarikh_permohonan +1 week"));

    $tambah_permohonan = mysqli_query($connect, "INSERT INTO permohonan VALUES (NULL,'$tarikh_permohonan','$tarikh_hantar','$id_pelajar','$id_buku','1')");
    header("location:../list-buku.php");

    $_SESSION['prompt'] = "Berjaya pinjam buku";


?>

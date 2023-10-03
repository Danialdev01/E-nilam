<?php
    require_once('../../db/config.php');
    session_start();

    $id_permohonan = $_GET['id_permohonan'];

    $delete_permohonan = mysqli_query($connect, "DELETE FROM permohonan WHERE id_permohonan = '$id_permohonan'");
    
    $_SESSION['prompt'] = "Berjaya Delete";
    header("location:../");
?>
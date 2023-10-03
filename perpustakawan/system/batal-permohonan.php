<?php
    require_once('../../db/config.php');

    $id_permohonan = $_GET['id_permohonan'];

    $batal_permohonan = mysqli_query($connect, "UPDATE permohonan SET status_permohonan = '0' WHERE id_permohonan = '$id_permohonan'; ");
    header("location:../permohonan");
?>
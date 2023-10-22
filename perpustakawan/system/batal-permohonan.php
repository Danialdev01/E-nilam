<?php
    require_once('../../db/config.php');

    $id_permohonan = $_GET['id_permohonan'];

    $batal_permohonan = mysqli_query($connect, "DELETE FROM permohonan WHERE id_permohonan = '$id_permohonan'; ");
    header("location:../permohonan");
?>
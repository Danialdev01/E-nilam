<?php
    session_start();
    require_once('../../db/config.php');

    // get id pelajar
    $ic_pelajar = $_SESSION['icCurrentPengguna'];
    $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE ic_pelajar = '$ic_pelajar'");
    $pelajar = mysqli_fetch_array($pelajar_sql);

    $tajuk_bahan   = $_POST['tajuk_bahan'];
    $tarikh_bacaan  = $_POST['tarikh_bacaan'];
    $bahasa_bahan  = $_POST['bahasa_bahan'];
    $jenis_bahan  = $_POST['jenis_bahan'];
    $genre_buku  = $_POST['genre_buku'];
    $jenis_buku  = $_POST['jenis_buku'];
    $bil_mukasurat_buku  = $_POST['bil_mukasurat_buku'];
    $kategori_bahan  = $_POST['kategori_bahan'];
    $cara_penyampaian_bahan  = $_POST['cara_penyampaian_bahan'];
    $ringkasan_bahan = $_POST['ringkasan_bahan'];
    $id_pelajar  = $pelajar['id_pelajar'];
    $status_permohonan  = "1";

    // test
    // echo $id_nilam ; echo "<br>"; echo $tajuk_bahan ; echo "<br>"; echo $tarikh_bacaan; echo "<br>"; echo $bahasa_bahan; echo "<br>"; echo $jenis_bahan; echo "<br>"; echo $genre_buku; echo "<br>"; echo $jenis_buku; echo "<br>"; echo $bil_mukasurat_buku; echo "<br>"; echo $kategori_bahan; echo "<br>"; echo $cara_penyampaian_bahan; echo "<br>"; echo $ringkasan_bahan; echo "<br>"; echo $id_pelajar; echo "<br>"; echo $status_permohonan ;
    $bil_bacaan_pelajar = $pelajar['bil_pinjaman_pelajar'];
    $bil_bacaan_pelajar += 1;
    $update_pelajar = mysqli_query($connect, "UPDATE pelajar SET `bil_bacaan_pelajar`='$bil_bacaan_pelajar' WHERE id_pelajar ='$id_pelajar'");
    $tambah_nilam = mysqli_query($connect, "INSERT INTO nilam(`id_nilam`, `tajuk_bahan`, `tarikh_bacaan`, `bahasa_bahan`, `jenis_bahan`, `genre_buku`, `jenis_buku`, `bil_mukasurat_buku`, `katergori_bahan`, `cara_penyampaian_bahan`, `ringkasan_bahan`, `id_pelajar`, `status_permohonan`) VALUES (NULL,'$tajuk_bahan','$tarikh_bacaan','$bahasa_bahan','$jenis_bahan','$genre_buku','$jenis_buku','$bil_mukasurat_buku','$kategori_bahan','$cara_penyampaian_bahan','$ringkasan_bahan','$id_pelajar','$status_permohonan')");
    header("location:../rekod-bacaan.php");
    $_SESSION['prompt'] = "Berjaya tambah nilam";

?>
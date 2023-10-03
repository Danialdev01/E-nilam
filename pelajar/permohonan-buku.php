<?php
    $dir_location_home = "..";
    include("./system/is-logged.php");

    require_once("../db/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Permohonan"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="list-buku"; $dir_location=".."; include("../components/header-pelajar.php") ?>
    <?php
        $id_buku = $_GET['id_buku'];
        $buku_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
        $buku = mysqli_fetch_array($buku_sql);

    ?>

    <center>
        <h2 style="font-size: 1.2rem;font-weight:bold">Tajuk : <?php echo $buku['tajuk_buku']?></h2>
    </center>
    <div class="main-container p-3">

        <div class="md:flex pt-2">

            <!-- cover buku -->
            <div class="w-full">
                <center>
                    <img src="../perpustakawan/system/uploads/<?php echo $buku['img_location_buku']?>" alt="cover buku">
                </center>
            </div>
                
            <!-- desc buku -->
            <div class="w-full">
                <br><br>
                Penulis : <?php echo $buku['penulis_buku']?><br>
                Penerbit : <?php echo $buku['penerbit_buku']?><br>
                Tentang Buku : <?php echo $buku['penerangan_buku']?><br>

                <div class="permohonan-container p-1 rounded drop-shadow">
                    <br><br>
                    <form style="width:fit-content;filter: drop-shadow(0 10px 8px rgb(0 0 0 / 0.04)) drop-shadow(0 4px 3px rgb(0 0 0 / 0.1)) !important;" action="./system/tambah-permohonan.php" method="post">
                        <b>Mohon Pinjaman Buku</b><br>
                        <p style="padding-top:10px">Tarikh Pinjaman  : <input type="date" class="rounded" name="tarikh_permohonan" id="" style="height: 40px;"></p>
                        <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']?>">
                        <center>
                            <div class="submit pt-3 w-full">
                                <input style="width:165px;color:white" class="rounded bg-primary" type="submit" value="mohon">
                            </div>
                        </center>
                    </form>
                </div>
            </div>

        </div>

    </div>
    
    <?php include("../components/footer.php") ?>
</body>
</html>
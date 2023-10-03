<?php
    $dir_location_home = "../";
    include("./system/is-logged.php");
    include("../db/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Dashboard Perpustakawan"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="dashboard"; $dir_location=".."; include("../components/header-perpustakawan.php") ?>

    <div class="main-container">
        <div class="block lg:flex">
            <div class="w-full p-4">
                <center>
                    <a href="./buku/">
                        <div class="bg-primary text-white rounded-md max-w-xs p-2 h-20">
                            <h3 class="font-bold">Buku Berdaftar</h3>
    
                            <?php 
                                $buku_berdaftar_sql = mysqli_query($connect, "SELECT * FROM buku WHERE status_buku = '1'");
    
                                $i = 0;
                                while($buku_berdaftar = mysqli_fetch_array($buku_berdaftar_sql)){
                                    $i = $i + 1;
                                }
                                echo $i;
    
                            ?>
                        </div>
                    </a>
                </center>
            </div>
            <div class="w-full p-4">
                <center>
                    <a href="./pengguna/">
                        <div class="bg-primary text-white rounded-md max-w-xs p-2 h-20">
                            <h3 class="font-bold">Pelajar Berdaftar</h3>
    
                            <?php 
                                $pelajar_berdaftar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE status_pelajar = '1'");
    
                                $i = 0;
                                while($pelajar_berdaftar = mysqli_fetch_array($pelajar_berdaftar_sql)){
                                    $i = $i + 1;
                                }
                                echo $i;
    
                            ?>
                        </div>
                    </a>
                </center>
            </div>
            <div class="w-full p-4">
                <center>
                    <a href="./permohonan/">
                        <div class="bg-primary text-white rounded-md max-w-xs p-2 h-20">
                            <h3 class="font-bold">Permohonan</h3>
                            <?php 
                                $permohonan_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE status_permohonan = '1'");
    
                                $i = 0;
                                while($permohonan = mysqli_fetch_array($permohonan_sql)){
                                    $i = $i + 1;
                                }
                                echo $i;
    
                            ?>
                        </div>
                    </a>
                </center>
            </div>
        </div>

        <br>

        <div class="buku-terhangat-container">
            <h2 class="font-bold text-lg">Buku Terhangat :</h2>

            <div class="buku-terhangat-list flex pt-4 flex-wrap">
                <?php 
                    $buku_terhangat_sql = mysqli_query($connect, "SELECT * FROM buku ORDER BY bil_pinjaman_buku DESC");

                    $i = 1;
                    while(($buku_terhangat = mysqli_fetch_array($buku_terhangat_sql)) && ($i <= 4)){
                        $penulis = $buku_terhangat['penulis_buku'];
                        $tajuk = $buku_terhangat['tajuk_buku'];
                        $img_name = $buku_terhangat['img_location_buku'];
                        $bil_pinjaman = $buku_terhangat['bil_pinjaman_buku'];
                        echo "
                            <div class=\"book read\">
                                <div class=\"cover\">
                                    <img src=\"../perpustakawan/system/uploads/$img_name\">
                                </div>
                                <div class=\"description\">
                                    <p class=\"title\"><span style=\"font-size: 0.9rem;max-width:100%\">$tajuk</span><br>
                                        <span class=\"author\">$penulis</span><br>
                                        <span style=\"font-size:0.8rem\" class=\"bil_pinjaman\">Bil Pinjaman $bil_pinjaman</span>
                                    </p>
                                </div>
                            </div>
                        ";
                        echo "<br>";
                        $i ++;
                    }
                ?>
            </div>
        </div>
    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>
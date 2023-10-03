<?php
    $dir_location_home = "../";
    include("./system/is-logged.php");
    require_once('../db/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Dashboard"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="dashboard"; $dir_location="../"; include("../components/header-pelajar.php") ?>

    <div class="main-container">
        <!-- user greeting  -->
        <p class="text-lg"><span>Hi, </span>
        <span style="color: blue;">
            <?php
                // nama pendek pelajar
                session_start();
                $ic_pelajar = $_SESSION['icCurrentPengguna'];
                $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE ic_pelajar ='$ic_pelajar'");
                $pelajar = mysqli_fetch_array($pelajar_sql);
                $nama_pelajar = $pelajar['nama_pelajar'];
                $nama_pendek = strtolower(strtok($nama_pelajar, " "));
                echo ucfirst($nama_pendek);
            ?>
        </span>
        </p>
        <br>
        <div class="statistik-container block md:flex">
            <div class="w-full">
                <div style="padding-left:3%;padding-right:3%" class="card-container">
                    <center>
                        <div class="card rounded-md bg-primary py-3 text-white">
                            <p>Rank</p>
                            <div class="flex" style="width:fit-content">
                                <?php
                                    $user_id = $pelajar['id_pelajar']; 
                                    $query = "SELECT bil_bacaan_pelajar, id_pelajar FROM pelajar WHERE id_pelajar = '$user_id'";
                                    $result = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($result);
                                    $user_points = $row['bil_bacaan_pelajar'];
        
                                    // sort rank pelajar menggunakan bil_bacaan_pelajar , kalau sama nilai akan sort guna id_pelajar
                                    $query = "SELECT COUNT(*) AS rank FROM pelajar WHERE bil_bacaan_pelajar > $user_points OR (bil_bacaan_pelajar = $user_points AND id_pelajar < $user_id)";
                                    $result = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_assoc($result);
                                    $user_rank = $row['rank'] + 1;
        
                                    if($user_rank <= 3){
                                        echo "
                                        <img class=\"w-8 h-6\" src=\"../src/assets/images/crowns/crown$user_rank.png\" alt=\"crown\">
                                        ";
                                    }
                                ?>
                                <p><?php echo $user_rank ?>th</p>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <br>
            <div class="w-full">
                <div style="padding-left:3%;padding-right:3%" class="card-container">
                    <center>
                        <div class="card rounded-md bg-primary py-3 text-white">
                            <p>Bil Bacaan Nilam</p>
                            <div class="bil-bacaan-text">
                                <?php 
                                    echo $pelajar['bil_bacaan_pelajar'];
                                ?>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
            <br>
            <div class="w-full">
                <div style="padding-left:3%;padding-right:3%" class="card-container">
                    <center>
                        <div class="card rounded-md bg-primary py-3 text-white">
                            <p>Bil Pinjaman Buku</p>
                            <div class="bil-bacaan-text">
                                <?php 
                                    echo $pelajar['bil_pinjaman_pelajar'];
                                ?>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>

        <br>
        <div class="user-permohonan rounded p-2" style="border: 1px solid #868584;width:100%;min-height:10vh">
            <h2><b>Permohonan Pinjaman Buku :</b></h2>
            <br>
            <center>
                <?php
                    $id_pelajar = $pelajar['id_pelajar'];
                    // $id_pelajar = 1;

                    // display permohonan pinjaman buku pelajar 
                    $permohonan_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_pelajar = '$id_pelajar' AND status_permohonan = '1'");
                    while($permohonan = mysqli_fetch_array($permohonan_sql)){
                        ?>
                        <div class="permohonan-peminjaman-buku-container p-1">
                            <div style="padding-left: 3%;padding:1%" class="permohonan-peminjaman-buku bg-primary rounded-md flex">
                                <div class="w-full text-left flex">
                                    <img style="width: 30px;height:30px;" src="../src/assets/images/icons/pending.png" alt="pending icon">
                                    <p class="text-white pl-2">
                                        <?php 
                                            $id_buku = $permohonan['id_buku'];
                                            $buku_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku ='$id_buku'");
                                            $buku = mysqli_fetch_array($buku_sql);
                                            echo $buku['tajuk_buku']
                                        ?>
                                    </p>
                                </div>
                                <div class="w-full flex justify-end">
                                    <a href="./system/delete-permohonan.php?id_permohonan=<?php echo $permohonan['id_permohonan']?>">
                                        <button class="text-red-700">Delete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                    // kalau user takde permohonan perminjaman 
                    $permohonan_check_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_pelajar = '$id_pelajar' AND status_permohonan = 1");
                    if(($permohonan_check = mysqli_fetch_array($permohonan_check_sql)) == NULL){
                        echo "Tiada pinjaman buku. Sila lihat buku <a style=\"color:blue\" href=\"./list-buku.php\">terkini</a>";
                    }

                ?>
            </center>
            <br>
        </div>

        <br>
        <div class="user-permohonan rounded p-2" style="border: 1px solid #868584;width:100%;min-height:10vh">
            <h2><b>Buku yang sudah disahkan :</b></h2>
            <br>
            <center>
                <?php
                    $id_pelajar = $pelajar['id_pelajar'];
                    // $id_pelajar = 1;

                    // display permohonan pinjaman buku pelajar 
                    $permohonan_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_pelajar = '$id_pelajar' AND status_permohonan = '2'");
                    while($permohonan = mysqli_fetch_array($permohonan_sql)){
                        ?>
                        <div class="permohonan-peminjaman-buku-container p-1">
                            <div style="padding-left: 3%;padding:1%" class="permohonan-peminjaman-buku bg-primary rounded-md flex">
                                <div class="w-full text-left flex">
                                    <img style="width: 30px;height:30px;" src="../src/assets/images/icons/pending.png" alt="pending icon">
                                    <p class="text-white pl-2">
                                        <?php 
                                            $id_buku = $permohonan['id_buku'];
                                            $buku_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku ='$id_buku'");
                                            $buku = mysqli_fetch_array($buku_sql);
                                            echo $buku['tajuk_buku']
                                        ?>
                                    </p>
                                </div>
                                <p class="text-white">
                                    <?php
                                        $tarikh_hantar = date_create($permohonan['tarikh_hantar']);
                                        // echo date_format($tarikh_hantar,"d/m/Y");

                                        if (strtotime($permohonan['tarikh_hantar']) < time()) {
                                            ?>
                                            <p class="text-red-500">
                                                <?php echo date_format($tarikh_hantar, "d/m/Y")?> 
                                            </p>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="text-white">
                                                <?php echo date_format($tarikh_hantar, "d/m/Y")?> 
                                            </p>
                                            <?php
                                        }
                                    ?>
                                </p>
                                <div class="w-full flex justify-end">
                                    <a href="./system/delete-permohonan.php?id_permohonan=<?php echo $permohonan['id_permohonan']?>">
                                        <button class="text-red-700">Delete</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }

                ?>
            </center>
            <br>
        </div> 

    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>
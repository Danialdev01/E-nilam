<?php
    $dir_location_home = "../";
    require_once('../db/config.php');
    include("./system/is-logged.php");

    //pelajar
    $ic_pelajar = $_SESSION['icCurrentPengguna'];
    $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE ic_pelajar ='$ic_pelajar'");
    $pelajar = mysqli_fetch_array($pelajar_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Rank"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="rank"; $dir_location="../"; include("../components/header-pelajar.php") ?>

    <div class="main-container px-2">
        <p>
            <?php 
                // cari nilai bilangan bacaan pelajar
                $user_id = $pelajar['id_pelajar']; 
                $query = "SELECT bil_bacaan_pelajar, id_pelajar FROM pelajar WHERE id_pelajar = '$user_id'";
                $result = mysqli_query($connect, $query);
                $row = mysqli_fetch_array($result);
                $bil_bacaan_pelajar = $row['bil_bacaan_pelajar'];

                // sort rank pelajar menggunakan bil_bacaan_pelajar , kalau sama nilai akan sort guna id_pelajar
                $query_p = "SELECT rank
                            FROM (
                                SELECT id_pelajar, bil_bacaan_pelajar, bil_pinjaman_pelajar, 
                                (bil_bacaan_pelajar + bil_pinjaman_pelajar) AS semua_buku,
                                CASE
                                    WHEN bil_bacaan_pelajar = 0 AND bil_pinjaman_pelajar = 0 THEN NULL
                                    ELSE FIND_IN_SET((bil_bacaan_pelajar + bil_pinjaman_pelajar), (
                                        SELECT GROUP_CONCAT((bil_bacaan_pelajar + bil_pinjaman_pelajar) ORDER BY (bil_bacaan_pelajar + bil_pinjaman_pelajar) DESC)
                                        FROM pelajar
                                    ))
                                END AS rank
                                FROM pelajar
                            ) AS ranks
                            WHERE id_pelajar = $user_id";
                $result_p = mysqli_query($connect, $query_p);
                $row_p = mysqli_fetch_assoc($result_p);
                $user_rank = $row_p['rank'];
                if($user_rank != NULL){
                    echo "You are " . $user_rank ."th";
                }
                else{
                    echo "You havent done anything";
                }
            ?>
        </p>

        <center>
            <h2 class="font-semibold text-lg pb-5">Rank Pelajar</h2>
            <div class="list-pelajar-rank text-left max-w-lg bg-primary rounded p-4 text-white ">
                <h3 class="font-bold text-white">Top 10</h3>
                <?php

                    $i = 1;

                    $pelajar_sql =  mysqli_query($connect, "SELECT * FROM pelajar ORDER BY GREATEST(bil_bacaan_pelajar, bil_pinjaman_pelajar) DESC");
                    
                    // list b
                    while(($pelajar = mysqli_fetch_assoc($pelajar_sql)) && ($i <= 10)){
                        
                        echo "<div class=\"flex\">";
                        // rank image
                        if($i <= 3){
                            echo "
                            <img style=\"margin-top:11px\" class=\"w-8 h-6\" src=\"../src/assets/images/crowns/crown$i.png\" alt=\"crown\">
                            
                            ";
                        }
                        
                        ?>
                        <p class="pl-3 py-3 pr-3"><?php echo $i . ". " . $pelajar['nama_pelajar']?></p>
                        <p class="lg:block hidden" style="margin-top:11px;background-color:aqua;height:20px;width:fit-content;padding-left:3px;padding-right:3px;padding-bottom:2px;border-radius:10px;color:black"><span style="margin-bottom: 24px;"><?php echo $pelajar['bil_pinjaman_pelajar'] + $pelajar['bil_bacaan_pelajar']?></span></p>
                         
                        </div>
                        <hr style="border:1px solid #424242;width:100%">
                        <?php
                        $i++;
                    }
                ?>
            </div>
        </center>
    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>

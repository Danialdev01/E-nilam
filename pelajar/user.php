<?php
    $dir_location_home = "../";
    include("./system/is-logged.php");
    require_once('../db/config.php');
?>
<?php
    session_start();
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
    <?php $dir_location=".."; $title="Infomasi Pelajar"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page=""; $dir_location="../"; include("../components/header-pelajar.php") ?>

    <div class="main-container">
        <!-- user greeting  -->
        <p class="text-lg p-2"><span>Hi, </span>
            <span style="color: blue;">
                <?php
                    // nama pendek pelajar
                    $nama_pelajar = $pelajar['nama_pelajar'];
                    $nama_pendek = strtolower($nama_pelajar);
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
        <br><br>
        <center>
            <div class="max-w-lg card rounded-md bg-primary py-3 text-white">
                <h2>Info Pelajar</h2>
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="border text-center text-sm font-light dark:border-neutral-500">
                                    <tbody>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td
                                                class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                Kelas 
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                <?php
                                                    $id_kelas = $pelajar['id_kelas'];
                                                    $kelas_sql = mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
                                                    $kelas = mysqli_fetch_array($kelas_sql);
                                                    echo $kelas['nama_kelas'] . " " . $kelas['kursus_pelajar'];
                                                ?>
                                            </td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td
                                                class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                No Kad Pelajar 
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                <?php
                                                    echo $pelajar['no_kad_pelajar'];
                                                ?>
                                            </td>
                                        </tr>
                                        <tr class="border-b dark:border-neutral-500">
                                            <td
                                                class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                Ic Pelajar
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                <?php
                                                    echo $pelajar['ic_pelajar'];
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </center>

    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>
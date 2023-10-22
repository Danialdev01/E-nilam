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

        <center>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-hidden">
                            <table class="min-w-full border text-center text-sm font-light dark:border-neutral-500">
                                <thead class="border-b font-medium dark:border-neutral-500">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Bil
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Tajuk Bahan
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Tarikh Permohonan
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Bahasa Bahan
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Genre
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $id_pelajar = $pelajar['id_pelajar'];
                                        $buku_telah_dibaca_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE id_pelajar = '$id_pelajar'");
                                        $i = 0;
                                        while($buku_telah_dibaca = mysqli_fetch_array($buku_telah_dibaca_sql)){
                                            $i ++;
                                            ?>
    
                                            <tr class="border-b dark:border-neutral-500">
                                                <td class="whitespace-nowrap border-r px-6 py-4 font-medium dark:border-neutral-500">
                                                    <?php echo $i;?>
                                                </td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <?php 
                                                        $id_buku = $buku_telah_dibaca['id_buku'];
                                                        $buku_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
                                                        $buku = mysqli_fetch_array($buku_sql);
                                                        echo $buku['tajuk_buku'];
                                                    
                                                    ?>
                                                </td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <?php echo $buku_telah_dibaca['tarikh_permohonan'];?>
                                                </td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <?php echo $buku['bahasa_buku']?>
                                                </td>
                                                <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                                    <?php 
                                                    $id_genre = $buku['id_genre'];
                                                    $genre_buku_sql = mysqli_query($connect, "SELECT * FROM genre WHERE id_genre ='$id_genre'");
                                                    $genre_buku = mysqli_fetch_array($genre_buku_sql);
                                                    echo $genre_buku['nama_genre'];
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </center>

    </div>
    <?php include("../components/footer.php") ?>

</body>
</html>
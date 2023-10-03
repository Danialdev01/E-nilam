<?php
    $dir_location_home = "../../";
    include("./system/is-logged.php");
    require_once('../../db/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location="../.."; $title="Permohonan"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="permohonan"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <div class="main-container px-3">
        <table id="myTable">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Nama pelajar</th>
                    <th>Tajuk Buku</th>
                    <th>Sahkan</th>
                    <th>Batal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $permohonan_sql = mysqli_query($connect, "SELECT * FROM permohonan WHERE status_permohonan = '1'");
                    $i = 0;
                    while($permohonan = mysqli_fetch_array($permohonan_sql)){
                        $i ++;
                        ?>
                        <tr>
                            <td><?php echo $i?></td>
                            <td>
                                <?php
                                    // print nama pelajar
                                    $id_pelajar = $permohonan['id_pelajar'];
                                    $pelajar_sql = mysqli_query($connect, "SELECT nama_pelajar FROM pelajar WHERE id_pelajar = '$id_pelajar'");
                                    $pelajar = mysqli_fetch_array($pelajar_sql);
                                    echo $pelajar['nama_pelajar'];
                                ?>
                            </td>
                            <td>
                                <?php 
                                    // print tajuk buku 
                                    $id_buku = $permohonan['id_buku'];
                                    $buku_sql = mysqli_query($connect, "SELECT tajuk_buku FROM buku WHERE id_buku = '$id_buku'");
                                    $buku = mysqli_fetch_array($buku_sql);
                                    echo $buku['tajuk_buku'];
                                ?>
                            </td>
                            <td>
                                <a href="../system/sahkan-peminjaman.php?id_permohonan=<?php echo $permohonan['id_permohonan']?>">
                                    <button>Sahkan</button>
                                </a>
                            </td>
                            <td>
                                <a href="../system/batal-permohonan.php?id_permohonan=<?php echo $permohonan['id_permohonan']?>">
                                    <button>Batal</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php include("../../components/footer.php") ?>
    <script>
        new DataTable('#myTable', {
            order: [
                [2, 'asc'],
                [0, 'desc']
            ]
        });
    </script>
</body>
</html>
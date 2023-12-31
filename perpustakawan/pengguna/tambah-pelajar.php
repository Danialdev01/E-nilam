<?php
    $dir_location_home = "../../";
    include("../system/is-logged.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/assets/css/main.css">
    <?php $dir_location="../.."; $title="Tambah Pelajar"; include('../../components/head.php') ?>
    <style>
        
    </style>
</head>
<body>
    <?php $type_page="pengguna"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <div class="main-container">
        <center>
            <h2>Tambah Pelajar</h2>
            <div class="form-tambah-perpustakawan">
                <!-- CLEANUP cantikkan form pelajar -->
                <form action="../system/tambah-pelajar.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <td>IC PELAJAR</td>
                                <td>
                                    <input name="ic_pelajar" type="text">                                
                                </td>
                            </tr>
                            <tr>
                                <td>NO KAD PELAJAR</td>
                                <td>
                                    <input nama="no_kad_pelajar" type="text">                                
                                </td>
                            </tr>
                            <tr>
                                <td>NAMA PELAJAR</td>
                                <td>
                                    <input name="nama_pelajar" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>KELAS</td>
                                <td>
                                    <select name="id_kelas" id="">
                                        <option value="">Pilih Kelas</option>
                                        <?php 
                                            require_once('../../db/config.php');
                                            
                                            $kelas_sql = mysqli_query($connect, "SELECT * FROM kelas");
                                            while($kelas = mysqli_fetch_array($kelas_sql)){
                                                ?>

                                                <option value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas'] . " " . $kelas['kursus_pelajar'] . " KOHORT " . $kelas['kohort_pelajar']?></option>

                                                <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <input name="tambah_pelajar" type="submit" value="Tambah" class="bg-gray-500 p-1 rounded text-white">
                </form>
            </div>
        </center>
    </div>

    <?php include("../../components/footer.php") ?>
</body>
</html>
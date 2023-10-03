<?php
    $dir_location_home = "../../";
    include("../system/is-logged.php");

    require_once('../../db/config.php');
    $id_pelajar = $_GET['id_pelajar'];

    $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE id_pelajar = '$id_pelajar'");
    $pelajar = mysqli_fetch_array($pelajar_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/assets/css/main.css">
    <?php $dir_location="../.."; $title="Kemaskini Pelajar"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="pengguna"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>
    
    <div class="main-container">
        <center>
            <h2>Kemaskini Pelajar</h2>
            <div class="form-tambah-perpustakawan">
                <!-- CLEANUP cantikkan form pelajar -->
                <!-- TODO backend kemaskini pelajar-->
                <form action="../system/kemaskini-pelajar.php" method="post">
                    <table>
                        <thead>
                            <tr>
                                <td>NAMA PELAJAR</td>
                                <td>
                                    <input value="<?php echo $pelajar['nama_pelajar']?>" name="nama_pelajar" type="text">
                                </td>
                            </tr>
                            <tr>
                                <td>IC PELAJAR</td>
                                <td>
                                    <input value="<?php echo $pelajar['ic_pelajar']?>" name="ic_pelajar" type="text">                                
                                </td>
                            </tr>
                            <tr>
                                <td>NO KAD PELAJAR</td>
                                <td>
                                    <input value="<?php echo $pelajar['no_kad_pelajar']?>" nama="no_kad_pelajar" type="text">                                
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

                                                <option <?php echo $kelas['id_kelas'] == $pelajar['id_kelas'] ? 'selected' : ''; ?> value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas'] . " " . $kelas['kursus_pelajar'] . " KOHORT " . $kelas['kohort_pelajar']?></option>

                                                <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <input name="kemaskini_pelajar" type="submit" value="Kemaskini" class="bg-gray-500 p-1 rounded text-white">
                </form>
                <br>
                <a href="./index.php"><button class="bg-red-500 text-white p-1 rounded">Cancle</button></a>
            </div>
        </center>
    </div>

    <?php include("../../components/footer.php") ?>
</body>
</html>
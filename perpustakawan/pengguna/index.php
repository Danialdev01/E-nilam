<?php
    $dir_location_home = "../../";
    include("../system/is-logged.php");
    include("../../db/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/assets/css/main.css">
    <?php $dir_location="../.."; $title="Pengguna"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="pengguna"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <?php include("../../components/error_masssage.php") ?>
    
    <div class="main-container">
        
        <!-- CLEANUP cantikkan button dekat form -->
        <!-- CLEANUP jadikan responsive JADIKAN TAB BAGI pelajar dan perpustakawan -->
        <center>
            <div class="pengguna max-w-2xl justify-center">
                <div class="pelajar p-1 pt-3">
                    <h3>Pelajar</h3>
                    <table id="myTable" class="border-collapse border border-slate-500">
                        <thead>
                            <tr>
                                <th class="border border-slate-600 p-1">Nama Pelajar</th>
                                <th class="border border-slate-600 p-1">id kelas Pelajar</th>
                                <th class="border border-slate-600 p-1">Kemaskini</th>
                                <th class="border border-slate-600 p-1">Batal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar as p LEFT JOIN kelas as k ON p.id_kelas = k.id_kelas");
                                    
                                while($pelajar = mysqli_fetch_assoc($pelajar_sql)){
                                    ?>
                                <tr>
                                    <td class="border border-slate-700 text-center p-1"><?php echo $pelajar['nama_pelajar'] ?></td>
                                    <td class="border border-slate-700 text-center p-1"><?php echo $pelajar['nama_kelas'];echo " "; echo $pelajar['kursus_pelajar'] ?></td>
                                    <td class="border border-slate-700 text-center p-1"><a href="./kemaskini-pelajar.php?id_pelajar=<?php echo $pelajar['id_pelajar']?>"><button class="bg-blue-500 rounded-lg text-white p-1">Kemaskini</button></a></td>
                                    <td class="border border-slate-700 text-center p-1"><a href="../system/batal-pengguna.php?jenis=pelajar&id_pengguna=<?php echo $pelajar['id_pelajar']?>"><button class="bg-red-500  rounded-lg text-white p-1">Batal</button></a></td>
                                </tr>
        
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
                <br><br><br>
                <div class="perpustakawan p-1">
                    <h3>Perpustakawan</h3>
                    <table id="myTable2" class="border-collapse border border-slate-500">
                        <thead>
                            <tr>
                                <th class="border border-slate-600 p-1">Nama Perpustakawa</th>
                                <th class="border border-slate-600 p-1">Batal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                    $perpustakawan_sql = mysqli_query($connect, "SELECT * FROM perpustakawan");
                                    
                                    while($perpustakawan = mysqli_fetch_assoc($perpustakawan_sql)){
                                        ?>
                                <tr>
                                    <td class="border border-slate-700 text-center p-1"><?php echo $perpustakawan['nama_perpustakawan'] ?></td>
                                    <td class="border border-slate-700 text-center p-1"><a href="../system/batal-pengguna.php?jenis=perpustakawan&id_pengguna=<?php echo $perpustakawan['id_perpustakawan']?>"><button class="bg-red-500  rounded-lg text-white p-1">Batal</button></a></td>
                                </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tambah">
                <a href="tambah-pelajar.php">Tambah Pelajar</a>
                <a href="tambah-perpustakawan.php">Tambah Perpustakawan</a>
            </div>
        </center>
    </div>

    <?php include("../../components/footer.php") ?>
</body>
<script>
    new DataTable('#myTable', {
        order: [
            [2, 'desc'],
            [0, 'asc']
        ]
    });
    new DataTable('#myTable2', {
        order: [
            [2, 'desc'],
            [0, 'asc']
        ]
    });
</script>
</html>
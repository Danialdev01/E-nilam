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
    <?php $dir_location=".."; $title="Pengguna"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="pengguna"; $dir_location="../"; include("../components/header-perpustakawan.php") ?>

    <div class="main-container">
        
        <div class="pengguna">
            <center>
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
                        <tr>
                            <?php 
                                $pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar as p LEFT JOIN kelas as k ON p.id_kelas = k.id_kelas");
    
                                while($pelajar = mysqli_fetch_assoc($pelajar_sql)){
                            ?>
                            <td class="border border-slate-700 text-center p-1"><?php echo $pelajar['nama_pelajar'] ?></td>
                            <td class="border border-slate-700 text-center p-1"><?php echo $pelajar['nama_kelas'];echo " "; echo $pelajar['kursus_pelajar'] ?></td>
                            <td class="border border-slate-700 text-center p-1"><a href=""><button class="bg-blue-500 rounded-lg text-white p-1">Kemaskini</button></a></td>
                            <td class="border border-slate-700 text-center p-1"><a href=""><button class="bg-red-500  rounded-lg text-white p-1">Batal</button></a></td>
    
                            <?php } ?>
                        </tr>
                    </tbody>
                </table>
            </center>
        </div>
    </div>

    <?php include("../components/footer.php") ?>
</body>
<script>
    new DataTable('#myTable', {
        order: [
            [2, 'desc'],
            [0, 'asc']
        ]
    });
</script>
</html>
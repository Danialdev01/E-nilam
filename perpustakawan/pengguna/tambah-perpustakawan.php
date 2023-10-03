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
    <?php $dir_location="../.."; $title="Tambah Perpustakawan"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="pengguna"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <div class="main-container">
        <center>
            <h2>Tambah Perpustakawan</h2>
            <div class="form-tambah-perpustakawan">
                <form action="../system/tambah-perpustakawan.php" method="post">
                    <p>Nama Perpustakawan : <input name="nama_perpustakawan" type="text"></p><br>
                    <p>Katalaluan Perpustakawan : <input nama="password_perpustakawan" type="password"></p><br>
                    <p>Ulang Katalaluan : <input name="password_perpustakawan_ulangan" type="password"></p><br>
                    <input name="tambah_perpustakawan" type="submit" value="Tambah" class="bg-gray-500 p-1 rounded text-white">
                </form>
            </div>
        </center>
    </div>

    <?php include("../../components/footer.php") ?>
</body>
</html>
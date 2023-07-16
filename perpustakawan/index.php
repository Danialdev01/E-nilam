<?php
    $dir_location_home = "../";
    include("./system/is-logged.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Dashboard Perpustakawan"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="dashboard"; $dir_location="../"; include("../components/header-perpustakawan.php") ?>

    <div class="main-container">
        
    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>
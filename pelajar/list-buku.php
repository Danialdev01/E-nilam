<?php
    $dir_location_home = "..";
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
    <?php $dir_location=".."; $title="List Buku"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="list-buku"; $dir_location=".."; include("../components/header-pelajar.php") ?>

    <div class="main-container">
        <?php
            if (isset($_POST['query'])) {
                $searchQuery = $_POST['query'];
                
                // Perform the search logic using the $searchQuery
                
                // Display the search results
                echo "Search results for: " . $searchQuery;
                $query = mysqli_query($connect,"SELECT * FROM buku WHERE tajuk_buku LIKE '%$searchQuery%'");
                while($find_buku = mysqli_fetch_array($query)){
                    echo "<br>";
                    echo $find_buku['tajuk_buku'];
                }
            }
        ?>
    </div>

    <?php include("../components/footer.php") ?>
</body>
</html>
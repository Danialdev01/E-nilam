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

    <div class="main-container p-3">

        <!-- display searched buku -->
        <center>
            <?php
                if (isset($_POST['query'])) {
                    $searchQuery = $_POST['query'];
                    
                    // Perform the search logic using the $searchQuery
                    
                    // Display the search results
                    echo "Search results for: " . $searchQuery;
                    echo "<br>";
                    ?>
                    <center>
                    <div class="searched-items flex pt-4 flex-wrap">
                        
                    <?php
                        $query = mysqli_query($connect,"SELECT * FROM buku WHERE tajuk_buku LIKE '%$searchQuery%'");
                        while($find_buku = mysqli_fetch_array($query)){
                            $img_name = $find_buku['img_location_buku'];
                            ?>

                            <a href="./permohonan-buku.php?id_buku=<?php echo $find_buku['id_buku']?>">
                                <div class="book read">
                                    <div class="cover">
                                        <img src="../perpustakawan/system/uploads/<?php echo $img_name?>">
                                    </div>
                                    <div class="description">
                                        <p class="title"><span style="font-size: 0.9rem;max-width:100%"><?php echo $find_buku['tajuk_buku']?></span><br>
                                            <span class="author"><?php echo $find_buku['penulis_buku']?></span>
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <?php
                        }
                    echo "</div></center>";

                }
            ?>
        </center>

        <!-- display semua buku -->
        <?php 
        $query = mysqli_query($connect,"SELECT * FROM buku");
            while($find_buku = mysqli_fetch_array($query)){
                $img_name = $find_buku['img_location_buku'];
                ?>

                <a href="./permohonan-buku.php?id_buku=<?php echo $find_buku['id_buku']?>">
                    <div class="book read">
                        <div class="cover">
                            <img src="../perpustakawan/system/uploads/<?php echo $img_name?>">
                        </div>
                        <div class="description">
                            <p class="title"><span style="font-size: 0.9rem;max-width:100%"><?php echo $find_buku['tajuk_buku']?></span><br>
                                <span class="author"><?php echo $find_buku['penulis_buku']?></span>
                            </p>
                        </div>
                    </div>
                </a>
                <?php
            }
        ?>
    </div>
    
    <?php include("../components/footer.php") ?>
</body>
</html>
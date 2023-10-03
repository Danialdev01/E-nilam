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
    <?php $dir_location="../.."; $title="Buku"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="buku"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <div class="main-container">

        <center>
            <div class="buku-container max-w-3xl px-6">
                <table id="myTablei" class="">
                    <thead>
                        <tr>
                            <th>Tajuk Buku</th>
                            <th>Kemaskini Buku</th>
                            <th>Delete Buku</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $buku_sql = mysqli_query($connect, "SELECT * FROM buku");
                            while($buku = mysqli_fetch_array($buku_sql)){
                                ?>
    
                                <tr>
                                    <td><?php echo $buku['tajuk_buku']?></td>
                                    <td>
                                        <a href="./kemaskini-buku.php?id_buku=<?php echo $buku['id_buku']?>">
                                            <button style="background-color: blue;padding:3px; color:white;border-radius:5px">Kemaskini</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="../system/batal-buku.php?id_buku=<?php echo $buku['id_buku']?>">
                                            <button style="background-color: red;padding:3px; color:white;border-radius:5px">Delete</button>
                                        </a>
                                    </td>
                                </tr>
    
                                <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </center>
        
        
        <a class="text-green-500" href="./tambah-buku.php"><button style="position: fixed;bottom:5%;border-radius:50%;background-color:black;width:40px;height:40px;font-size:1.4rem;right:2%">+</button></a>
    </div>

    <?php include("../../components/footer.php") ?>
    <script>
        new DataTable('#myTablei', {
            order: [
                [2, 'desc'],
                [0, 'asc']
            ]
        });
    </script>
</body>
</html>
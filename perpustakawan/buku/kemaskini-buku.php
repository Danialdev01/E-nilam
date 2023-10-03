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
    <link rel="stylesheet" href="../../src/assets/css/main.css">
    <?php $dir_location="../.."; $title="Kemaskini Buku"; include('../../components/head.php') ?>
</head>
<body>
    <?php $type_page="buku"; $dir_location="../.."; include("../../components/header-perpustakawan.php") ?>

    <?php 
        $id_buku = $_GET['id_buku'];

        $buku_sql = mysqli_query($connect, "SELECT * FROM buku WHERE id_buku = '$id_buku'");
        $buku = mysqli_fetch_array($buku_sql);

    ?>

    <div class="tambah-buku-container block md:flex">
        <div class="buku-container w-full md:w-2/5 p-3 p-6">
            <center>
                <img id="preview" src="../system/uploads/<?php echo $buku['img_location_buku']?><?php ?>" alt="">
            </center>
        </div>
        <div class="buku-container2 w-full md:w-3/5 pt-6 md:pt-0 p-3">
            <center>
                <div class="form-buku-tambah bg-primary rounded-md p-2 text-left" style="max-width: 500px;">
                    <h3 class="pb-3 text-lg text-white font-bold pl-2 pt-3">Info Buku</h3>
                    <form action="../system/kemaskini-buku.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']?>">
                        <div class="input md:flex block">
                            <label for="">Tajuk Buku :</label>
                            <input value="<?php echo $buku['tajuk_buku'] ?>" name="tajuk_buku" class="w-full md:w-2/4" type="text">
                        </div>
                        <div class="input md:flex block">
                            <label for="">Genre :</label>
                            <select class="w-full md:w-2/4 h-8 rounded" style="padding: 4px 0px 0 10px;font-size:14px;"  name="id_genre" id="">
                                <?php 
                                    $genre_sql = mysqli_query($connect, "SELECT * FROM genre");
                                    
                                    while($genre = mysqli_fetch_array($genre_sql)){
                                ?>
                                    <option <?php echo $buku['id_genre'] == $genre['id_genre'] ? 'selected' : ''; ?> value="<?php echo $genre['id_genre']?>"><?php echo $genre['nama_genre']?></option>
                                
                                <?php
                                    }

                                ?>
                            </select>
                        </div>
                        
                        <div class="input md:flex block">
                            <label for="">Bahasa :</label>
                            <select name="bahasa_buku" class="w-full md:w-2/4 h-8 rounded" style="padding: 4px 0px 0 10px;font-size:14px;" id="">
                                <option <?php echo $buku['bahasa_buku'] == 'Bahasa Melayu' ? 'selected' : ''; ?> value="Bahasa Melayu">Bahasa Melayu</option>
                                <option <?php echo $buku['bahasa_buku'] == 'English' ? 'selected' : ''; ?> value="English">English</option>
                            </select>
                        </div>
                        <div class="input md:flex block">
                            <label for="">Penulis :</label>
                            <input value="<?php echo $buku['penulis_buku'] ?>" name="penulis_buku" class="w-full md:w-2/4" type="text">
                        </div>
                        <div class="input md:flex block">
                            <label for="">Penerbit :</label>
                            <input value="<?php echo $buku['penerbit_buku']?>" name="penerbit_buku" class="w-full md:w-2/4" type="text">
                        </div>
                        <div class="input md:flex block">
                            <label for="">Gambar :</label>
                            <input name="image" class="w-full md:w-2/4 text-white" type="file" accept="image/*" onchange="previewImage(event)">
                        </div>
                        <div class="input">
                            <label for="">Keterangan Pendek</label>
                            <textarea class="w-full rounded h-30" name="penerangan_buku"><?php echo $buku['penerangan_buku']?></textarea>
                        </div>

                        <div class="form-buku-tambah-submit-container p-2">
                            <center>
                                <input type="submit" value="Kemaskini" name="kemaskini" style="background-color:#0019FF !important;padding:2px 10px 2px 10px;color:white" class="rounded">
                            </center>
                        </div>
                    </form>
                </div>
            </center>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
      }
    </script>

    <?php include("../../components/footer.php") ?>
</body>
</html>
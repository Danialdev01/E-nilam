<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $dir_location="."; $title="Register"; include('./components/head.php') ?>
</head>
<body>
    <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="#" class="flex items-center">
                <img src="<?php echo $dir_location ?>/src/assets/images/logo-banner.png" class="w-36 mr-3" alt="logo">
            </a>
            
        </div>
            <div class="some bg-primary p-4">
                <center>
                    <p class="text-blue-50">Register</p>
                </center>
            </div>
    </nav>
    <br><br><br><br><br>

    <?php include('./components/error_masssage.php') ?>

    <div class="main-container pt-10">
        <center>
            <form action="./pelajar/system/tambah-pelajar.php" class="form-login" method="post">
                <h3>Register Pelajar</h3>
                <div class="input">
                    <div class="py-2">
                        <input name="ic_pelajar" type="number" pattern="[0-9]" placeholder="Nombor kad ic tanpa -" required>
                    </div>
                    <div class="py-2">
                        <input name="nama_pelajar" type="text" placeholder="Nama pelajar" required>
                    </div>
                    <div class="py-2">
                        <input name="no_kad_pelajar" type="number" pattern="[0-9]" placeholder="No kad pelajar" required>
                    </div>
                    
                    <div class="py-2">
                        <select style="background-color:transparent;color:grey;width:100%;border-radius:5px" name="id_kelas" id="">
                            <option value="">Pilih Kelas</option>
                            <?php 
                            require_once('./db/config.php');
                            $kelas_sql = mysqli_query($connect, "SELECT * FROM kelas");
                            while($kelas = mysqli_fetch_array($kelas_sql)){
                                ?>
                                    <option value="<?php echo $kelas['id_kelas']?>"><?php echo $kelas['nama_kelas']?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="links text-left"><br>
                        <p class="text-white text-sm">Adakah anda seorang <a class="text-blue-700" href="./perpustakawan.php">perpustakawan</a></p>
                        <p class="text-white text-sm">Adakah anda seorang <a class="text-blue-700" href="./">pelajar</a></p>
                    </div><br>
                    <div class="input-submit">
                        <input type="submit" value="Register" name="register">
                    </div>
                </div>
            </form>

        </center>
    </div>

    <?php include('./components/footer.php') ?>

</body>
</html>
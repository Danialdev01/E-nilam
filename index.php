<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $dir_location="."; $title="Login"; include('./components/head.php') ?>
</head>
<body>
    <?php $dir_location="."; include('./components/header-login.php') ?>
    <?php $dir_location="."; include('./components/captcha.php') ?>
    <?php include('./components/error_masssage.php') ?>

    <div class="main-container pt-10">
        <center>
            <form action="./pelajar/system/check-login.php" class="form-login" method="post">
                <h3>Login Pelajar</h3>
                <div class="input">
                    <input name="ic_pelajar" type="number" pattern="[0-9]" placeholder="nombor kad ic tanpa -" required>
                    <br><br>
                    <input type="hidden" name="h_code" value="<?php print $code; ?>"><span class="captcha"><?php print $code; ?></span><br><br>
                    <input type="number" id="captcha" name="captcha" placeholder="Masukkan nombor didalam gambar diatas" required>

                    <div class="links text-left"><br>
                        <p class="text-white text-sm">Adakah anda seorang <a class="text-blue-700" href="./perpustakawan.php">perpustakawan</a></p>
                        <p class="text-white text-sm">Adakah anda mahu <a class="text-blue-700" href="./register.php">register</a></p>
                    </div><br>
                    <div class="input-submit">
                        <input type="submit" value="Log Masuk" name="login">
                    </div>
                </div>
            </form>

        </center>
    </div>

    <?php include('./components/footer.php') ?>

</body>
</html>
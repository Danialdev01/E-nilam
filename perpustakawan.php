<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $dir_location="."; $title="Login Perpustakawan"; include('./components/head.php') ?>
</head>
<body>
    <?php $dir_location="."; include('./components/header-login.php') ?>
    <?php $dir_location="."; include('./components/captcha.php') ?>
    <?php include('./components/error_masssage.php') ?>

    <div class="main-container pt-10">
        <center>
            <form action="./perpustakawan/system/check-login.php" class="form-login" method="post">
                <h3>Login Perpustakawan</h3>
                <div class="input">
                    <input name="nama_perpustakawan" type="text" placeholder="Nama Perpustakawan" required><br><br>
                    <input name="password_perpustakawan" type="text" placeholder="Katalaluan" required>
                    <br><br>
                    <input type="hidden" name="h_code" value="<?php print $code; ?>"><span class="captcha"><?php print $code; ?></span><br><br>
                    <input type="number" id="captcha" name="captcha" placeholder="Masukkan nombor didalam gambar diatas" required>
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
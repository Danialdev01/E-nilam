<?php 
    session_start();
    require_once("../../db/config.php");

    // if captcha betul
    if ($_POST['h_code'] == $_POST['captcha'] ) {

        // cari pelajar dalam database guna ic pelajar
        $ic_pelajarPost = mysqli_real_escape_string($connect, $_POST['ic_pelajar']);
        $find_ic_pelajar_sql = mysqli_query($connect, "SELECT * FROM pelajar WHERE ic_pelajar='$ic_pelajarPost'");
        $find_ic_pelajar = mysqli_fetch_array($find_ic_pelajar_sql);
        $ic_pelajar = $find_ic_pelajar['ic_pelajar'];

        // if jumpa pelajar
        if ($ic_pelajar == $ic_pelajarPost) {

            $_SESSION['icCurrentPengguna'] = $ic_pelajarPost;
            $_SESSION['isPenggunaLoggedIn'] = 2;
            header("location:../");
            
        } 
        // if tak jumpa pelajar
        else {

            $_SESSION['error'] = "Pengguna tidak dijumpai";
            header("location:../../");
        }
    } 
    // if catpcha salah
    else{
        $_SESSION['error'] = "Catpcha tidak sepadan";
        header("location:../../");
    }
?>


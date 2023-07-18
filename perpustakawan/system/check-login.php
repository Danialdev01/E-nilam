<?php 
    session_start();

    require_once("../../db/config.php");
    
    // if catpcha betul
    if($_POST['h_code'] == $_POST['captcha']){
        
        // cari nama perpustakawan
        $nama_perpustakawanPost = mysqli_real_escape_string($connect, $_POST['nama_perpustakawan']);
        $find_nama_perpustakawan_sql = mysqli_query($connect, "SELECT * FROM perpustakawan WHERE nama_perpustakawan = '$nama_perpustakawanPost'");
        $find_nama_perpustakawan = mysqli_fetch_array($find_nama_perpustakawan_sql);
        $nama_perpustakawan = $find_nama_perpustakawan['nama_perpustakawan'];
        
        // if nama jumpa
        if($nama_perpustakawan == $nama_perpustakawanPost){

            // check password
            $katalaluan_perpustakawanPost = mysqli_real_escape_string($connect, $_POST['password_perpustakawan']);
            $find_katalaluan_perpustakawan_sql = mysqli_query($connect, "SELECT * FROM perpustakawan WHERE nama_perpustakawan = '$nama_perpustakawan'");
            $find_katalaluan_perpustakawan = mysqli_fetch_array($find_katalaluan_perpustakawan_sql);

            // verify password
            $isBetul = password_verify($katalaluan_perpustakawanPost, $find_katalaluan_perpustakawan['password_perpustakawan']);

            // if password betul
            if($isBetul == 1){
                $_SESSION['isPerpustakawan'] = $nama_perpustakawan;
                $_SESSION['isPerpustakawanLoggedIn'] = 2;
                header("location:../");
            }
            else{
                $_SESSION['error'] = "Salah password" . $isBetul;
                header("location:../../");
            }
        }
        else{
            $_SESSION['error'] = "Pengguna Tidak Boleh Dijumpai";
            header("location:../../");
        }
    }
    else{
        $_SESSION['error'] = "Captcha tidak sepadan";
        header("location:../../");
    }

?>
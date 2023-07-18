<?php

    include("../../db/config.php");
    session_start();

    if(isset($_POST['tambah_perpustakawan'])){
        if($_POST['password_perpustakawan'] = $_POST['password_perpustakawan_ulangan']){
            $nama_perpustakawan = $_POST['nama_perpustakawan'];
            $password_perpustakawan = password_hash($_POST['password_perpustakawan'],PASSWORD_DEFAULT);
    
            $tambah_perpustakawan = mysqli_query($connect, "INSERT INTO perpustakawan (`id_perpustakawan`, `nama_perpustakawan`, `password_perpustakawan`, `status_perpustakawan`) VALUES (NULL, '$nama_perpustakawan', '$password_perpustakawan', '1')");
            header("location:../pengguna.php"); 
        }
        else{
            $_SESSION['error'] = "Pengguna tidak boleh ditambah";
            header("location:../");
        }
    }

?>
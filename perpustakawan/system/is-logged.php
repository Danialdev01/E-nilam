<?php 
    session_start();

    // kalau pengguna tak log in 
    if($_SESSION['isPerpustakawanLoggedIn'] != 2){
        header("location:$dir_location_home");
    }
    // kalau login
    else{}
    
?>
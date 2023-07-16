<?php
    session_start();
    $error = $_SESSION['error'];
    
    // if ada error akan display
    if($error != ""){
        echo "<center><p class=\"error_massage\"><b>$error</b></p></center>" ;
    }
    // if takde error takkan display
    else{
        echo "";
    }

    // reset var
    $_SESSION['error'] = "";

?>
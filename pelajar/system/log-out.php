<?php

    // delete semua session data and kembali ke main menu
    session_start();
    session_destroy();
    header("location:../../");

?>
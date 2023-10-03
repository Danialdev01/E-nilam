<?php
    require_once('../../db/config.php');

    $kemaskini_pelajar = mysqli_query($connect, "UPDATE pelajar SET ic_pelajar='[value-2]',`no_kad_pelajar`='[value-3]',`nama_pelajar`='[value-4]',`achivement`='[value-5]',`id_kelas`='[value-6]',`bil_bacaan_pelajar`='[value-7]',`bil_pinjaman_pelajar`='[value-8]',`buku_pinjaman_pelajar`='[value-9]',`status_pelajar`='[value-10]' WHERE 1")

?>
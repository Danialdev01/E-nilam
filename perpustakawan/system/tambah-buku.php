<?php
    include('../../db/config.php');

    if(isset($_POST["tambah"])){
        $tajuk_buku = $_POST['tajuk_buku'];
        $id_genre = $_POST['id_genre'];
        $bahasa_buku = $_POST['bahasa_buku'];
        $penulis_buku = $_POST['penulis_buku'];
        $penerbit_buku = $_POST['penerbit_buku'];
        $penerangan_buku = $_POST['penerangan_buku'];
        if($_FILES["image"]["error"] === 4){
            echo "<script>alert('Image tidak dijumpai');</script>";
            header("location:../buku/tambah-buku.php");
        }
        else{
            $fileName = $_FILES["image"]["name"];
            $fileSize = $_FILES["image"]["size"];
            $TmpName = $_FILES["image"]["tmp_name"];
            
            $validImageExtension = ['jpg', 'jpeg', 'png'];

            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if(!in_array($imageExtension, $validImageExtension)){
                echo "<script>alert('Image tidak valid');</script>";
                header("location:../buku/tambah-buku.php");
            }
            else if($fileSize > 1000000){
                echo "<script>alert('Image terlalu besar');</script>";
                header("location:../buku/tambah-buku.php");
            }
            else{
                $newImageName = uniqid();
                $newImageName .= '.' . $imageExtension;
                $destination = __DIR__ . "/uploads/" . $newImageName;
                move_uploaded_file($TmpName, $destination);
                
                echo $TmpName;
                echo "<br>";
                echo $newImageName;
                $nama_file = $newImageName;
                

                $upload = mysqli_query($connect, "INSERT INTO buku VALUES(NULL, '$tajuk_buku', '$id_genre', '$bahasa_buku', '$penulis_buku', '$penerbit_buku', '$penerangan_buku', '0', '$nama_file', '1')");
                echo "<script>alert('Berjaya Tambah');</script>";
                header("location:../buku");
            }

        }
    }

?>
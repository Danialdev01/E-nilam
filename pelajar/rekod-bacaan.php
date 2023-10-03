<?php
    $dir_location_home = "..";
    include("./system/is-logged.php");
    require_once('../db/config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/assets/css/main.css">
    <?php $dir_location=".."; $title="Rekod Bacaan"; include('../components/head.php') ?>
</head>
<body>
    <?php $type_page="rekod-bacaan"; $dir_location=".."; include("../components/header-pelajar.php") ?>

    <div class="main-container">
        <center>
            <h2 style="font-size: 1.4rem;"><b>Rekod Bacaan Nilam</b></h2>

            <form action="./system/tambah-nilam.php" class="form-nilam" method="post">
                <div class="input"> 
                    <table>
                        <tr>
                            <td>Tajuk Bacaan :</td>
                            <td>
                                <div class="input-item">
                                    <input name="tajuk_bahan" type="text">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tarikh Bacaan :</td>
                            <td>
                                <div class="input-item">
                                    <input type="date" name="tarikh_bacaan" id="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bahasa :</td>
                            <td>
                                <div class="input-item">
                                    <select name="bahasa_bahan" id="">
                                        <option value="Bahasa Melayu">Bahasa Melayu</option>
                                        <option value="English Langguage">English Langguage</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Bacaan :</td>
                            <td>
                                <div class="input-item">
                                    <select name="jenis_bahan" id="jenisBacaan" required>
                                        <option value="0">Pilih Jenis Buku</option>
                                        <option value="1">Buku</option>
                                        <option value="2">Bukan Buku</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        
                        <script>
                        // javascript untuk display jenis permohonan yang user pilih
                            $(document).ready(function() {
                                $('#jenisBacaan').change(function() {
                                    
                                    var jenisBacaanSelected = $(this).val();

                                    if(jenisBacaanSelected == '1') {
                                        // buku
                                        document.getElementById('jenisBacaanBuku').classList.remove('d-none');
                                        document.getElementById('jenisBacaanBukanBuku').classList.add('d-none');

                                    } else if(jenisBacaanSelected == '2') {
                                        // bukan buku
                                        document.getElementById('jenisBacaanBuku').classList.add('d-none');
                                        document.getElementById('jenisBacaanBukanBuku').classList.remove('d-none');
                                    }
                                    else{
                                        // kalau lain
                                        document.getElementById('jenisBacaanBuku').classList.add('d-none');
                                        document.getElementById('jenisBacaanBukanBuku').classList.add('d-none');

                                    }
                                });
                            });
                        </script>
                    </table>
                    <table id="jenisBacaanBuku" class="d-none">
                        <tr>
                            <td>Genre Buku :</td>
                            <td>
                                <div class="input-item">
                                    <select name="genre_buku" id="">
                                        <option value="0">Pilih Genre</option>
                                    <?php
                                        $genre_sql = mysqli_query($connect, "SELECT * FROM genre");
                                        while($genre = mysqli_fetch_array($genre_sql)){
                                            ?>
                                                <option value="<?php echo $genre['id_genre']?>"><?php echo $genre['nama_genre']?></option>
                                            <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Buku :</td>
                            <td>
                                <div class="input-item">
                                    <select name="jenis_buku" id="">
                                        <option value="0">Pilih Jenis Buku</option>
                                        <option value="1">Fizikal</option>
                                        <option value="2">Digital</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Bil mukasurat :</td>
                            <td>
                                <div class="input-item">
                                    <select name="bil_mukasurat_buku" id="">
                                        <option value="0">Pilih Mukasurat</option>
                                        <option value="31 kebawah">31 kebawah mukasurat</option>
                                        <option value="31 - 60">31 - 60 mukasurat</option>
                                        <option value="61 - 90">61 - 90 mukasurat</option>
                                        <option value="91 - 120">91 - 120 mukasurat</option>
                                        <option value="121 - 150">121 - 150 mukasurat</option>
                                        <option value="150 keatas">150 keatas mukasurat</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Jenis Penggayaan :</td>
                            <td>
                                <div class="input-item">
                                    <select name="cara_penyampaian_bahan" id="">
                                        <option value="0">Tiada</option>
                                        <option value="catatan">Catatan</option>
                                        <option value="rumusan">Rumusan</option>
                                        <option value="lakonan">Lakonan</option>
                                        <option value="bercerita">Bercerita</option>
                                        <option value="pengucapan awam">Pengucapan Awam</option>
                                        <option value="lain - lain">Lain lain</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table id="jenisBacaanBukanBuku" class="d-none">
                        <tr>
                            <td>Kategori Bahan :</td>
                            <td><div class="input-item">
                                <select name="kategori_bahan" id="" style="margin-right: 40px;">
                                    <option value="0">Kategori bahan</option>
                                    <option value="1">Jurnal</option>
                                    <option value="2">Laporan / Majalah</option>
                                    <option value="3">Risalah / Brosur / Artikel / Rencana / Peta / Cerpen / E-Bahan Pembelajaran / Kit Pembelajaran / Bahan Bantu Belajar / CD Perisian Pendidikan / Video Klip Berinformasi</option>
                                    <option value="4">Katalog / Manual Pengguna / Buku Skrap / Buletin</option>
                                    <option value="5">Carta / Poster / Komik</option>
                                </select>
                            </div></td>
                        </tr>
                    </table>

                    <div class="input-rumusan">
                        <div class="text" style="font-size:0.9rem">Penerangan Kecil :</div>
                        <div class="input-item" style="padding-left: 5%;padding-right:5%;color:black;">
                            <textarea name="ringkasan_bahan" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="button-submit" style="padding-left:5%;padding-right:5%;padding-top:2%">
                        <input style="background-color:blue;color:white;padding:5px;width:100%;border-radius:5px" type="submit" name="rekod"  value="Rekod Nilam">                    
                    </div>
                </div>
                

            </form>
        </center>
        <br><br>
    
    </div>

    <?php include("../components/footer.php") ?>
</body>

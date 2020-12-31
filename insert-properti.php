<?php
    session_start();
    include 'connect.php';
    $error_message = "";
?>

<?php 
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }else{
        header('location:login.php');
    }
?>

<?php 
    if(isset($_POST['submit'])){
        $nama_properti = $_POST['judul'];
        $jenis_properti = $_POST['jenis'];
        $deskripsi = $_POST["deskripsi"];
        $luas = $_POST['luas'];
        $harga = $_POST['harga'];
        $alamat = $_POST['alamat'];
        $furnished = $_POST['furnished'];
        $jml_kamar = $_POST['kamar-tidur'];
        $jml_kmandi = $_POST['kamar-mandi'];
        $acceptable = "Tidak";
        $result = mysqli_query($conn,'SELECT * FROM informasi_properti WHERE nama_properti = "$nama_properti"') or die(mysqli_error($conn));
        $get_nama = mysqli_num_rows($result);

        if($get_nama > 0){
            $error_message = "NAMA PROPERTI TELAH DIGUNAKAN SELLER LAIN!";
        }else{
            $foto1tipe = $_FILES['foto1']['type'];
            $foto2tipe = $_FILES['foto2']['type'];
            $foto3tipe = $_FILES['foto3']['type'];
            if(($foto1tipe == 'image/png' or $foto1tipe == 'image/jpg' or $foto1tipe == 'image/jpeg') and ($foto2tipe == 'image/png' or $foto2tipe == 'image/jpeg' or $foto2tipe == 'image/jpg') and ($foto3tipe == 'image/png' or $foto3tipe == 'image/jpg' or $foto3tipe == 'image/jpeg')){
                $query = mysqli_query($conn,"INSERT INTO informasi_properti (id_pengguna,nama_properti,jenis_properti,deskripsi,luas,harga,alamat,furnished,jml_kamar,jml_kmandi,acceptable,tanggal_post) VALUES ('$id','$nama_properti','$jenis_properti','$deskripsi',$luas,$harga,'$alamat','$furnished',$jml_kamar,$jml_kmandi,'$acceptable',curdate())");
                $id_properti = mysqli_query($conn,"SELECT id_properti FROM informasi_properti WHERE nama_properti = '$nama_properti'");
                $id_properti = mysqli_fetch_array($id_properti);
                $id_properti = $id_properti['id_properti'];

                $foto1 = "P".$id_properti."1.png";
                $foto2 = "P".$id_properti."2.png";
                $foto3 = "P".$id_properti."3.png";

                $foto_temp1 = $_FILES['foto1']['tmp_name'];
                $foto_temp2 = $_FILES['foto2']['tmp_name'];
                $foto_temp3 = $_FILES['foto3']['tmp_name'];

                $directory = "galery";
                
                move_uploaded_file($foto_temp1,$directory."/".$foto1);
                move_uploaded_file($foto_temp2,$directory."/".$foto2);
                move_uploaded_file($foto_temp3,$directory."/".$foto3);
            

                $path_foto = $directory."/".$foto1;
                $query = mysqli_query($conn,"INSERT INTO foto_properti (id_properti,foto) values ('$id_properti','$path_foto')");
                
                $path_foto = $directory."/".$foto2;
                $query = mysqli_query($conn,"INSERT INTO foto_properti (id_properti,foto) values ('$id_properti','$path_foto')");
                
                $path_foto = $directory."/".$foto3;
                $query = mysqli_query($conn,"INSERT INTO foto_properti (id_properti,foto) values ('$id_properti','$path_foto')");

                echo "
                    <script>
                        alert('Insert data berhasil!');
                        window.location.href='edit-properti-menu.php';
                    </script>
                ";
            }else{
                $error_message = "EKSTENSI FOTO HARUS PNG, JPG, ATAU JPEG";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="style/insert-properti.css" type="text/css">
    <title>EPBSS - Insert Selling Information</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <main>
        <div class="title">
            <h3>Masukan Informasi Properti</h3>
        </div>
        <p style="font-size: 20px; color: red; margin-top: 10px; text-align: center;"><?php echo $error_message; ?></p>
        <div class="insert-info">
            <form action="" method="POST" enctype="multipart/form-data">    
                <label for="judul"> Nama Properti </label>
                <input class="jinput" type="text" id="judul" name="judul" required>  
                <label for="jenis"> Jenis Properti </label>
                <select id="jenis" name="jenis" class="jinput" required>
                    <option value="Rumah">Rumah</option>
                    <option value="Rumah Toko">Rumah Toko</option>
                    <option value="Rumah Susun">Rumah Susun</option>
                    <option value="Apartement">Apartement</option>
                </select>
                <label for="alamat"> Alamat </label>
                <input class="jinput" style="width: 100%;" type="text" id="alamat" name="alamat" required> 
                <label for="luas"> Luas(m2) </label>
                <input class="jinput" type="number" id="luas" name="luas" required>
                <label for="kamar-tidur">Jumlah Kamar Tidur</label>
                <input class="jinput" type="number" id="kamar-tidur" name="kamar-tidur">
                <label for="kamar-mandi">Jumlah Kamar Mandi</label>
                <input class="jinput" type="number" id="kamar-mandi" name="kamar-mandi">
                <label for="furnished"> Furnished</label> 
                <select id="furnished" name="furnished" class="jinput" required>
                    <option value="Iya">Iya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                <label for="deskripsi"> Deskripsi </label>
                <textarea name ="deskripsi" class="jinput deskripsi" placeholder="Jumlah Kamar, Furnished, Kondisi Rumah, DLL" required></textarea>  
                <label for="harga"> Harga </label>
                <input class="jinput" type="text" id="harga" name="harga" required>
                <label for="foto1">Foto Rumah 1</label>
                <input type="file" name="foto1" id="foto1" required>
                <label for="foto2">Foto Rumah 2</label>
                <input type="file" name="foto2" id="foto2" required>
                <label for="foto3">Foto Rumah 3</label>
                <input type="file" name="foto3" id="foto3" required>   
                <input type="submit" name="submit" Value="Submit" class="tombol-submit">
            </form>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>
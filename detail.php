<?php 
    session_start();
    include 'connect.php';
    $error_message = '';
?>

<?php
    if(isset($_GET['id_properti'])){
        $id_properti = $_GET['id_properti'];
        $query_info = "SELECT * FROM informasi_properti WHERE id_properti = '$id_properti'";
        $result = mysqli_fetch_array(mysqli_query($conn,$query_info));
        if($result['acceptable'] == 'Tidak'){
            if(isset($_SESSION['id'])){
                $id_pengguna = $_SESSION['id'];
                $level = $_SESSION['level'];
                if($result['id_pengguna'] != $id_pengguna and $level == 'reguler'){
                    header('location:index.php'); 
                }else{
                    $id_pengguna = $result['id_pengguna'];
                    $query_cp = "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
                    $query_foto = "SELECT foto FROM foto_properti WHERE id_properti = '$id_properti'";
                    $result_cp = mysqli_fetch_array(mysqli_query($conn,$query_cp));
                    $result_foto = mysqli_query($conn,$query_foto);
                }
            }else{
                header('location:index.php');
            }
        }else{
            $id_pengguna = $result['id_pengguna'];
            $query_cp = "SELECT * FROM pengguna WHERE id_pengguna = '$id_pengguna'";
            $query_foto = "SELECT foto FROM foto_properti WHERE id_properti = '$id_properti'";
            $result_cp = mysqli_fetch_array(mysqli_query($conn,$query_cp));
            $result_foto = mysqli_query($conn,$query_foto);
        }
    }else{
        header('location:index.php'); 
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="style/detail.css">
    <title>EPBSS - Detail Properti</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
    <div class="slideshow-container">
        <?php
        $i = 1;
            while($tampilkan = mysqli_fetch_array($result_foto)){
                echo "
                <div class='mySlides fade'>
                <div class='numbertext'>$i / 3</div>
                <img src=$tampilkan[0]  style='width:100%'>
                </div>
                ";
                $i++;
            }
        ?>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>

        <!-- The dots/circles -->
        <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        </div>

    </div>

    <div class="main-content">
        <div class="border">
            <div class="title">
                <h1><?php echo $result['nama_properti'] ?></h1>
                <h3 style="font-weight: bold;">Rp. <?php echo number_format($result['harga'] , 0, ',', '.') ?></h3>
                <?php echo $result['tanggal_post'] ?>
            </div>
            <div class="deskripsi">
                <p><?php echo nl2br($result['deskripsi']) ?></p>
            </div>
        </div>
        <div class="border">
            <div class="title">
                <h3>Informasi Lengkap</h3>
            </div>
            <div class="deskripsi">
                <div class="sub-informasi">
                    <p>Alamat: <?php echo $result['alamat'] ?></p>
                </div>
                <div class="sub-informasi">
                    <p>Jenis: <?php echo $result['jenis_properti'] ?></p>
                </div>
                <div class="sub-informasi">
                    <p>Luas: <?php echo $result['luas'] ?> m2</p>
                </div>
                <div class="sub-informasi">
                    <img src="pictures/kamar.png" alt="Jumlah Kamar" class="icon-informasi">
                    <p>: <?php echo $result['jml_kamar'] ?></p>
                </div>
                <div class="sub-informasi">
                    <img src="pictures/toilet.png" alt="Jumlah Kamar" class="icon-informasi">
                    <p>: <?php echo $result['jml_kmandi'] ?></p>
                </div>
            </div>
        </div>
        <div class="border">
            <div class="title">
                <h3>Contact Person</h3>
            </div>
            <div class="contact-person">
                <div class="deskripsi">
                    <img src=<?php echo $result_cp['profile_picture'] ?>>
                    <h2><?php echo $result_cp['nama']?></h2>
                    <div class="information">
                        <div class="sub-information">
                            <img src="pictures/email.png" alt="Email" class="email">
                            <h3>Email:</h3>
                            <h2><?php echo $result_cp['email']; ?></h2>
                        </div>
                        <div class="sub-information">
                            <img src="pictures/phone.png" alt="Phone" class="phone">
                            <h3>Phone Number:</h3>
                            <h2>+62 <?php echo $result_cp['no_hp']; ?></h2>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    </main>
    <?php include 'footer.php' ?>
    <script src="script/detail.js"></script>
</body>
</html>
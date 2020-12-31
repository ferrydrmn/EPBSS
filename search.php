<?php
    session_start();
    include 'connect.php';
?>

<?php
    if(isset($_GET['cari'])){
        $search = $_GET['cari'];
        $query = "SELECT * FROM `informasi_properti` WHERE acceptable = 'Iya' AND nama_properti LIKE '%$search%' ORDER BY id_properti DESC";
        $result = mysqli_query($conn,$query);
    }else{
        header('location:index.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="style/card.css">
    <title>EPBSS - Cari</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <main>
    <div class="judul">
        <h3>Cari: <?php echo $search ?></h3>
    </div>
    <?php
        if(mysqli_num_rows($result) < 1){
            echo "<h4 style='color: red;'>PROPERTI TIDAK DITEMUKAN!</h4>";
        }else{
            while($kartu = mysqli_fetch_array($result)){
                $id_properti = $kartu['id_properti'];
                $harga = number_format($kartu['harga'] , 0, ',', '.');
                $foto = mysqli_fetch_array(mysqli_query($conn,"SELECT foto FROM foto_properti WHERE id_properti = '$id_properti'"));
                echo "
                <div class='card'>
                    <img class='imgcard' src=$foto[0] style='max-width:250px'>
                    <div class = 'subcard'>
                        <div class='title'>
                            <h3><a href='detail.php?id_properti=$id_properti'>$kartu[nama_properti]</a></h3>
                        </div>
                        <div class='information'>
                            <p>$kartu[alamat]</p>
                            <p>Rp. $harga</p>
                            <p><img src='pictures/kamar.png' style='max-width:25px'> $kartu[jml_kamar] &nbsp; &nbsp;
                            <img src='pictures/toilet.png' style='max-width:25px'> 2 &nbsp; &nbsp; Luas: 50m<sup>$kartu[jml_kmandi]</sup></p>
                            <p>Jenis: $kartu[jenis_properti]</p>
                        </div>
                    </div>
                </div>
                ";
            }   
        }
    ?>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>
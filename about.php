<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="style/about.css" type="text/css">
    <title>EPBSS - About Us</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <main>
        <div class="about">
            <h1>About Us</h1> 
            <img src="pictures/iconp.png">
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Sejarah</h2>
                        <p class="details">EPBSS berawal dari fakta bahwa tempat tinggal atau kita sebut rumah adalah suatu kebutuhan pokok. 
                        Tetapi beberapa diantara kita masih kesulitan dalam memperoleh informasi rumah yang dijual, terutama di lokasi sekitar mereka.
                        Oleh karena itu, EPBSS diciptakan dengan fasilitas penyedia informasi properti rumah yang diharapkan dapat mempermudah proses penjualan properti.</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Apa itu EPBSS? </h2>
                        <p class="details">EPBSS (Eproperty - Property Buying and Selling Site) adalah aplikasi berbasis web berupa fasilitas penyedia informasi properti rumah berupa iklan.</p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                        <h2>Tim</h2>
                        <p class="team">
                        Kepala Projek      : Ferry <br>
                        Wakil Kepala Projek: Rafli <br>
                        Designer           : Michael <br>
                        Programmer         : Faiz<br>
                        Tata Bahasa        : Trinita<br>
                        Tester             : Hanif<br> </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'?>
</body>
</html>
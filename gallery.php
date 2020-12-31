<?php
    session_start();
    include 'connect.php';
?>

<?php
    $query = "SELECT id_properti,foto FROM foto_properti";
    $temp = mysqli_query($conn,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="style/galery.css" type="text/css">
    <title>EPBSS - Galery</title>
</head>
<body>
    <?php include 'nav.php' ?>
    <div class="title">
        <h1>Gallery</h1>
    </div>
    <main>
        <div class="main-galery">
            <?php
                while($result = mysqli_fetch_array($temp)){
                    echo"
                    <div class='card'>
                        <a href='detail.php?id_properti=$result[id_properti]'>
                            <img src=$result[foto] alt='Foto Properti'>
                        </a>   
                    </div>
                    ";
                }
            ?>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>



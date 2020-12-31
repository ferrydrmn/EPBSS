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
    <title>EPBSS - Contact Us</title>
    <style>
      .card{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
      }

      .img-container{
        display: flex;
        margin: 10px 0;
        justify-content: center;
      }

      .contact-img{
        width: 275px;
      }

      .details{
        margin: 10px 0;
        width: 100%;
        display: inline-flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
      }
    </style>
</head>
<body>
    <?php include 'nav.php' ?>
    <main>
        <div class="about">
            <h1>Contact Us</h1> 
            <img src="pictures/iconp.png">
        </div>
        <div class="row">
            <div class="column">
                <div class="card">
                    <div class="container">
                      <div class="img-container">
                        <img class="contact-img" src="pictures/envelope.png">
                      </div>
                      <div class="details">
                        <h3>Email:</h3>
                        <p>epbssindonesia@gmail.com</p>
                      </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                      <div class="img-container">
                        <img class="contact-img" src="pictures/whatsapp.png">
                      </div>
                      <div class="details">
                        <h3>Whastapp:</h3>
                        <p>+62 90877662390</p>
                      </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <div class="container">
                      <div class="img-container">
                        <img class="contact-img" src="pictures/facebook.png">
                      </div>
                      <div class="details">
                        <h3>Facebook</h3>
                        <p>Eproperty - Property Buying and Selling Site</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'?>
</body>
</html>
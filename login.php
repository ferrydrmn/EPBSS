<?php 
    session_start();
    include ('connect.php');
    $error_message ='';
?>

<?php
    if(isset($_SESSION['id'])){
        header('location:index.php');
    }
?>

<?php 
    if(isset($_POST['login'])){
        $error_message = '';
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "Format email tidak valid!";
        }else{
            $data_user = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email' AND password = '$password'");
            $data_fetch = mysqli_fetch_array($data_user);
            $get_email = $data_fetch['email'];
            $get_password = $data_fetch['password'];
            $level = $data_fetch['level'];
            $id = $data_fetch['id_pengguna'];
            $status = $data_fetch['keadaan'];
            if($status == 'blokir'){
                $error_message = "Anda telah diblokir oleh Admin!";
            }else if($email == $get_email && $password == $get_password){
                $_SESSION['level'] = $level;
                $_SESSION['id'] = $id; 
                header('location:index.php');
            }else{
                $error_message = "Email atau password salah!";
            }  
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="style/login-page.css" type="text/css">
    <title>EPBSS - Log In</title>
</head>
<body>
    <?php include 'nav.php'?>
    <main>
        <div class="login-card">
            <div class="login-title">
                <h3>LOG IN</h3>
                <p>Untuk menggunakan fitur secara penuh</p>
            </div>
            <form method="POST" action="" class="login-form">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" required>
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
                <div class="submit-button">
                    <input type="submit" value="LOG IN" name="login">
                </div>
                <div class="error-message">
                    <p><?php echo $error_message ?></p>
                </div>
            </form>
            <p>Belum punya akun? <a href="register.php">Registrasi sekarang!</a></p>
        </div>
        <div class="login-banner" >
            <img src="pictures/login-banner.jpg" alt="Log In Banner">
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>


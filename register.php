<?php 
    session_start();
    include 'connect.php';
    $error_message ='';
?>

<?php
    if(isset($_SESSION['id'])){
        header('location:index.php');
    }
?>

<?php
    if(isset($_POST['register'])){
        $nama = filter_input(INPUT_POST,'nama');
        $email = filter_input(INPUT_POST,'email');
        $no_hp = filter_input(INPUT_POST,'no_hp');
        $password = filter_input(INPUT_POST,'password');
        $level = 'reguler';
        $profile_pictures = "pictures/profile_picture.png";
        $keadaan = 'aktif';
        if(!$conn){
            die('Connection Failed: ');
        }else{
            $email_cek = mysqli_query($conn,"SELECT email FROM pengguna WHERE email = '$email'");
            $email_cek = mysqli_num_rows($email_cek);
            if($email_cek > 0){
                $error_message = "Email telah digunakan!";
            }else{
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error_message = "Email tidak valid!";
                }else{
                    $query = mysqli_query($conn,"INSERT into pengguna (nama,email,no_hp,password,level,profile_picture,keadaan,tanggal_buat) values ('$nama','$email','$no_hp','$password','$level','$profile_pictures','$keadaan',curdate())");
                    echo "<script>
                        alert('Berhasil melakukan proses registrasi!');
                        window.location.href='login.php';
                    </script>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="style/login-page.css" type="text/css">
    <title>EPBSS - Register</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="login-card">
            <div class="login-title">
                <h3>REGISTER</h3>
                <p>Buat akun EPBSS</p>
            </div>
            <form method="POST" action="" class="login-form">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="no_hp">Nomor Telepon (+62)</label>
                <input type="number" name="no_hp" id="no_hp" required>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
                <div class="submit-button">
                    <input type="submit" value="Daftar!" name="register">
                </div>
                <div class="error-message">
                    <p><?php echo $error_message ?></p>
                </div>
            </form>
        </div>
        <div class="login-banner" >
            <img src="pictures/register-banner.jpg" alt="Log In Banner" style="height: auto;">
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>



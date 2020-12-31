<?php
    session_start();
    include 'connect.php';
?>


<?php
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $data_user = mysqli_query($conn,"SELECT * FROM pengguna WHERE id_pengguna = '$id'");
        $data_fetch = mysqli_fetch_array($data_user);
        $nama_user = $data_fetch['nama'];
        $email_user = $data_fetch['email'];
        $no_user = $data_fetch['no_hp'];
        $foto_user = $data_fetch['profile_picture'];
        $tanggal_buat = $data_fetch['tanggal_buat'];
    }else{
        header('location:login.php');
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="style/account.css?v=<?php echo time(); ?>" type="text/css">
    <title>EPBSS - Account</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="title">
            <h1>Account</h1>
        </div>
        <div class="profile-pictures">
            <img src= <?php echo "$foto_user"; ?>>
        </div>
        <div class="name">
            <h3><?php echo $nama_user; ?></h3>
        </div>
        <h3>Bergabung sejak : <?php echo $tanggal_buat ?></h3>
        <div class="information">
            <div class="sub-information">
                <img src="pictures/email.png" alt="Email" class="email">
                <h3>Email:</h3>
                <h2><?php echo $email_user; ?></h2>
            </div>
            <div class="sub-information">
                <img src="pictures/phone.png" alt="Phone" class="phone">
                <h3>Phone Number:</h3>
                <h2>+62 <?php echo $no_user; ?></h2>
            </div>     
        </div>
        <div class="tombol-manajemen">
            <a href="man_account.php" class="tombol-manajemen-akun">ACCOUNT MANAGEMENT</a>
            <a href="change_password.php" class="tombol-manajemen-akun">CHANGE PASSWORD</a>
            <a href="logout.php" class="tombol-logout">LOG OUT</a>
        </div>
    </main>
    <?php include 'footer.php'?>
</body>
</html>
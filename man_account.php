<?php
    session_start();
    include 'connect.php';
    $error_message = '';
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
        $password = $data_fetch['password'];
    }else{
        header('location:login.php');
    }  
?>

<?php
    if(isset($_POST['register'])){
        if($password == $_POST['ver_password']){
            $new_nama_user = $_POST['nama'];
            $new_no_hp = $_POST['no_hp'];
            $query = "UPDATE pengguna SET nama = '$new_nama_user', no_hp = '$new_no_hp' WHERE id_pengguna = '$id'";
            $execution = mysqli_query($conn,$query);
            if(isset($_FILES['foto-profil']['name'])){
                $profile_picture_name = $id.'.png';
                $tname = $_FILES['foto-profil']['tmp_name'];
                $uploads_dir = 'profile';
                move_uploaded_file($tname, $uploads_dir.'/'.$profile_picture_name);
                $image_path = $uploads_dir.'/'.$profile_picture_name;
                $query = "UPDATE pengguna SET profile_picture = '$image_path' WHERE id_pengguna = '$id'";
                $execution = mysqli_query($conn,$query);
            }
            if($execution){
                echo "
                        <script>
                            alert('Data berhasil diganti!');
                            window.location.href='account.php';
                        </script>
                    ";
            }else{
                $error_message = "DATA GAGAL DIPERBAHARUI";
            }
            
        }else{
            $error_message = "PASSWORD SALAH";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php' ?>
    <link rel="stylesheet" href="style/man-account.css" type="text/css">
    <title>EPBSS - Account Management</title>
</head>
<body>
    <?php include 'nav.php'?>
    <main>
        <div class="title">
            <h1>Account Management</h1>
        </div>
        <div class="account-input">
            <div class="profile-pictures">
                <img src= <?php echo "$foto_user"; ?>>
            </div> 
            <h3>ID User: <?php echo $id; ?>
            <h3>Email: <?php echo $email_user; ?>
            <form action="" method="POST" enctype="multipart/form-data" class="edit-form">
                <label for="foto profil">Foto Profil</label>
                <input id="foto-profil" name="foto-profil" type="file">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="input-normal" value='<?php echo $nama_user; ?>'>
                <label for="no_hp">Nomor Telepon (+62)</label>
                <input type="number" name="no_hp" id="no_hp" class="input-normal" value=<?php echo $no_user; ?>>
                <label for="password">Konfirmasi Password</label>
                <input type="password" name="ver_password" id="password" class="input-normal" required>
                <div class="tombol-manajemen">
                    <input type="submit" value="Submit" name="register">
                </div>
            </form>
            <h3 class="error-message"><?php echo $error_message; ?></h3>
        </div>
    </main>
    <?php include 'footer.php' ?>
</body>
</html>
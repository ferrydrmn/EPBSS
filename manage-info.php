<?php 
    session_start();
    include ('connect.php');
    $error_message ='';
?>

<?php 
    if(isset($_SESSION['id'])){
        $level = $_SESSION['level'];
        if($level == 'reguler'){
            header('location:index.php');
        }
    }else{
        header('location:login.php');
    }
?>

<?php
    $id = $_SESSION['id']; 
    $query = mysqli_query($conn,"SELECT * from informasi_properti WHERE id_pengguna IN (SELECT id_pengguna FROM pengguna WHERE keadaan = 'aktif') and acceptable = 'Iya'") or die(mysqli_error($conn));
    $i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'header.php'; ?>
    <link rel="stylesheet" href="style/management.css" type="text/css">
    <link rel="stylesheet" href="style/hapus.css" type="text/css">
    <title>EPBSS - Management</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <main>
        <div class="title">
            <h1>Manajemen Informasi Properti</h1>
        </div>
        <div class="tombol-management">
            <a class="tombol-insert" href="manage-info.php">Manajemen Informasi Properti</a>
            <a class="tombol-insert" href="penyetujuan.php">Penyetujuan Informasi Properti</a>
            <a class="tombol-insert" href="manage-pengguna.php">Manajemen Pengguna</a>
        </div>
        <table class="informasi-rumah">
            <tr>
                <th>No</th>
                <th>ID Properti</th>
                <th>ID Pengguna</th>
                <th>Nama Properti</th>
                <th>Jenis Properti</th>
                <th>Luas (m2)</th>
                <th>Kamar Tidur</th>
                <th>Kamar Mandi</th>
                <th>Furnihsed</th>
                <th>Alamat</th>
                <th>Harga</th>
                <th>Disetujui</th>
                <th>Tanggal Post</th>
                <th>Aksi</th>
            </tr>
            <?php while($hasil=mysqli_fetch_array($query)){
                echo "
                    <tr>
                        <td>$i</td>
                        <td>$hasil[id_properti]</td>
                        <td>$hasil[id_pengguna]</td>
                        <td><a class='nama-properti' href=detail.php?id_properti=$hasil[id_properti]>$hasil[nama_properti]</a></td>
                        <td>$hasil[jenis_properti]</td>
                        <td>$hasil[luas]</td>
                        <td>$hasil[jml_kamar]</td>
                        <td>$hasil[jml_kmandi]</td>
                        <td>$hasil[furnished]</td>
                        <td>$hasil[alamat]</td>
                        <td>$hasil[harga]</td>
                        <td>$hasil[acceptable]</td>
                        <td>$hasil[tanggal_post]</td>
                        <td><button class='tombol-hapus kecil hapus-info' onclick=delconfirm($hasil[id_properti]) name=Delete Value=Delete>Hapus</button></td>
                    <tr>
                ";
                $i++;
            }
            ?>
        </table>
    </main>
    <?php include 'footer.php'; ?>
    <script src="script/hapus.js"></script>
</body>
</html>


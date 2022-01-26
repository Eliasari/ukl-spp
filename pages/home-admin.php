<?php 
include 'koneksi.php';
session_start();
    if(!isset($_SESSION['username'])){
        header('location: login-petugas.php');
        
    }
    if($_SESSION['level']!= 'admin'){
        header('location: login-petugas.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Admin</title>
</head>
<body>

    <?php
      include "header-admin.php";
    ?>

    <h4 style="margin-left: 24%; margin-top: 5%;">Selamat datang <?=$_SESSION['nama_petugas']?> di pembayaran SPP online</h4>

    <?php
        include "footer-admin.php";
    ?>

</body>
</html>
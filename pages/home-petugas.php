<?php 
include 'koneksi.php';
    session_start();
    if(!isset($_SESSION['username'])){
      header('location: login-petugas.php');
      
    }
    if($_SESSION['level']!= 'petugas'){
      header('location: login-petugas.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    
<?php
  include "header-petugas.php";

?>
    <h4 style="margin-left: 24%; margin-top: 5%;">Selamat datang <?=$_SESSION['nama_petugas']?> di pembayaran SPP online</h4>

<?php
  include "footer-petugas.php";
?>

  <div class="container bg-light rounded" style="margin-top:10px">
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
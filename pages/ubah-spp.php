<?php
    include "koneksi.php";
    session_start();
    if($_SESSION['level']!= 'admin'){
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
        include 'koneksi.php';
    ?>
    <h3>Ubah </h3>
    <form class="form-valide" action="proses-ubah-spp.php?id_spp=<?php echo $_GET['id_spp']?>" method="post">
                <?php 
                    $sql = 'select * from spp where id_spp = ' .$_GET['id_spp'] ;
                    $result = mysqli_query($conn, $sql);
                    $dt_spp = mysqli_fetch_assoc($result);
                ?>
           
        angkatan
            <input type="number" name="angkatan" value= "<?php echo $dt_spp['angkatan']?>" class="form-control">
        tahun
            <input type="text" name="tahun_ajaran" value="<?php echo $dt_spp['tahun_ajaran']?>" class="form-control">
        nominal
            <input type="number" name="nominal" value="<?php echo $dt_spp['nominal']?>" class="form-control">

        <input type="submit" name="ubah-spp" value="Ubah SPP" class="btn btn-primary">
    </form>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
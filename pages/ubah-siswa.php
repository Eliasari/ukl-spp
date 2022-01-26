<?php
    include "koneksi.php";

    $nisnSiswa = $_GET['nisn'];
    $siswa = mysqli_query($conn, "select * from siswa where nisn='$nisnSiswa'");

    session_start();
    if($_SESSION['level']!= 'admin'){
        header('location: login-petugas.php');
      }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Edit Data Siswa</title>
</head>
<body>

    <h3>Ubah Siswa</h3>

    <?php
    while($row = mysqli_fetch_assoc($siswa)){ ?>
    <form class="form-valide" action=" " method="post">
           <input type="hidden" name="nisn" value="<?php echo $row['nisn']; ?>">

        nama
            <input type="text" name="nama" value= "<?php echo $row['nama']; ?>" class="form-control">

        kelas
        <select name="nama_kelas">
            <?php 
                $kelas = mysqli_query($conn, "select * from kelas");
                while($r = mysqli_fetch_assoc($kelas)){ ?>
                <option value = "<?= $r ['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "  . $r ['jurusan']; ?></option>

            <?php } ?>   </select>

        alamat
            <input type="text" name="alamat" value= "<?php echo $row['alamat']; ?>" class="form-control">
        nomor telepon
            <input type="tel" name="no_tlp" value= "<?php echo $row['no_tlp']; ?>" class="form-control">

        <input type="submit" name="simpan" value="Ubah Siswa" class="btn btn-primary">
    </form>
 <?php } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
    //proses update
    if(isset($_POST['simpan'])){
        $nisn = $_POST['nisn'];
        $nama = $_POST['nama'];
        $nama_kelas = $_POST['nama_kelas'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];
        $update = mysqli_query($conn, "update siswa set nama='$nama', id_kelas='$nama_kelas', alamat='$alamat', no_tlp ='$no_tlp' where siswa.nisn = '$nisn'");

        if($update){
            header("location: tampil-siswa.php");
        }else{
            echo "<script> alert ('gagal'; </script>";
        }
    }
?>
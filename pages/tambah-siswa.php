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
    <title>Tambah Siswa</title>
</head>

<body>
    <h3>Tambah Siswa</h3>
    <form action="proses-tambah-siswa.php" method="post">
        nisn
        <input type="text" name="nisn" value="" class="form-control">
        nis
        <input type="text" name="nis" value="" class="form-control">
        nama
        <input type="text" name="nama" value="" class="form-control">
       <tr>
        <td>kelas</td>
        <td><select name="nama_kelas">
        <?php
            $kelas = mysqli_query($conn, "select * from kelas");
            while($r = mysqli_fetch_assoc($kelas)){ ?>
                <option value="<?= $r['id_kelas']; ?>"><?= $r['nama_kelas'] . " | "
                . $r['jurusan']; ?></option> 
            <?php } ?> </select> </td>
       
       </tr>
        alamat
        <input type="teks" name="alamat" class="form-control">
        nomor telephone
        <input type="tel" name="no_tlp" class="form-control">

        
        <button name="simpan" type="submit" class="btn btn-primary">Simpan</button>

    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

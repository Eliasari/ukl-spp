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
    <h3>Tambah Kelas</h3>
    <form action="proses-tambah-kelas.php" method="post">
        nama_kelas
        <input type="text" name="nama_kelas" value="" class="form-control">
        jurusan
        <select name="jurusan" class="form-control">
            <option></option>
            <option value="RPL">Rekaya Perangkat Lunak</option>
            <option value="TKJ">Teknik Komputer dan Jaringan</option>
        </select>
        angkatan
        <input type="text" name="angkatan" value="" class="form-control">
        

        <button type="submit" class="btn btn-primary">Tambah kelas</button>

    </form>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
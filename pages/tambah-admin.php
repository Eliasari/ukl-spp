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
    <h3>Tambah Admin</h3>
    <form action="proses-tambah-admin.php" method="post">
        username admin:
            <input type="text" name="username" value="" class="form-control">
        nama admin: 
            <input type="text" name="nama_petugas" value="" class="form-control">
        password 
            <input type="password" name="password" value="" class="form-control">
        level: 
        <select name="level" class="form-control">
            <option></option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>

        <button type="submit" class="btn btn-primary">Tambah Admin</button>

    </form>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
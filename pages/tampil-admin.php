<?php
  include "koneksi.php";
  session_start();
  $sql = mysqli_query($conn, 'select * from petugas');
  $data = mysqli_fetch_assoc($sql);;

    if($_SESSION['level']!= 'admin'){
        header('location: login-petugas.php');
      }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
      <?php
        include "header-admin.php";
      ?>
      <!-- tampil admin -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 style="margin-bottom: 3%;">Data Admin Petugas</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Password</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama Petugas</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Level</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
            
            <?php 
            $no=0;
            while($data=mysqli_fetch_array($sql)){
            $no++;?>
            <tr>
                <td><?=$data['id_petugas']?></td>
                <td><?=$data['username']?></td> 
                <td><?=$data['password']?></td> 
                <td><?=$data['nama_petugas']?></td>
                <td><?=$data['level']?></td> 
                <td><a href="ubah-admin.php?id_petugas=<?php echo $data['id_petugas']?>" class="btn btn-success">Ubah</a> |
                    <a href="hapus-admin.php?id_petugas=<?=$data['id_petugas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
    </table>

    <td class="align-middle text-center text-sm">
          <a href="tambah-admin.php" style="color:white; margin-left:2%; margin-top:3%;" class="badge badge-sm bg-gradient-success">Tambah Petugas</a>
    </td>

    <?php
      include "footer-admin.php";
    ?>
</body>
</html>
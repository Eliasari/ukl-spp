<?php
        include "koneksi.php";
        session_start();
        $sql = mysqli_query($conn, 'select * from spp');
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
    <title>Tampil Data SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

    <?php
      include "header-admin.php";
    ?>

    <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6 style="margin-bottom:3%;">Tampil SPP</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Angkatan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nominal</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>

            <?php 

            $no=0;
            while($data=mysqli_fetch_array($sql)){
            $no++;?>
            <tr>
                <td><?=$data['id_spp']?></td>
                <td><?=$data['tahun_ajaran']?></td> 
                <td><?=$data['angkatan']?></td> 
                <td><?=$data['nominal']?></td>
                <td><a href="ubah-spp.php?id_spp=<?php echo $data['id_spp']?>" class="btn btn-success">Ubah</a> |
                    <a href="hapus-spp.php?id_spp=<?=$data['id_spp']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
    </table>

        <td class="align-middle text-center text-sm">
            <a href="tambah-spp.php" style="color:white; margin-left:2%; margin-top:3%;" class="badge badge-sm bg-gradient-success">Tambah SPP</a>
        </td>
        <?php
            include "footer-admin.php";
        ?>
</body>
</html>
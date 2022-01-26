<?php
  include "koneksi.php";
    session_start();
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
    <title>Tampil Data Kelas</title>
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
                  <h6 style="margin-bottom:3%;">Tampil Kelas</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Kelas</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jurusan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Angkatan</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>

            <?php 

            //konfigurasi pagging
            $totalDataHalaman = 5;
            $data = mysqli_query($conn, "SELECT * FROM kelas");
            $hitung = mysqli_num_rows($data);
            $totalHalaman = ceil($hitung / $totalDataHalaman);
            $halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
            $dataAwal = ($totalDataHalaman * $halAktif) - $totalDataHalaman;

            // session_start();
            $sql = mysqli_query($conn, 'select * from kelas');
            // $data = mysqli_fetch_assoc($sql);;
            $no=1;
            while($data=mysqli_fetch_array($sql)){
            // $no++;?>
            <tr>
                <td><?=$data['id_kelas']?></td>
                <td><?=$data['nama_kelas']?></td> 
                <td><?=$data['jurusan']?></td> 
                <td><?=$data['angkatan']?></td>
                <td><a href="ubah-kelas.php?id_kelas=<?php echo $data['id_kelas']?>" class="btn btn-success">Ubah</a> |
                    <a href="hapus-kelas.php?id_kelas=<?=$data['id_kelas']?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
    </table>

    <!-- nampilin tombol halaman -->
    <div class="div" style="margin-left: 50%;">
      <?php for($i=1; $i <= $totalHalaman; $i++): ?>
              <a href="?hal=<?= $i; ?>"><?= $i; ?></a>
      <?php endfor; ?>
    </div>

    <hr />

    <td class="align-middle text-center text-sm">
          <a href="tambah-kelas.php" style="color:white; margin-left:2%; margin-top:3%;" class="badge badge-sm bg-gradient-success">Tambah Kelas</a>
    </td>

    <?php
      include "footer-admin.php";
    ?>

</body>
</html>
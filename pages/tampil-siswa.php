<?php
      include "koneksi.php";
      $sql = mysqli_query($conn, "select * from siswa
      JOIN kelas ON siswa.id_kelas = kelas.id_kelas");  

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
    <title>Tampil Data Siswa</title>
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
                  <h6 style="margin-bottom:3%;">Tampil Siswa</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NISN</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIS</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kelas</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Alamat</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No. Telp</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>

        <?php
        //manggil tabel siswa
        //setelah manggil, join tabel yang terelasi ke tabel siswa

        $no = 1;

        while($r = mysqli_fetch_assoc($sql)){ ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $r['nisn'] ?></td>
              <td><?= $r['nis'] ?></td>
              <td><?= $r['nama'] ?></td>
              <td><?= $r['nama_kelas'] . " | " . $r['jurusan']; ?></td>
              <td><?= $r['alamat'] ?></td>
              <td><?= $r['no_tlp'] ?></td>
              <td> <a href="hapus-data-siswa.php?hapus&nisn=<?= $r['nisn']; ?>">Hapus</a> |
                  <a href="ubah-siswa.php?nisn=<?= $r['nisn']; ?>">Ubah</a></td>
            </tr>
            <?php $no++; } ?>
        </table>

        <td class="align-middle text-center text-sm">
            <a href="tambah-siswa.php" style="color:white; margin-left:2%; margin-top:3%;" class="badge badge-sm bg-gradient-success">Tambah Siswa</a>
        </td>
        <?php
            include "footer-admin.php";
        ?>

</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry Transaksi</title>
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
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Petugas</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Siswa</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tgl dibayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan Dibayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun dibayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun/Nominal harus dibayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah yang dibayar</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                              <th class="text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>

        <?php
            //panggil tabel pembayaran lalu join tabel yang terelasi ke tabel pembayaran
            include "koneksi.php";

            $sql = mysqli_query($conn, "select * from pembayaran 
            JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas
            JOIN siswa ON pembayaran.nisn = siswa.nisn
            JOIN spp ON pembayaran.id_spp = spp.id_spp");

            $no = 1;

            while($r = mysqli_fetch_assoc($sql)){ ?>
               <tr>
                   <td><?= $no ?></td>
                   <td><?= $r['nama_petugas']; ?></td>
                   <td><?= $r['nama']; ?></td>
                   <td><?= $r['tgl_bayar']; ?></td>
                   <td><?= $r['bulan_spp']; ?></td>
                   <td><?= $r['tahun_spp']; ?></td>
                   <td><?= $r['tahun_spp'] . " | Rp. " . $r['nominal']; ?></td>
                   <td><?= $r['jumlah_bayar']; ?></td>
                   <td>
                       <?php
                       //jumlah bayar sesuai dengan yg harus dibayarkan maka lunas
                       if($r['jumlah_bayar'] == $r['nominal']){ ?>
                       <font style="color: darkgreen; font-weight:bold;">Lunas</font>
                       <?php }else{ ?>
                                BELUM LUNAS <?php 
                       } ?> </td>
                    
                    <td>
                        <?php
                            //jika siswa ingin membyar lunas ===> sisa
                            if($r['jumlah_bayar'] == $r['nominal']){ echo "-";
                            }else{ ?>
                                <td class="align-middle text-center text-sm">
                                    <a href="transaksi-lunas.php?lunas&id=<?= $r['id_pembayaran']; ?>" style="color:white; margin-left:2%; margin-top:3%;" class="badge badge-sm bg-gradient-success">Bayar Lunas</a>
                                </td>
                           <?php } ?> </td>

                        </tr>

                        <?php $no++; } ?>
                    </td>
               </tr> 

            <?php
                include "footer-admin.php";
            ?>
</body>
</html>

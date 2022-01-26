<?php
  include "koneksi.php";
  session_start();
  $nisn = $_SESSION['nisn'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Pembayaran SPP
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

  <?php
      include "header.php";
  ?>
      <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Kurang Bayar SPP Sekolah Kamu</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tgl dibayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan SPP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun SPP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pembayaran Melalui</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun SPP | Nominal yang harus dibayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

        <?php 
            $day = date('y-m-d');
            $historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran
                                JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                                JOIN spp ON pembayaran.id_spp=spp.id_spp
                                WHERE nisn='$nisn' and jumlah_bayar IS NULL and jatuh_tempo < '$day'
                                ORDER BY jatuh_tempo");

            $no=1;
            while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar']; ?></td>
                <td><?= $r_trx['bulan_spp']; ?></td>
                <td><?= $r_trx['tahun_spp']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun_spp'] . " | Rp. " . $r_trx['nominal']; ?></td>

                <?php
                if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                
                <?php }else{ ?> 
                                <td>BELUM LUNAS</td>
                <?php } ?>
                            </tr>
                <?php $no++; }?>

            </table>

  <?php
      include "footer.php";
  ?>
    
</body>
</html>
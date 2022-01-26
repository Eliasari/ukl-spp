<?php
        include "koneksi.php";
        session_start();
        $nisn = $_SESSION['nisn'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
  <?php
    include "header.php";
  ?>

    <!-- history pembayaran -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>History Pembayaran SPP Sekolah Kamu</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Dibayarkan kepada</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tgl dibayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Bulan SPP</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tahun SPP | Nominal yang harus dibayar</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah yang sudah dibayarr</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
        <?php
        $pembayaran = mysqli_query($conn, "SELECT * FROM pembayaran 
                    JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas 
                    JOIN spp ON pembayaran.id_spp = spp.id_spp
                    WHERE nisn='$nisn' and jumlah_bayar is not null
                    ORDER BY tgl_bayar");
        $no = 1;
        while($r = mysqli_fetch_assoc($pembayaran)){ ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $r['nama_petugas']; ?></td>
                    <td><?= $r['tgl_bayar']; ?></td>
                    <td><?= $r['bulan_spp']; ?></td>
                    <td><?= $r['tahun_ajaran'] . " | Rp. " . $r['nominal']; ?></td>
                    <td><?= $r['jumlah_bayar']; ?></td>
                    <td>
      <?php
        // Jika jumlah bayar sesuai dengan yang harus dibayar maka Status LUNAS
        if($r['jumlah_bayar'] == $r['nominal']){ ?>
                      <font style="color: darkgreen; font-weight: bold;">LUNAS</font>
        <?php }else{ ?>                             
                      BELUM LUNAS <?php } ?> </td>
                      </tr>
        <?php $no++; } ?>
        
      </table>

  <?php
    include "footer.php";
  ?>
</body>
</html>
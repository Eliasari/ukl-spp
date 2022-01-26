<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kurang bayar admin</title>
</head>
<body>
    
    <!-- header -->
    <?php
        include "header-admin.php";
    ?>

    <!-- form -->
    <form action=" " method="POST" autocomplete="off">
        Cari Siswa 
        <input type="text" name="nisn" placeholder="cari berdasarkan NISN" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

    <?php
    // Kita lakukan proses pencariannya disini
    if($_POST){
        $nisn = $_POST['nisn'];
        // Kita panggil table siswa
        $historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran
        JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
        JOIN spp ON pembayaran.id_spp=spp.id_spp
        WHERE nisn='$nisn' and jumlah_bayar IS NOT NULL
        ORDER BY tgl_bayar");

        $no=1;
        while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
        <?php
        }
    ?>

       <!-- Sekarang kita tampilkan history pembayarannya -->
       <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6 style="margin-bottom: 3%;">History Pembayaran</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">No.</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tanggal Pembayaran</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Pembayaran Melalui</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Tahun SPP | Nominal yang harus dibayar</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Jumlah yang sudah dibayar</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Status</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Aksi</th>
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
            <?php } ?>
    <!-- footer -->
    <?php
        include "footer-admin.php";
    ?>

</body>
</html>
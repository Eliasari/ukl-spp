<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>
<body>
<?php
    // Kita lakukan proses pencariannya disini
    if($_POST){
        $nisn = $_POST['nisn'];
        // Kita panggil table siswa
        $biodataSiswa = mysqli_query($conn, "SELECT * FROM siswa 
                        JOIN kelas ON siswa.id_kelas=kelas.id_kelas 
                        WHERE nisn='$nisn'");
        
        $no=1;
        while($r_siswa = mysqli_fetch_assoc($biodataSiswa)){ ?>
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6 style="margin-bottom: 3%;">General Laporan</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">NISN</th>
                          <th><?= $r_siswa['nisn']; ?></th>
                        </tr>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">NIS</th>
                          <th><?= $r_siswa['nis']; ?></th>
                        </tr>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Nama</th>
                          <th><?= $r_siswa['nama']; ?></th>
                        </tr>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder ps-2">Kelas</th>
                          <th><?= $r_siswa['nama_kelas'] . " | " . $r_siswa['jurusan']; ?></th>
                        </tr>
                  </thead>
                  </table>
                <tbody>
                <?php
                }
        ?>

        <!-- Sekarang kita tampilkan history pembayarannya -->
        <div class="container-fluid py-4">
          <div class="row">
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h6 style="margin-bottom: 3%;">General Laporan</h6>
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

            $historyPembayaran = mysqli_query($conn, "SELECT * FROM pembayaran
                                JOIN petugas ON pembayaran.id_petugas=petugas.id_petugas
                                JOIN spp ON pembayaran.id_spp=spp.id_spp
                                WHERE nisn='$nisn'
                                ORDER BY tahun_spp , bulan_spp");

            $no=1;
            while($r_trx = mysqli_fetch_assoc($historyPembayaran)){ ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $r_trx['tgl_bayar'] . " " . $r_trx['bulan_spp'] . " " .
                        $r_trx['tahun_spp']; ?></td>
                <td><?= $r_trx['nama_petugas']; ?></td>
                <td><?= $r_trx['tahun_spp'] . " | Rp. " . $r_trx['nominal']; ?></td>
                <td><?= "Rp. " . $r_trx['jumlah_bayar']; ?></td>

                <?php
                if($r_trx['jumlah_bayar'] == $r_trx['nominal']){ ?>
                                <td><font style="color: darkgreen; font-weight: bold;">LUNAS</font></td>
                                <td>-</td>
                <?php }else{ ?> <td>BELUM LUNAS</td>
                                <td><a href="transaksi.php?lunas&id=<?= $r_trx['id_pembayaran']; ?>">
                                BAYAR LUNAS</a></td>
                <?php } ?>
                            </tr>
                <?php $no++; }?>
                        </table>
                <?php } ?>
  
                <!-- </tr>
                <td><a onclick="window.print()"><input type="button" class="submit" value="Cetak"></a></td>
                </tr> -->

                <script>
                    onclick = window.print();
                </script>

                <?php
                    include "footer-admin.php";
                ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
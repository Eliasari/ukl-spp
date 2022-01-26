<?php
    //siswa yg ingin membayar ===> sisa pembayaran
    include "koneksi.php";
    
    if(isset($_GET['lunas'])){
        $id = $_GET['id'];

        $tgl_bayar = date('Y-m-d');

        $ambilData = mysqli_query($conn, "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp WHERE id_pembayaran = '$id'");
        
        $row = mysqli_fetch_assoc($ambilData);
        $sisa = $row['nominal'] - $row['jumlah_bayar'];
        $hasil = $row['jumlah_bayar'] + $sisa;
        $update = mysqli_query($conn, "UPDATE pembayaran SET jumlah_bayar = '$hasil', tgl_bayar='$tgl_bayar', keterangan='LUNAS' WHERE id_pembayaran= '$id'");

        if($update){
            header("location: transaksi.php");
        }
    }

?>
<?php 
    if($_GET['id_spp']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from spp where id_spp = '".$_GET['id_spp']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data spp');location.href='tampil-spp.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data spp');location.href='tampil-spp.php';</script>";
        }
    }
?>
<?php 
    if($_GET['id_siswa']){
        include "koneksi.php";
        $qry_hapus=mysqli_query($conn,"delete from siswa where id_siswa='".$_GET['id_siswa']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus data siswa');location.href='tampil-siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data siswa');location.href='tampil-siswa.php';</script>";
        }
    }
?>
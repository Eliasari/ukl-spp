<?php
if($_POST){
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $nominal = $_POST['nominal'];
    $angkatan = $_POST['angkatan'];

    if(empty($tahun_ajaran)){
        echo "<script>alert('tahun tidak boleh kosong');location.href='tambah-spp.php';</script>";
    } elseif(empty($nominal)){
        echo "<script>alert('nominal tidak boleh kosong');location.href='tambah-spp.php';</script>";
    } elseif(empty($angkatan)){
        echo "<script>alert('angkatan tidak boleh kosong');location.href='tambah-spp.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into spp (tahun_ajaran , nominal, angkatan) value ('".$tahun_ajaran."','".$nominal."','".$angkatan."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan data spp');location.href='tampil-spp.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan data spp');location.href='tambah-spp.php';</script>";
        }
    }
}
?>
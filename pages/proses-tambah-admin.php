<?php
if($_POST){
    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];
    $password = $_POST['password'];

    if(empty($username)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah-admin.php';</script>";
    } elseif(empty($nama_petugas)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah-admin.php';</script>";
    } elseif(empty($level)){
        echo "<script>alert('level tidak boleh kosong');location.href='tambah-admin.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah-admin.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into petugas (username, nama_petugas, level, password) value ('".$username."','".$nama_petugas."','".$level."','".md5($password)."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan petugas');location.href='tampil-admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan petugas');location.href='tambah-admin.php';</script>";
        }
    }
}
?>
<?php 
    include 'koneksi.php';

    $id_petugas = $_GET['id_petugas'];

    $username = $_POST['username'];
    $nama_petugas = $_POST['nama_petugas'];
    $level = $_POST['level'];

    $sql = "
        update petugas set username = '" . $username . "', nama_petugas = '" . $nama_petugas . "', level = '" . $level . "'
        where id_petugas = '" . $id_petugas . "';
    ";

    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Success ubah admin petugas');location.href='tampil-admin.php';</script>";
        }else{
            // echo "<script>alert('Failed ubah admin petugas');location.href='ubah-admin.php';</script>";
            printf('Failed sign up: ' . mysqli_error($conn));
        }
?> 
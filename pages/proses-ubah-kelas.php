<?php 
    include 'koneksi.php';

    $id_kelas = $_GET['id_kelas'];

    $nama_kelas = $_POST['nama_kelas'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    $sql = "
        update kelas set nama_kelas = '" . $nama_kelas . "', 
        jurusan = '" . $jurusan . "', angkatan = '" . $angkatan . "'

        where id_kelas = '" . $id_kelas . "';
    ";

    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Success ubah kelas');location.href='tampil-kelas.php';</script>";
        }else{
            echo "<script>alert('Failed ubah kelas');location.href='ubah-kelas.php';</script>";
            // printf('Failed sign up: ' . mysqli_error($conn));
        }
?> 
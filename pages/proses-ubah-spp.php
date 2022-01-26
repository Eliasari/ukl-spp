<?php 
    include 'koneksi.php';

    $id_spp = $_GET['id_spp'];

    $tahun_ajaran = $_POST['tahun_ajaran'];
    $nominal = $_POST['nominal'];
    $angkatan = $_POST['angkatan'];

    $sql = "
        update spp set tahun_ajaran = '" . $tahun_ajaran . "', 
        nominal = '" . $nominal . "', angkatan = '" . $angkatan . "'

        where id_spp = '" . $id_spp . "';
    ";

    $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('Success ubah data spp');location.href='tampil-spp.php';</script>";
        }else{
            echo "<script>alert('Failed ubah data spp');location.href='ubah-spp.php';</script>";
            // printf('Failed sign up: ' . mysqli_error($conn));
        }
?> 
<?php
if($_POST){
    include "koneksi.php";

    $nisn = $_POST['nisn'];
    
    $cari = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn='$nisn'");
    
    if(empty($nisn)){
        echo "<script>alert('NISN tidak boleh kosong');location.href='login-siswa.php';</script>";
    }else{
        if(mysqli_num_rows($cari) > 0){
            $dt_login = mysqli_fetch_assoc($cari);
            session_start();
            $_SESSION['nisn'] = $dt_login['nisn'];
            $_SESSION['level'] = "siswa";
            echo "<script>alert('Success login to your student account');location.href='home-siswa.php';</script>";
        }else{
            echo "<script>alert('NISN tidak benar');location.href='login-siswa.php';</script>";
            }
        }
    }
?>

<?php 
    if($_POST){
        include "koneksi.php";

        // deklarasi variabel (guna POST supaya biar privasi, gak muncul di url)
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql_petugas = mysqli_query($conn, "select * from petugas where username = '" . $username . "' and password = '" . md5($password) . "'");

        if(empty($username)){
            echo "<script>alert('Username tidak boleh kosong');location.href='login-petugas.php';</script>";
        } elseif(empty($password)){
            echo "<script>alert('Password tidak boleh kosong');location.href='login-petugas.php';</script>";
        } else {
            
            // mysqli_num_rows = kalo gaada data maka kan rowny 0
            if(mysqli_num_rows($sql_petugas)>0){
                $dt_login=mysqli_fetch_assoc($sql_petugas);

                if($dt_login['level'] == "admin"){
                    session_start();
                    $_SESSION['username']=$dt_login['username'];
                    $_SESSION['password']=$dt_login['password'];
                    $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                    $_SESSION['id_petugas']=$dt_login['id_petugas'];
                    $_SESSION['level'] = "admin";
                    echo "<script>alert('Success login to your admin account');location.href='home-admin.php';</script>";

                }elseif($dt_login['level'] == "petugas"){
                session_start();
                $_SESSION['username']=$dt_login['username'];
                $_SESSION['password']=$dt_login['password'];
                $_SESSION['nama_petugas']=$dt_login['nama_petugas'];
                $_SESSION['id_petugas']=$dt_login['id_petugas'];
                $_SESSION['level'] = "petugas";
                echo "<script>alert('Success login to your officer account');location.href='home-petugas.php';</script>";
            }else{
                echo "<script>alert('Username dan Password tidak benar');location.href='login-petugas.php';</script>";
            }
        }
    }
}
?>
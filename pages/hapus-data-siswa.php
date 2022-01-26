<?php
          //tombol hapus ditekan
          include "koneksi.php";
          if(isset($_GET['hapus'])){
            $nisn = $_GET['nisn'];
            $hapus = mysqli_query($conn, "delete from siswa where nisn = '$nisn'");

            if($hapus){
              header("location: tampil-siswa.php");
            }else{
              echo "<script> alert('Maaf, data tersebut masih terhubung dengan data yang lain'); </script>";
            }
          }
?>
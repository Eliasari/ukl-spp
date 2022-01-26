<?php
session_start();

// kalau kosong berarti sudah selesai unset
unset($_SESSION["id_petugas"]);
unset($_SESSION["nama_petugas"]);
unset($_SESSION["status_login"]);
// echo $_SESSION ["nama_siswa"];
header("Location: login-petugas.php");
?>
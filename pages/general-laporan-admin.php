<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Laporan</title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>

  <?php
    include "header-admin.php";
  ?>
  
    <!-- history -->

    <form action="proses-general-laporan.php" method="POST" autocomplete="off" target="_blank">
        Cari Siswa <input type="text" name="nisn" placeholder="Cari berdasarkan NISN" autofocus>
        <button type="submit" name="cari">Cari</button>
    </form>

  <?php
    include "footer-admin.php";
  ?>
  
</body>
</html>
<?php
    include "koneksi.php";
    session_start();
    if($_SESSION['level']!= 'admin'){
        header('location: login-petugas.php');
      }
?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <?php 
        include 'koneksi.php';

    ?>
    <h3>Ubah </h3>
    <form class="form-valide" action="proses-ubah-kelas.php?id_kelas=<?php echo $_GET['id_kelas']?>" method="post">
                <?php 
                    $sql = 'select * from kelas where id_kelas = ' .$_GET['id_kelas'] ;
                    $result = mysqli_query($conn, $sql);
                    $dt_kelas = mysqli_fetch_assoc($result);
                ?>
           
        nama_kelas
            <input type="text" name="nama_kelas" value= "<?php echo $dt_kelas['nama_kelas']?>" class="form-control">
        angkatan
            <input type="text" name="angkatan" value="<?php echo $dt_kelas['angkatan']?>" class="form-control">
        jurusan
        <?php 
        $arr_jurusan=array('RPL'=>'Rekayasa Perangkat Lunak','TKJ'=>'Teknik Komputer dan Jaringan');?>
            <select name="jurusan" class="form-control">
            <option></option>
                        <?php 
                        foreach ($arr_jurusan as $key_jurusan => $val_jurusan):
                            if($key_jurusan == $data['jurusan']){
                                $selek="selected";
                                } else {
                                $selek="";
                                }
                            ?>
                <option value="<?=$key_jurusan?>" 
                <?=$selek?>><?=$val_jurusan?></option>
                <?php endforeach ?>
                </select>

        <input type="submit" name="ubah-kelas" value="Ubah Kelas" class="btn btn-primary">
    </form>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
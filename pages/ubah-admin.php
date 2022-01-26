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
    <form class="form-valide" action="proses-ubah-admin.php?id_petugas=<?php echo $_GET['id_petugas']?>" method="post">
                <?php 
                    $sql = 'select * from petugas where id_petugas = ' .$_GET['id_petugas'] ;
                    $result = mysqli_query($conn, $sql);
                    $dt_petugas = mysqli_fetch_assoc($result);
                ?>
           
        username
            <input type="text" name="username" value= "<?php echo $dt_petugas['username']?>" class="form-control">
        password 
            <input type="password" name="password" value="<?php echo $dt_petugas['password']?>" class="form-control">
        nama petugas
            <input type="text" name="nama_petugas" value="<?php echo $dt_petugas['nama_petugas']?>" class="form-control">
        level : 
        <?php 
        $arr_level=array('Admin'=>'Admin','Petugas'=>'Petugas');?>
            <select name="level" class="form-control">
            <option></option>
                        <?php 
                        foreach ($arr_level as $key_level => $val_level):
                            if($key_level==$data['level']){
                                $selek="selected";
                                } else {
                                $selek="";
                                }
                            ?>
                <option value="<?=$key_level?>" 
                <?=$selek?>><?=$val_level?></option>
                <?php endforeach ?>
                </select>

        <input type="submit" name="ubah-admin" value="Ubah Admin" class="btn btn-primary">
    </form>
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
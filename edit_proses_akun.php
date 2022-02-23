<?php
include 'koneksi.php';

$id = $_POST['id_user'];
$nama = $_POST['nama_user'];
$tanggal = $_POST['tanggal'];
$jk = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$sandi = $_POST['sandi'];
$nohp = $_POST['nohp'];
$status = $_POST['status'];
$akl = $_POST['akl'];


//query update
$query = "UPDATE tbl_user SET nama_user='$nama',jenis_kelamin='$jk', ttl='$tanggal',
          alamat='$alamat', kata_sandi='$sandi', no_hp='$nohp', email_user='$email', 
          status_user='$status', akses_level='$akl' WHERE id_user='$id'";
mysqli_query($koneksi, $query);
//mysql_close($host);
header("location:data_user.php");
?>
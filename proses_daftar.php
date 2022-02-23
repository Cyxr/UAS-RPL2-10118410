<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$password = $_POST['password_konfirmasi'];
$akses = $_POST['akl'];
$user = $_POST['status'];

//query update
$query = "INSERT INTO tbl_user (nama_user, no_hp, kata_sandi, status_user, akses_level) 
           VALUES ('$nama', '$nohp', '$password', '$user','$akses')";
mysqli_query($koneksi, $query);
//mysql_close($host);
header("location:login.php");
?>
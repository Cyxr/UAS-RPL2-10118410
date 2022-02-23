<?php
include 'koneksi.php';
session_start(); 
$namaProduk = $_POST['nama_produk'];
$namaPembeli = $_POST['nama_pembeli'];
$warna = $_POST['warna_produk'];
$total = $_POST['total'];
$statusB = $_POST['status_bayar'];
$statusK = $_POST['status_kirim'];
$tanggal = $_POST['tanggal_beli'];
$bank = $_POST['bank'];
$id = $_GET['id_produk'];

//query update
$query = "INSERT INTO tbl_order (nama_produk, warna, nama_pembeli, total_harga, 
                            tanggal_pembelian, bank_pembayaran, status_pembayaran, status_kirim)
          VALUES ('$namaProduk', '$warna', '$namaPembeli', '$total','$tanggal','$bank','$statusB','$statusK')";
mysqli_query($koneksi, $query);
//mysql_close($host);
header("location:pembayaran.php");
?>

<?php
include 'koneksi.php';

$id = $_POST['id_order'];
$nama_pembeli = $_POST['nama_pembeli'];
$alamat = $_POST['alamat'];
$nama_produk = $_POST['nama_produk'];
$warna = $_POST['warna'];
$total = $_POST['total'];
$bank = $_POST['bank'];
$statusP = $_POST['status_bayar'];
$statusK = $_POST['status_kirim'];
$tanggal = $_POST['tanggal'];

//query update
$query = "UPDATE tbl_order SET nama_pembeli='$nama_pembeli',nama_produk='$nama_produk', alamat_pembeli='$alamat',
          warna='$warna', total_harga='$total', bank_pembayaran='$bank', status_pembayaran='$statusP', 
          status_kirim='$statusK', tanggal_pembelian='$tanggal' WHERE id_order='$id'";
mysqli_query($koneksi, $query);

header("location:data_order.php");
?>
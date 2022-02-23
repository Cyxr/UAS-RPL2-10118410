<?php
include 'koneksi.php';

$id = $_POST['id_produk'];
$nama = $_POST['nama'];
$warna = $_POST['warna'];
$tipe = $_POST['tipe'];
$harga = $_POST['harga'];
$proc = $_POST['proc'];
$os = $_POST['os'];
$vga = $_POST['vga'];
$layar = $_POST['layar'];
$ram = $_POST['ram'];
$hardisk = $_POST['hardisk'];
$lain = $_POST['lain'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$gambar1 = $_FILES['gambar1']['name'];
$ukuran1 = $_FILES['gambar1']['size'];
$gambar2 = $_FILES['gambar2']['name'];
$ukuran2 = $_FILES['gambar2']['size'];
$gambar3 = $_FILES['gambar3']['name'];
$ukuran3 = $_FILES['gambar3']['size'];
$ext = pathinfo($gambar1, PATHINFO_EXTENSION);
$ext2 = pathinfo($gambar2, PATHINFO_EXTENSION);
$ext3 = pathinfo($gambar3, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) == true) {
	header("location:data_barang.php?alert=gagal_ekstensi");
}else
if(!in_array($ext2,$ekstensi) == true) {
	header("location:data_barang.php?alert=gagal_ekstensi");
}else
if(!in_array($ext3,$ekstensi) == true) {
	header("location:data_barang.php?alert=gagal_ekstensi");
}else{
	if($ukuran1 < 1044070 && $ukuran2 < 1044070 && $ukuran3 < 1044070  ){		
		$gmbr1 = $rand.'_'.$gambar1;
        $gmbr2 = $rand.'_'.$gambar2;
        $gmbr3 = $rand.'_'.$gambar3;
		move_uploaded_file($_FILES['gambar1']['tmp_name'], 'img/'.$rand.'_'.$gambar1);
        move_uploaded_file($_FILES['gambar2']['tmp_name'], 'img/'.$rand.'_'.$gambar2);
        move_uploaded_file($_FILES['gambar3']['tmp_name'], 'img/'.$rand.'_'.$gambar3);
		$query = "INSERT INTO tbl_produk (nama_produk, warna, harga, gambar, gambar2, gambar3, 
                            tipe_produk, prosesor, os, grafik_card, layar, ram, storage, other) 
                    VALUES('$nama','$warna', '$harga','$gmbr1','$gmbr2','$gmbr3',
                            '$tipe', '$proc','$os','$vga','$layar', '$ram','$hardisk','$lain')";
        
        mysqli_query($koneksi, $query);
		header("location:data_barang.php?alert=berhasil");
	}else{
		header("location:data_barang.php?alert=gagal_ukuran");
	}
}


// header("location:data_barang.php");
?>
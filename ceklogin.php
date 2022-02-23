<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';
 
// menangkap data yang dikirim dari form login
$nohp = $_POST['nohp'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from tbl_user where no_hp='$nohp' AND kata_sandi='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['akses_level']=="1"){
 
		// buat session login dan username
		$_SESSION['nohp'] = $nohp;
		$_SESSION['akses_level'] = "1";
		$_SESSION['idu'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama_user'];
		$_SESSION['status'] = $data['status_user'];
        $_SESSION['email'] = $data['email_user'];
		$_SESSION['alamat'] = $data['alamat'];
        $_SESSION['tanggal'] = $data['ttl'];
		$_SESSION['jk'] = $data['jenis_kelamin'];
        
		// alihkan ke halaman dashboard admin
		header("location:index_admin.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['akses_level']=="2"){
		// buat session login dan username
		$_SESSION['nohp'] = $nohp;
		$_SESSION['akses_level'] = "2";
		$_SESSION['idu'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama_user'];
		$_SESSION['status'] = $data['status_user'];
        $_SESSION['email'] = $data['email_user'];
		$_SESSION['alamat'] = $data['alamat'];
        $_SESSION['tanggal'] = $data['ttl'];
		$_SESSION['jk'] = $data['jenis_kelamin'];
		// alihkan ke halaman dashboard pegawai
		header("location:indexlogin.php");
 

	}
	else{
 
		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}
 
?>
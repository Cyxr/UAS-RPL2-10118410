<?php
include ('koneksi.php');
$nama_janda = $foto_janda = $foto_anak = "";
$nama_janda_err = $foto_janda_err = $foto_anak_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
if(empty(trim($_POST['nama_janda']))){
$nama_janda_err="Nama janda harap diisi";
}else{
$nama_janda=$_POST['nama_janda'];
$nama_janda=mysqli_real_escape_string($koneksi, $nama_janda);
}
//validasi foto 1
$imgFile = $_FILES['foto_janda']['name'];
$tmp_dir = $_FILES['foto_janda']['tmp_name'];
$imgSize = $_FILES['foto_janda']['size'];

$upload_dir = 'gambar/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$itempic = rand(1000,1000000).".".$imgExt; //rename secara random
//cek data
if (!empty($_FILES["foto_janda"]["tmp_name"])){
//cek ektensi
if(in_array($imgExt, $valid_extensions)){    
//cek besar       
if(!$imgSize < 2000000){
//jika benar upload gambar ke direktori
$foto_janda=move_uploaded_file($tmp_dir,$upload_dir.$itempic);
}else{
$foto_janda_err="Maaf file foto terlalu besar"; 
} 
}else{
$foto_janda_err="Maaf Ektensi Foto tidak sesuai";
}
}else{
$foto_janda_err="Maaf Anda belum memilih foto janda";  
}

//validasi foto 2
$imgFile = $_FILES['foto_anak']['name'];
$tmp_dir = $_FILES['foto_anak']['tmp_name'];
$imgSize = $_FILES['foto_anak']['size'];

$upload_dir = 'gambar/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); //cek valif ektensi
$itempic2 = rand(1000,1000000).".".$imgExt; //rename secara random

//cek data
if (!empty($_FILES["foto_anak"]["tmp_name"])){
//cek ektensi
if(in_array($imgExt, $valid_extensions)){    
//cek besar       
if(!$imgSize < 2000000){
//jika benar upload gambar ke direktori
$foto_anak = move_uploaded_file($tmp_dir,$upload_dir.$itempic2);
}else{
$foto_anak_err="Maaf file foto terlalu besar"; 
} 
}else{
$foto_anak_err="Maaf Ektensi Foto tidak sesuai";
}
}else{
$foto_anak_err="Maaf Anda belum memilih foto janda";    
}
// cek semua data apakah ada yang error atau tidak bila tidak proses lanjutkan

    if(empty($nama_janda_err)&& empty($foto_janda_err) && empty($foto_anak_err)){
     
     //foto di upload jika semua sudah selesai di validasi
     echo "$foto_janda $foto_anak";  //upload pindahkan file ke server   

        // Prepare an insert statement
        $sql = "INSERT INTO t_janda (nama_janda, foto, foto2) VALUES (?, ?, ?)";
                 if($stmt = mysqli_prepare($koneksi, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_nama_janda, $param_foto, $param_foto_anak);
            
            // Set parameters
            $param_nama_janda = $nama_janda ;
            $param_foto = $itempic;
            $param_foto_anak = $itempic2;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect 
               echo "Berhasil nyimpan data <img src='gambar/$param_foto' height='60'>";
                echo "<meta http-equiv=\"refresh\"content=\"2;URL=tampil.php\"/>";
            } else{
                echo "Gagal menyimpan data";
                
            }
        }
         
   // Close statement
   mysqli_stmt_close($stmt);
    }
    mysqli_close($koneksi);
//end method post
}
?>
<html>
<head>
<title>Upload Gambar - ROOT93.CO.ID</title>
</head>
<body>
<div>
<br/>
<br/>
<br/>
<form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
<input type="text" size="25" required="" maxlength="30" minlength="2" name="nama_janda" placeholder="Masukan nama janda">
<input type="file" name="foto_janda" id="foto_janda">
<input type="file" name="foto_anak" id="foto_anak"><br/>
<input type="submit" value="Simpan">
</form>
</div>
<p><?php echo $nama_janda_err;?></p>
<p><?php echo $foto_janda_err;?></p>
<p><?php echo $foto_anak_err; ?></p>

</body>
</html>
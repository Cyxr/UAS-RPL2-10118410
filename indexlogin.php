<?php
session_start(); 
// include mysql connection
require './koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <link rel="icon" href="Group 2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="indexlogin.css">
    <title>Techstore</title>
</head>
<?php
if($_SESSION['akses_level']==""){
    header("location:index.html");
  } 
?>
<body>
    <div class="header">
        <div class="place">
            <a href="indexlogin.php">
                <img src="Group 1.png" class="logo" alt="">
            </a>
        </div>
        <div class="place">
            <ul>
                <li><a class="login" href="profile.php"><img src="Group 3.png" alt=""></a></li>
                <li><a href="productlogin.php">Product</a></li>
                <li><a href="indexlogin.php">Home</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        <div class="main-item">
            <div class="gambar1">
                <img src="Group 38.png" alt="">
            </div>
            
        </div>
        <div class="main-item">
            <h4>Techstore adalah tempat untuk mencari laptop dan smartphone bekas yang berkualitas</h4>
            <div class="gambar2">
                <img src="Group 43.png" alt="">
            </div>
        </div>
    </div>
    <div class="about">
        <div class="about-item">
            <h1>Kenapa Harus Techstore ?</h1>
            <p>Selamat Datang Di Techstore ! Kami merupakan marketplace pertama di Indonesia yang berspesialisasi dalam smartphone bekas.</p>
            <p> Misi kami adalah membangun kembali kepercayaan pada pasar smartphone bekas melalui ponsel berkualitas tinggi tetapi dengan harga yang terjangkau. Kami menjalankan metodologi seleksi dan pengujian yang sangat cermat untuk memberikan produk yang terbaik bagimu.</p>
            <p>Dengan membeli dari kami, kamu memberi nyawa kedua bagi sebuah perangkat, sehingga kamu turut membantu mengurangi limbah elektronik dan melindungi lingkungan.</p>
            <div class="gambar3">
                <img src="Group 12.png" alt="">
            </div>
        </div>
        <div class="about-item">
            <div class="gambar4">
                <img src="Group 13.png" alt="">
            </div>
        </div>
    </div>
    <div class="quality">
        <div class="quality-item">
            <div class="gambar5">
                <img src="Group 35.png" alt="">
            </div>
        </div>
        <div class="quality-item">
            <h1>Jaminan Kualitas</h1>
            <p>Semua fungsi ini sudah di uji coba oleh Techstore pada semua produk</p>
            <div class="gambar6">
                <img src="Group 79.png" alt="">
            </div>
            <div class="gambar7">
                <img src="gambar1.png" alt="">
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="footer-item">
            <div class="lf">
                <img src="Group 1.png" alt="">
            </div>
            <p>Jl. RS. Fatmawati Raya no. 188, Cilandak, Jakarta Selatan, DKI Jakarta, 12420 Indonesia</p>
        </div>
        <div class="footer-item">
        </div>
    </div>
    <div class="copyright">
        <p>Copyrights©2021 Techstore - All Rights Reserved</p>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
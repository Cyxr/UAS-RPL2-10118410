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
    <link rel="stylesheet" href="product.css">
    <title>Techstore</title>
</head>
<body>
    <div class="header">
        <div class="place">
            <a href="index.html">
                <img src="Group 1.png" alt="">
            </a>
        </div>
        <div class="place">
            <ul>
                <li><a class="login bg-danger" href="login.php">Login</a></li>
                <li><a href="product.php">Product</a></li>
                <li><a href="index.html">Home</a></li>
            </ul>
        </div>
    </div>
    <div class="search">
        <div class="search-place">
        
        <form action="?" method=GET>
            <div class="search-item">
                <input class="searchbox" type="text" placeholder="Cari product" name="cari">
                <input class="button bg-danger" type="submit" value="Cari">
            </div>
            <div class="search-item">
            </form>

            <form method=GET action="?">
                <div class="dropdown">
                    <select class="btn btn-danger dropdown-toggle" role="button" name="kategori" id="kategori" 
                    data-bs-toggle="dropdown" aria-expanded="false" onChange='this.form.submit()'>
                  
                    <option class="dropdown-item" value="">Kategori</option>
                    <?php
                    
        include "koneksi.php";
        $no=0;
        $query1 = mysqli_query($koneksi, 'SELECT * FROM tbl_produk GROUP BY tipe_produk');                                
        while ($data = mysqli_fetch_array($query1)) {
        $no++;         
        ?>               
                        <option class="dropdown-item" value="<?php echo $data["tipe_produk"];?>"><?php echo $data["tipe_produk"]; }?></option>
                   </select>
                    </ul>
                </div>
        </form>

            </div>
        </div>
    </div>
    <?php
    $no = 1;
    if(isset($_GET['cari'])){
        $cari = $_GET['cari'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE nama_produk like '%".$cari."%' ");         
    }
    else
    if (isset($_GET['kategori'])=="TRUE"){
        $kategori = $_GET['kategori'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_produk WHERE tipe_produk = '$kategori'");         
    }
    else
    {
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_produk ORDER BY id_produk ASC");
    }  
                              
    $result = array(); 
    function rp($angka){
        $angka = number_format($angka);
        $angka = str_replace(',', '.', $angka);
        $angka ="$angka";
        return $angka;
        }
    while ($data = mysqli_fetch_array($query)) {
    $result[] = $data; //result dijadikan array 
    }   

// menampilkan array
foreach($result as $post){
    echo "<div class=product>";
    echo  "<div class=product-item>";
    echo  "<div class=picture-product>";
            echo "<img src='img/$post[gambar]' class=laptop>";
           echo "</div>";
           echo "<div class=product-detail>";
               echo"<div class=title>";
                    echo"<h2>".$post["nama_produk"]."</h2>";
                    echo"<h5>".$post["warna"]."</h5>";
                    echo" <h1>Rp.".rp($post["harga"])."</h1>";
                    echo "</div>";
                echo "</div>";
                echo"<div class=lihat-product>";
                    echo "<a href=detailproduct.php?id=".$post["id_produk"].">Lihat Produk</a>";
                echo "</div>";
    echo "</div>";
    echo "</div>";  
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
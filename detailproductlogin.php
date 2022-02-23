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
    <link rel="stylesheet" href="detailprologin.css">
    <title>Techstore</title>
</head>
    <body>
    <?php
    if($_SESSION['akses_level']==""){
        header("location:index.html");
      } 
	$id_produk = $_GET["id"];
	$sql = "select * from tbl_produk where id_produk='".$id_produk."'";
	$result = mysqli_query($koneksi,$sql);

    while($row=mysqli_fetch_assoc($result)){
		$nama=$row['nama_produk'];
        $warna=$row['warna'];
        $harga=$row['harga'];
        $id=$row['id_produk'];
        $gambar=$row['gambar'];
        $gambar2=$row['gambar2'];
        $gambar3=$row['gambar3'];
        $proc=$row['prosesor'];
        $os=$row['os'];
        $gpu=$row['grafik_card'];
        $layar=$row['layar'];
        $ram=$row['ram'];
        $strg=$row['storage'];
        $lain=$row['other'];			
	}

?>
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
    <div class="product-detail">
        <div class="detail">
            <div class="gambarutama">
                <img <?php echo "src='img/$gambar'"?> alt="">
            </div>
            <div class="gambar2">
                <div class="contoh">
                <img <?php echo "src='img/$gambar2'"?> alt="">
                </div>
                <div class="contoh">
                <img <?php echo "src='img/$gambar3'"?> alt="">
                </div>
            </div>
        </div>
        <div class="detail">
            <h2 class="namabarang" value="<?=$nama?>"><?php echo $nama;?></h2>
            <h3><?php echo $warna;?></h3>
            <h1 class="price">Rp <?php echo rp($harga);?> </h1>
            <div class="buttonbuy">
                    <div class="buttonbuy-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="buy1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Beli
                        </button>
                    <form action="proses_order.php" method="post">
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="modal-body-item">
                                        <img src="bca.png" class="bca" alt="">
                                        <p>BCA</p>
                                        <div class="radio">
                                            <input class="form-check-input" type="radio" name="bank" id="bank" value="BCA" aria-label="..."required>
                                        </div>
                                    </div>
                                    <div class="modal-body-item">
                                        <img src="mandiri.png" class="mandiri" alt="">
                                        <p>Mandiri</p>
                                        <div class="radio">
                                            <input class="form-check-input" type="radio" name="bank" id="bank" value="Mandiri" aria-label="..." required>
                                        </div>   
                                    </div>
                                </div>
                                <div class="total">
                                    <h5>Detail Pembayaran</h5>
                                    <div class="rincian">
                                        <div class="rincian-item">
                                            <p>Asuransi</p>
                                        </div>
                                        <div class="rincian-item">
                                            <p class="harga">Rp. 50.000</p>
                                        </div>
                                    </div>
                                    <div class="rincian">
                                        <div class="rincian-item">
                                            <p><?php echo $nama;?></p>
                                        </div>
                                        <div class="rincian-item">
                                            <p class="harga">Rp <?php echo rp($harga);?></p>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="line-modal"></div>
                                <div class="totaldetail">
                                    <div class="detail-item">
                                        <p class="title">Total</p>
                                    </div>
                                    <div class="detail-item">
                                        <?php 
                                        $asuransi = 50000;
                                        $total = $asuransi+$harga;
                                        function rp($angka){
                                            $angka = number_format($angka);
                                            $angka = str_replace(',', '.', $angka);
                                            $angka ="$angka";
                                            return $angka;
                                            }
                                        $now = date("Y-m-d") ;
                                        $angka_acak =rand(1,100);
                                        $transfer = $total+$angka_acak;
                                        ?>
                                        <p class="hargabarang">Rp <?php echo rp($total);?></p>
                                    </div>
                                </div>
                                <div class="rincian">
                                        <div class="rincian-item">
                                            
                                        </div>
                                        <div class="rincian-item">
                                            <input type="text" name="total" id="total" value="<?php echo $transfer;?>" hidden >
                                            <input type="text" name="nama_produk" id="nama_produk" value="<?php echo $nama;?>" hidden>
                                            
                                            <input type="text" name="warna_produk" id="warna_produk" value="<?php echo $warna;?>" hidden>
                                            <input type="text" name="nama_pembeli" id="nama_pembeli" value="<?php echo $_SESSION['nama']; ?>" hidden>
                                            <input type="text" name="status_bayar" id="status_bayar" value="Belum Bayar"hidden >
                                            <input type="text" name="status_kirim" id="status_kirim" value="Belum Dikirim" hidden>
                                            <input type="date" name="tanggal_beli" id="tanggal_beli" value=<?php echo $now;?> hidden>
                                        </div>
                                    </div>
                                <div class="modal-footer">
                                    <button type="submit" class="buy2">Lanjutkan</button>
                                </div>
                        </form>     
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="line"></div>
            <h3 class="spesifikasi">Spesifikasi</h3>
            <table>
                <tr>
                    <td>•</td>
                    <td>Processor</td>
                    <td>:</td>
                    <td><?php echo $proc;?></td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Sistem Operasi</td>
                    <td>:</td>
                    <td><?php echo $os;?></td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Graphics</td>
                    <td>:</td>
                    <td><?php echo $gpu;?>
                    </td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Display</td>
                    <td>:</td>
                    <td><?php echo $layar;?></td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Memory</td>
                    <td>:</td>
                    <td><?php echo $ram;?>
                    </td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Storage</td>
                    <td>:</td>
                    <td><?php echo $strg;?>
                    </td>
                </tr>
                <tr>
                    <td>•</td>
                    <td>Lain nya</td>
                    <td>:</td>
                    <td><?php echo $lain;?>
                    </td>
            </table>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
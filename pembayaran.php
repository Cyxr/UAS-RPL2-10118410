<?php
session_start(); 
// include mysql connection
require './koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="Group 2.png">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="pembayaran.css" />
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
          <img src="Group 1.png" class="logo" alt="" />
        </a>
      </div>
      <div class="place">
        <ul>
          <li>
            <a class="login" href="profile.php"
              ><img src="Group 3.png" alt=""
            /></a>
          </li>
          <li><a href="productlogin.php">Product</a></li>
          <li><a href="indexlogin.php">Home</a></li>
        </ul>
      </div>
    </div>
    <div class="pembayaran">
      <div class="pembayaran-main">
        <p class="title1">Status Transaksi</p>
        <div class="line"></div>
        <div class="pembayaran-list">
          <div class="pembayaran-item">
          <?php
          $nama = $_SESSION['nama'];
            $sql = "SELECT * FROM tbl_order WHERE nama_pembeli='$nama' ORDER BY id_order DESC LIMIT 1";
                    $result = $koneksi->query($sql);
                    function rp($angka){
                      $angka = number_format($angka);
                      $angka = str_replace(',', '.', $angka);
                      $angka ="$angka";
                      return $angka;
                      }
                    
                      // output data of each row
                      while($row=mysqli_fetch_assoc($result)) {
                      $total = $row["total_harga"];
                      $bank = $row["bank_pembayaran"];
                      $produk = $row["nama_produk"];
                      $pembayaran = $row["status_pembayaran"];
                      $kirim = $row["status_kirim"];
                    }
                      ?>
            <p>Metode Pembayaran</p>
            <h5>Bank <?php echo  $bank; ?></h5> 
          </div>
          <div class="pembayaran-item"><?php
          if($bank == "BCA"){
                        echo "<img src='bca.png' alt=''>";
                      }
                      else{
                        echo "<img src='mandiri.png' alt=''>";
                      }
                      ?>
          </div>
        </div>
        <div class="pembayaran-list">
          <div class="pembayaran-item">
            <p>No Rekening</p>
            <?php
            if($bank == "BCA"){
                        echo "<h5>094924891924819 a/n Yeyen</h5>";
                      }
                      else{
                        echo "<h5>084924891924819 a/n Dafa Sacofi</h5>";
                      }
            ?>
          </div>
        </div>
        
        <div class="pembayaran-list">
          <div class="pembayaran-item">
            <p>Nama Barang</p>
            <h5><?php echo  $produk; ?></h5>
          </div>
        </div>
        <div class="pembayaran-list">
          <div class="pembayaran-item">
            <p>Status Pembayaran</p>
            <h5><?php echo  $pembayaran; ?></h5>
          </div>
        </div>
        <div class="pembayaran-list">
          <div class="pembayaran-item">
            <p>Status Pengiriman</p>
            <h5><?php echo  $kirim; ?></h5>
          </div>
        </div>
        <div class="pembayaran-list">
          <div class="pembayaran-item">
            <p>Total Pembayaran</p>
            <h5>Rp<?php echo rp($total); ?></h5>
          </div>
          <div class="pembayaran-item">
            <!-- Button trigger modal -->
            <button
              type="button"
              class="modal-button"
              data-bs-toggle="modal"
              data-bs-target="#staticBackdrop"
            >
              Lihat Detail
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="tombol">
      <div class="tombol-item">
        <a class="back" href="productlogin.php">Kembali</a>
      </div>
      <div class="tombol-item">
      <?php
          if($pembayaran == "Sudah Dibayar"){
                        echo "";
                      }
                      else{
                        echo "<a class='confirm' target = '_blank' href='https://wa.me/6287885333656?text=Saya%20sudah%20transfer%20sebesar%20(nominal%20yg%20anda%20transfer)%20%0Adari%20bank%20atas%20nama%20(bank%20pengirim)%0A(upload%20gambar%20bukti%20pembayaran%20agar%20lebih%20cepat%20diproses)'>Kirim Bukti Pembayaran</a>";
                      }
                      ?>
        <!-- <a class="confirm" target = '_blank' href="https://wa.me/6287885333656?text=Saya%20sudah%20transfer%20sebesar%20(nominal%20yg%20anda%20transfer)%20%0Adari%20bank%20atas%20nama%20(bank%20pengirim)%0A(upload%20gambar%20bukti%20pembayaran%20agar%20lebih%20cepat%20diproses)">Kirim Bukti Pembayaran</a> -->
      </div>
      
    </div>  
      <!-- Modal -->
      <div
        class="modal fade"
        id="staticBackdrop"
        data-bs-backdrop="static"
        data-bs-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel">Detail</h5>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <?php
            $sql_produk = "SELECT * FROM tbl_produk where nama_produk='".$produk."'";
            $hasil = $koneksi->query($sql_produk);
            
              // output data of each row
              while($post=mysqli_fetch_assoc($hasil)) {
              $hs = $post["harga"];
            }
              ?>
            <div class="modal-body">
              <div class="total">
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
                    <p><?php echo $produk ?></p>
                  </div>
                  <div class="rincian-item">
                    <p class="harga">Rp<?php echo rp($hs); ?></p>
                  </div>
                </div>
              </div>
              <div class="line-modal"></div>
              <div class="totaldetail">
                <div class="detail-item">
                  <p class="title">Total</p>
                </div>
                <div class="detail-item">
                  <p class="hargabarang">Rp<?php echo rp($total); ?></p>
                </div>
              </div>
            </div>
        </div>
        <!-- akhir modal -->
      
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
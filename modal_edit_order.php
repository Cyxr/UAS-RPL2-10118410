<?php
	include"koneksi.php";
	$id_user = $_GET["id"];
	$sql = "select * from tbl_order where id_order='".$id_user."'";
	$result = mysqli_query($koneksi,$sql);
	
	
	while($row=mysqli_fetch_assoc($result)){
        $id=$row['id_order'];			
        $nama_produk=$row['nama_produk'];
        $warna=$row['warna'];
        $total=$row['total_harga'];
        $bank=$row['bank_pembayaran'];
        $status_pembayaran=$row['status_pembayaran'];	
        $status_kirim=$row['status_kirim'];	
        $nama_pembeli=$row['nama_pembeli'];
        $tanggal=$row['tanggal_pembelian'];	
        $alamat=$row['alamat_pembeli'];		
	}

  
 // $query = "UPDATE tbl_user SET nip='$nip' , nama_lengkap='$nama' WHERE id_user='$id' ";

?>

    <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Orderan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="edit_proses_order.php" method="post">
                  <div class="modal-body">
                  
                  <div class="form-group">
                    <label for="no_pajak">Nama Pembeli</label> <br>
                    <input type="text" class="form-control form-control-user" id="id_order" name="id_order" value="<?=$id_user?>" aria-describedby="emailHelp" placeholder="Masukkan NIP user" hidden >
                    <?php 
                      $resultbaru = mysqli_query($koneksi, "select * from tbl_user"); 
                      $jsArray1 = "var prdNames = new Array();\n"; 
                      echo '<select name="nama_pembeli" id="nama_pembeli" class="custom-select rounded-0 col-7" onchange="changeValuess(this.value)" required>'; 
                      echo '<option value="' . $nama_pembeli . '">' . $nama_pembeli . '</option>'; 
                      while ($row1 = mysqli_fetch_array($resultbaru)) { 
                      echo '<option value="' . $row1['nama_user'] . '">' . $row1['nama_user'] . '</option>'; 
                      $jsArray1 .= "prdNames['" . $row1['nama_user'] . "'] = {neme:'".addslashes($row1['alamat'])."'};\n"; 
                      } 
                      echo '</select>'; 
                        ?> 
                        
                  </div>
                      <div class="form-group">
                        <label for="namaSup">Alamat Pembeli</label><br>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?=$alamat?>"  placeholder="Berisi Alamat Pembeli" >
                      </div>

                <script type="text/javascript"> 
                  <?php echo $jsArray1; ?>
                  function changeValuess(id){
                  document.getElementById('alamat').value = prdNames[id].neme;
                  };
                </script>
                  
                  

              <div class="form-group">
                    <label for="no_pajak">Nama Produk</label> <br>
                    <?php 
                      $result = mysqli_query($koneksi, "select * from tbl_produk"); 
                      $jsArray = "var prdName = new Array();\n"; 
                      echo '<select name="nama_produk" id="nama_produk" class="custom-select rounded-0 col-7" onchange="changeValue(this.value)" required>'; 
                      echo '<option value="' . $nama_produk . '">' . $nama_produk . '</option>'; 
                      while ($row = mysqli_fetch_array($result)) { 
                      echo '<option value="' . $row['nama_produk'] . '">' . $row['nama_produk'] . '</option>'; 
                      $jsArray .= "prdName['" . $row['nama_produk'] . "'] = {name:'" . addslashes($row['warna']) . 
                        "',desc:'".addslashes($row['harga'])."'};\n";
                      } 
                      echo '</select>'; 
                        ?> 
                  </div>
                <div class="form-group">
                        <label for="namaSup">Warna Produk</label><br>
                        <input type="text" class="form-control form-control-user" id="warna" name="warna" value="<?=$warna?>" placeholder="Berisi Warna Produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Total Harga</label><br>
                        <input type="text" class="form-control form-control-user" id="total" name="total" value="<?=$total?>" placeholder="Masukkan Total Harga" >
                      </div>
                      <script type="text/javascript"> 
                  <?php echo $jsArray; ?>
                  function changeValue(id){
                  var bilangan1 = prdName[id].desc;
                  var bilangan2 = 50000;
                  var unik = Math.floor((Math.random() * 100) + 1);
                  var penjumlahan = parseFloat(bilangan1) + parseFloat(bilangan2);
                  var total = parseFloat(unik) + parseFloat(penjumlahan);
                  document.getElementById('warna').value = prdName[id].name;
                  document.getElementById('total').value = total;
                  };
                  </script>


                      <div class="form-group">
                        <label for="status">Bank Pembayaran </label><br>
                        <select name="bank" id="bank" class="form-control form-control-user">
                        <option value="<?php echo $bank;?>" hidden><?php echo $bank;?></option>
                          <option value="BCA">BCA</option>
                          <option value="Mandiri">Mandiri</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="status">Status Pembayaran </label><br>
                        <select name="status_bayar" id="status_bayar" class="form-control form-control-user">
                        <option value="<?php echo $status_pembayaran;?>" hidden><?php echo $status_pembayaran;?></option>
                          <option value="Belum Dibayar">Belum Dibayar</option>
                          <option value="Sudah Dibayar">Sudah Dibayar</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="status">Status Pengiriman </label><br>
                        <select name="status_kirim" id="status_kirim" class="form-control form-control-user">
                          <option value="<?php echo $status_kirim;?>" hidden><?php echo $status_kirim;?></option>
                          <option value="Belum Dikirim">Belum Dikirim</option>
                          <option value="Sedang Dikemas">Sedang Dikemas</option>
                          <option value="Sedang Perjalanan">Sedang Perjalanan</option>
                          <option value="Sampai Tujuan">Sampai Tujuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Tanggal Pembelian</label><br>
                        <input type="date" value="<?=$tanggal?>" class="form-control form-control-user" id="tanggal" name="tanggal" >
                      </div>
                  </div>

                  <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-success" type="submit" value="simpan" >Ubah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
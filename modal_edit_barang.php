<?php
	include"koneksi.php";
	$id_produk = $_GET["id"];
	$sql = "select * from tbl_produk where id_produk='".$id_produk."'";
	$result = mysqli_query($koneksi,$sql);
	
	
	while($row=mysqli_fetch_assoc($result)){
            $id = $row['id_produk'];
            $nama = $row['nama_produk'];
            $warna = $row['warna'];
            $tipe = $row['tipe_produk'];
            $harga = $row['harga'];
            $proc = $row['prosesor'];
            $os = $row['os'];
            $vga = $row['grafik_card'];
            $layar = $row['layar'];
            $ram = $row['ram'];
            $hardisk = $row['storage'];
            $lain = $row['other'];
            $gambar1 = $row['gambar'];
            $gambar2 = $row['gambar2'];
            $gambar3 = $row['gambar3'];
      }

  
 // $query = "UPDATE tbl_user SET nip='$nip' , nama_lengkap='$nama' WHERE id_user='$id' ";

?>

    <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Barang</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="edit_proses_barang.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">

                  <div class="form-group">
                        <label for="namaSup">Nama Produk</label><br>
                        <input type="text" class="form-control form-control-user" id="id_produk" name="id_produk" value="<?=$id_produk?>" aria-describedby="emailHelp" placeholder="Masukkan NIP user" hidden >
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?=$nama?>" aria-describedby="emailHelp" placeholder="Masukkan nama produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Warna Produk</label><br>
                        <input type="text" class="form-control form-control-user" id="warna" name="warna" value="<?=$warna?>"  placeholder="Masukkan warna produk">
                      </div>
                      <div class="form-group">
                        <label for="status">Type Produk</label><br>
                        <select name="tipe" id="tipe" class="form-control form-control-user"  required>
                          <option value="<?php echo $tipe;?>"><?php echo $tipe;?></option>
                          <option value="Laptop">Laptop</option>
                          <option value="Smartphone">Smartphone</option>
                        </select>
                      </div>
                  
                      <div class="form-group">
                        <label for="namaSup">Harga Produk</label><br>
                        <input type="text" class="form-control form-control-user" id="harga" name="harga" value="<?=$harga?>"  placeholder="Masukkan harga produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Prosesor</label><br>
                        <input type="text" class="form-control form-control-user" id="proc" name="proc" value="<?=$proc?>"  placeholder="Masukkan spesifikasi prosesor produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Sistem Operasi</label><br>
                        <input type="text" class="form-control form-control-user" id="os" name="os" value="<?=$os?>"  placeholder="Masukkan spesifikasi sistem operasi produk">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Grafik Card</label><br>
                        <input type="text" class="form-control form-control-user" id="vga" name="vga" value="<?=$vga?>"  placeholder="Masukkan spesifikasi grafik card produk">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Layar</label><br>
                        <input type="text" class="form-control form-control-user" id="layar" name="layar"  value="<?=$layar?>"  placeholder="Masukkan spesifikasi layar produk">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Ram</label><br>
                        <input type="text" class="form-control form-control-user" id="ram" name="ram" value="<?=$ram?>"  placeholder="Masukkan spesifikasi ram produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Storage</label><br>
                        <input type="text" class="form-control form-control-user" id="hardisk" name="hardisk" value="<?=$hardisk?>"   placeholder="Masukkan spesifikasi hardisk produk">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Lain nya</label><br>
                        <input type="textbox" class="form-control form-control-user" id="lain" name="lain" value="<?=$lain?>"   placeholder="Masukkan spesifikasi lain produk seperti baterai, wifi dan semacamnya">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Gambar Utama/Simpul dihalaman produk</label><br>
                        <img src="img/<?=$gambar1?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" class="form-control form-control-user" id="gambar1" name="gambar1">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Gambar Ke 2</label><br>
                        <img src="img/<?=$gambar2?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" class="form-control form-control-user" id="gambar2" name="gambar2">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Gambar Ke 3</label><br>
                        <img src="img/<?=$gambar3?>" style="width: 120px;float: left;margin-bottom: 5px;">
                        <input type="file" class="form-control form-control-user" id="gambar3" name="gambar3">
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
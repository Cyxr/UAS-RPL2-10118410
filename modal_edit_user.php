<?php
	include"koneksi.php";
	$id_user = $_GET["id"];
	$sql = "select * from tbl_user where no_hp='".$id_user."'";
	$result = mysqli_query($koneksi,$sql);


	
	while($row=mysqli_fetch_assoc($result)){
        $id=$row['id_user'];
        $nohp=$row['no_hp'];
        $nama=$row['nama_user'];
        $jk=$row['jenis_kelamin'];
        $tanggal=$row['ttl'];
        $alamat=$row['alamat'];
        $email=$row['email_user'];
        $akl=$row['akses_level'];	
        $password=$row['kata_sandi'];				
	}

?>

    <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Profile Anda</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="edit_proses_user.php" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="namaSup">Nama</label><br>
                        <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?=$id?>" aria-describedby="emailHelp" hidden>
                        <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" value="<?=$nama?>"> 
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Jenis Kelamin</label><br>
                        <select class="form-control form-control-user" id="jenis_kelamin" name="jenis_kelamin" placeholder="Masukkan Nama user"> 
                        <option value="<?php echo $jk?>"><?php echo $jk;?></option>
                        <option value="Laki Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Tanggal Lahir</label><br>
                        <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?=$tanggal?>"  placeholder="Masukkan Nama user"> 
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Alamat</label><br>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?=$alamat?>"  placeholder="Masukkan Nama user"> 
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Email</label><br>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?=$email?>"  placeholder="Masukkan Nama user"> 
                      </div>
                      <div class="form-group">
                        <label for="namaSup">No Handphone</label><br>
                        <input type="text" class="form-control form-control-user" id="nohp" name="nohp" value="<?=$nohp?>"  placeholder="Masukkan Nama user"> 
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Password</label><br>
                        <input type="password" class="form-control form-control-user" id="sandi" name="sandi" value="<?=$password?>"  placeholder="Masukkan Nama user"> 
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-danger" type="submit" value="simpan" >Ubah</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
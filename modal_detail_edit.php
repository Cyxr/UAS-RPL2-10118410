<?php
	include"koneksi.php";
	$id_user = $_GET["id"];
	$sql = "select * from tbl_user where id_user='".$id_user."'";
	$result = mysqli_query($koneksi,$sql);
	
	
	while($row=mysqli_fetch_assoc($result)){
        $id=$row['id_user'];			
        $nama=$row['nama_user'];
        $jk=$row['jenis_kelamin'];
        $alamat=$row['alamat'];
        $tanggal=$row['ttl'];
        $email=$row['email_user'];	
        $nohp=$row['no_hp'];	
        $pwd=$row['kata_sandi'];
        $status=$row['status_user'];	
        $akl=$row['akses_level'];		
	}

  
 // $query = "UPDATE tbl_user SET nip='$nip' , nama_lengkap='$nama' WHERE id_user='$id' ";

?>

    <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="edit_proses_akun.php" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="namaSup">Nama Lengkap</label><br>
                        <input type="text" class="form-control form-control-user" id="id_user" name="id_user" value="<?=$id_user?>" aria-describedby="emailHelp" placeholder="Masukkan NIP user" hidden >
                        <input type="text" class="form-control form-control-user" id="nama_user" name="nama_user" value="<?=$nama?>" aria-describedby="emailHelp" placeholder="Masukkan NIP user">
                      </div>
                      <div class="form-group">
                        <label for="status">Jenis Kelamin</label><br>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control form-control-user">
                          <option value="<?php echo $jk;?>" hidden><?php echo $jk;?></option>
                          <option value="Laki-Laki">Laki-Laki</option>
                          <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Alamat</label><br>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat" value="<?=$alamat?>" placeholder="Masukkan Email user">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Tanggal Lahir</label><br>
                        <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" value="<?=$tanggal?>" placeholder="Masukkan Email user">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Email</label><br>
                        <input type="text" class="form-control form-control-user" id="email" name="email" value="<?=$email?>" placeholder="Masukkan Username user untuk login">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">No Handphone</label><br>
                        <input type="text" class="form-control form-control-user" id="nohp" name="nohp" value="<?=$nohp?>" placeholder="Masukkan Password user untuk login">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Kata Sandi</label><br>
                        <input type="text" class="form-control form-control-user" id="sandi" name="sandi" value="<?=$pwd?>" placeholder="Masukkan Password user untuk login">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Status User</label><br>
                        <input type="text" class="form-control form-control-user" id="status" name="status" value="<?=$status?>" placeholder="Masukkan Password user untuk login">
                      </div>
                      
                      <div class="form-group">
                        <label for="status">Akses Level</label><br>
                        <select name="akl" id="akl" class="form-control form-control-user">
                          <option value="<?php echo $akl;?>" hidden><?php echo $akl;?></option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
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
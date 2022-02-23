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
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="profile.css" />
    
    <title>Techstore</title>
    <link
      href="vendor/fontawesome-free/css/all.min.css"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />

    <!-- Custom styles for this page -->
    <link
      href="vendor/datatables/dataTables.bootstrap4.min.css"
      rel="stylesheet"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  </head>
  <?php
session_start(); 
// include mysql connection
require './koneksi.php';

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
    <div class="main1">
      <div class="main1-item">
        <h2>Profile</h2>
      </div>
      <div class="main1-item">
        <div class="logoutbutton">
          <a class="logout bg-danger" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
    <div class="main2">
      <div class="main2-item">
        <div class="picture">
          <img src="Group 3.png" alt="" />
        </div>
        <div class="buttonchange">
          <?php $nohp = $_SESSION['nohp']; echo'
          <a href="modal_edit_user.php?id='.$nohp.'" class="change bg-danger" id="edit_data" data-toggle="modal" data-target="#modal_detail_edit">Ubah Profile</a>'
          ?>
        </div>
        <div class="buttonchange">
        <br>
          <?php
          $pembeli = $_SESSION['nama'];
          $pembayaran = "Belum Bayar";
          $sql_produk = "SELECT * FROM tbl_order where nama_pembeli='$pembeli' order by id_order DESC limit 1";
          $hasil = $koneksi->query($sql_produk);
          
            // output data of each row
            while($post=mysqli_fetch_assoc($hasil)) {
            $idr = $post["id_order"]; 
            
            if(is_null($idr))
            {
                // it's empty!
                echo "";
            }
            else {
            echo

            "
            <a href=pembayaran.php class='change bg-danger' id=pembayaran >Lihat Transaksi Terakhir</a>
            ";
            }
          }
          
          ?>
        </div>
        
      </div>
      <div class="main2-item">
    
        <table>
        <?php
            // $id_user = $_SESSION['id'];
            // $sql = "select * from tbl_user where id_user='".$id_user."'";
            // $result = mysqli_query($koneksi,$sql);
     
            // while($row=mysqli_fetch_assoc($result)){
            //       $id=$row['id_user'];
            //       $nohp=$row['no_hp'];
            //       $nama=$row['nama_user'];
            //       $jk=$row['jenis_kelamin'];
            //       $tanggal=$row['ttl'];
            //       $alamat=$row['alamat'];
            //       $email=$row['email_user'];
            //       $akl=$row['akses_level'];	
            //       $password=$row['kata_sandi'];				
            // }
            $id = $_SESSION['idu'];
            $sql = "SELECT * FROM tbl_user WHERE id_user='$id'";
                    $result = $koneksi->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        $today = date("d F Y", strtotime($row["ttl"]));	
                      echo'
       
          <tr>
            <td>Nama</td>
            <td>:</td>
            <td>'.$row["nama_user"].'</td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>'.$row["jenis_kelamin"].'</td>
          </tr>
          <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>'.$today.'</td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>'.$row["alamat"].'</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>:</td>
            <td>'.$row["email_user"].'</td>
          </tr>
          <br />
          <tr>
            <td>No Handphone</td>
            <td>:</td>
            <td>'.$row["no_hp"].'</td>';}} ?>
          </tr>
        </table>
      </div>
      <div class="modal" id="modal_detail_edit" tabindex="-1" role="dialog" aria-labelledby="provinsi" aria-hidden="true"></div>

<script type="text/javascript">
		$(document).ready(function(){
			$('a#edit_data').click(function(){
				var url = $(this).attr('href');
				$.ajax({
					url : url,
					success:function(response){
						$('#modal_detail_edit').html(response);
					}
				});
			});
		});
    </script>
             
              </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
       <!-- Bootstrap core JavaScript-->
       <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
  </body>
</html>

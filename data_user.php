<?php
session_start(); 
// include mysql connection
require './koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pengguna</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="datauser.css" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['akses_level']==""){
		header("location:index.php?pesan=gagal");
	} else if($_SESSION['akses_level']=="2"){
		header("location:index.php?pesan=gagal");
	}


    if (isset($_GET['delete']))
    {
        hapus($_GET['delete'], $koneksi);
    }

    if (isset($_POST['nama']))
    {
        tambah($_POST['nama'], $_POST['jk'], $_POST['alamat'],$_POST['email'],$_POST['nohp'],$_POST['pwd'],$_POST['status'],$_POST['akl'],$_POST['ttl'], $koneksi);
    }

    

    function tambah($nama,$jk,$alamat,$email,$nohp,$pwd,$status,$akl,$ttl,$koneksi) {
      $sql = "insert into tbl_user values(null,'".$nama."','".$jk."','".$alamat."','".$email."','".$nohp."','".$pwd."','".$status."','".$akl."','".$ttl."');";
      //echo $sql;
      $koneksi->query($sql);
    }

    function hapus($res, $koneksi) {
      $sql = "delete from tbl_user where id_user=$res";
      $koneksi->query($sql);
    }

  ?>
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/bapenda.png" alt="AdminLTELogo" height="257" width="972">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    <!-- Left navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title" style="font-weight: bold;">
                <?php echo $_SESSION['nama']; ?>
                </h3>
                <p class="text-sm"> Admin </p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
         
          <div class="dropdown-divider"></div>
          <a href="logout.php" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      
    </ul>
      
      
      

  </nav>
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-secondary elevation-5">
    <!-- Brand Logo -->
    <a href="index_admin.php" class="brand-link">
      <span class="brand-text font-weight-light text-white">.</span>
      <img src="dist/img/bapenda.png" alt="AdminLTE Logo" class="brand-image" style="opacity: .9">
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-server nav-icon show"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./data_transaksi.php" class="nav-link">
                  <i class="fas fa-server nav-icon"></i>
                  <p>Data Transaksi</p>
                </a>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./data_order.php" class="nav-link">
                  <i class="fas fa-server nav-icon"></i>
                  <p>Data Order</p>
                </a>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./data_barang.php" class="nav-link">
                  <i class="fas fa-server nav-icon"></i>
                  <p>Data Barang</p>
                </a>
            </ul>
            <ul class="nav nav-treeview-menu">
              <li class="nav-item">
                <a href="./data_user.php" class="nav-link active">
                  <i class="fas fa-server nav-icon"></i>
                  <p>Data Akun</p>
                </a>
            </ul>
          </li>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      <div class="row md-12">
         
         </div><!-- /.col -->
         
         
         <div class="card card-primary">
             <div class="card-header">
             <h1 class="card-title"> Data Pengguna</h1>
             </div>

             <div class="card shadow mb-4">
               
           <div class="d-flex card-header py-3 align-items-center justify-content-end">
             <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm" data-toggle="modal" data-target="#inputModal1">
             <i class="fas fa-plus btn-sm"></i> Tambah Pengguna</a>
           </div> 
           <div class="modal fade" id="inputModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <form action="?" method="post">
                  <div class="modal-body">
                      <div class="form-group">
                        <label for="namaSup">Nama</label><br>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama"  aria-describedby="emailHelp" placeholder="Masukkan nama lengkap pengguna">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Jenis Kelamin</label><br>
                        <select class="form-control form-control-user" id="jk" name="jk" placeholder="Masukkan Nama user"> 
                        <option value="">Jenis kelamin pengguna</option>
                        <option value="Laki-Laki">Laki Laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Alamat</label><br>
                        <input type="text" class="form-control form-control-user" id="alamat" name="alamat"  placeholder="Masukkan alamat pengguna">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Tanggal lahir</label><br>
                        <input type="date" class="form-control form-control-user" id="ttl" name="ttl"  placeholder="Masukkan tanggal lahir pengguna">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">Email</label><br>
                        <input type="text" class="form-control form-control-user" id="email" name="email"  placeholder="Masukkan Email pengguna">
                      </div>
                      <div class="form-group">
                        <label for="namaSup">No HP</label><br>
                        <input type="text" class="form-control form-control-user" id="nohp" name="nohp"  placeholder="Masukkan No HP pengguna untuk login">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Kata Sandi</label><br>
                        <input type="text" class="form-control form-control-user" id="pwd" name="pwd"  placeholder="Masukkan kata sandi pengguna untuk login">
                      </div>

                      <div class="form-group">
                        <label for="namaSup">Status Pengguna</label><br>
                        <input type="text" class="form-control form-control-user" id="status" name="status"  placeholder="Masukkan status pengguna, admin atau user biasa">
                      </div>

                      <div class="form-group">
                        <label for="status">Akses Level <code>*akses admin ialah level 1</code></label><br>
                        <select name="akl" id="akl" class="form-control form-control-user">
                          <option value="">Pilih Level Akses</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                        </select>
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" type="button" value="Tambah">
                  </div>
                  </form>
                </div>
              </div>
            </div>

           <div class="card-body">
              <!-- /.card-header -->
            <div class="table-responsive">
                <table class="table table-striped text-center" style="width:100%" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th hidden>ID</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Tanggal lahir</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Password</th>
                            <th>Status Pengguna</th>
                            <th>Akses Level</th>
                            <th>Edit  Hapus</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no_urut = 0;
                    $sql = "SELECT * FROM tbl_user";
                    $result = $koneksi->query($sql);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      while($row = $result->fetch_assoc()) {
                        $no_urut++;
                        echo '<tr>
                                <td>'.$no_urut.'</td>
                                <td hidden>'.$row["id_user"].'</td>
                                <td>'.$row["nama_user"].'</td>
                                <td>'.$row["jenis_kelamin"].'</td>
                                <td>'.$row["alamat"].'</td>
                                <td>'.$row["ttl"].'</td>
                                <td>'.$row["email_user"].'</td>
                                <td>'.$row["no_hp"].'</td>
                                <td class="hidetext">'.$row["kata_sandi"].'</td>
                                <td>'.$row["status_user"].'</td>
                                <td>'.$row["akses_level"].'</td>
                                <td width="90">
                                <!-- Tombol Edit Data -->
                                <a class="btn btn-primary btn-sm" id="edit_data" data-toggle="modal" data-target="#modal_detail_edit" href="modal_detail_edit.php?id='.$row["id_user"].'"><i class="fas fa-edit"></i></a>
                                <!-- Tombol Hapus Data -->
                                <a href="?delete='.$row["id_user"].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah anda yakin akan menghapus data?\');"><i class="fas fa-trash-alt"></i></a> 
                                  </td>';
                                }
                              }
                            ?>
                            
                                  </tr>

                
                </div>
              </div>
            </div>
                    </tbody> 

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

  

    
    
    

          <!-- right col -->
        </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>

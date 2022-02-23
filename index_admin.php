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
  <title>Beranda</title>

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
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php 
 
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['akses_level']==""){
		header("location:index.php?pesan=gagal");
	} else if($_SESSION['akses_level']=="2"){
		header("location:index.php?pesan=gagal");
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
              <i class="fas fa-server nav-icon"></i>
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
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./data_user.php" class="nav-link">
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
        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <?php
    $data_barang = mysqli_query($koneksi,"SELECT * FROM tbl_order WHERE status_pembayaran='Sudah Dibayar'");
    $jumlah_barang = mysqli_num_rows($data_barang);
     ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h2 mb-0 text-gray-800">
                Selamat Datang Admin, <?php echo $_SESSION['nama']; ?>
              </h1>
            </div>

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jumlah_barang; ?></h3>
                <p>Transaksi Berhasil</p>
              </div>
              <div class="icon">
                <i class="fas fa-inbox"></i>
              </div>
              <a href="./lihat_data.php" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
    $data_barang = mysqli_query($koneksi,"SELECT * FROM tbl_order");
    $jumlah = mysqli_num_rows($data_barang);
     ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jumlah; ?></h3>
                <p>Orderan Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-receipt"></i>
              </div>
              <a href="./data_npwpd.php" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?php
    $data_barang = mysqli_query($koneksi,"SELECT * FROM tbl_user");
    $akun = mysqli_num_rows($data_barang);
     ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $akun; ?></h3>
                <p>Akun Pengguna Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="./akun_pengguna.php" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
    $data_barang = mysqli_query($koneksi,"SELECT * FROM tbl_produk");
    $adm = mysqli_num_rows($data_barang);
     ?>
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $adm; ?></h3>
               <p>Gadget/Barang Sedang Dijual</p>
              </div>
              <div class="icon">
                <i class="fas fa-database"></i>
              </div>
              <a href="./lihat_data_Satu_admin.php" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
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

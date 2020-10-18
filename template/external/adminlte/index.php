<?php
  include "../../../koneksi/koneksi.php";
  session_start();
  // if(!$_SESSION["username"]){
  //   header("location : ../../../index.php");
  // }
  // =============berubah=================
  if(!$_SESSION){
    header("location: ../../../index.php");
  }elseif(!$_SESSION["username"]){
    header("location : ../../../index.php");
  }
  // =============berubah=================

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PERPUSTAKAAN | GRISA</title>
  <!-- ============================perubahan========================= -->
 
  <!-- ============================perubahan========================= -->
  <!-- <script src="../bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->

  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
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
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

  <!-- datatables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

  <!-- <link rel="stylesheet" href="../select2/select2/dist/css/select2.min.css"> -->
  <!-- <link rel="stylesheet" href="../bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"> -->

  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
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
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>


  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

      <!-- =================================jangan di hapus======================================= -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <!-- <input id="search_sedia" name="search_sedia" class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search"> -->
        <div class="input-group-append">
          <!-- <button class="btn btn-navbar" type="submit"> -->
            <!-- <i class="fas fa-search"></i> -->
          <!-- </button> -->
        </div>
        
      </div>

      <!-- <div style="margin-right: 100px" class="btn-group mr-5">
        <button type="button" class="btn btn-primary"><i class="fas fa-cog"></i></button>
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
          <div class="dropdown-item"></div>
          <a href="../../../proses/logout.php" class="nav-link">Logout</a>
        </div>
      </div> -->
      

      <!-- =================================/jangan di hapus======================================= -->

      <!-- <?php if($_SESSION["cekStatus"] == 2 || $_SESSION["cekStatus"] == 1): ?>
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="../../../proses/proses.php?laporanku=<?= $_SESSION["nis"]; ?>" class="btn-sm ml-1 btn-primary">Download Laporanku</a>
          </li>
      </ul>
      <?php endif ?> -->

      <!-- <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../../proses/logout.php" class="nav-link">Logout</a>
        </li>
      </ul> -->
    
      <form action="#" method="post">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">

          </li>
        </ul>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- dropdown -->
      <li class="nav-item dropdown mr-5">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <?php 
          $niss = $_SESSION["nis"];
          $logout = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nis = $niss");
          $rows = mysqli_fetch_array($logout);
            if($rows["nama_anggota"] == null){
              echo $rows["nis"];
            }else{ 
              echo $rows["nama_anggota"]; 
            }
          ?>
         
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a href="../../../proses/logout.php" class="nav-link">Logout</a><hr>
            <a href="../../../proses/proses.php?profil=<?= $_SESSION["nis"]?>" class="nav-link">Profil</a>
        </div>
      </li>
      <!-- dropdown -->

      <!-- Messages Dropdown Menu -->
      <!-- Notifications Dropdown Menu -->
     
    </ul>
  </nav>

  <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
    <?php if(isset($_GET["pinjam"])): ?>


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <div class="row">
        <div class="col-md-10">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li> -->
            <form action="../../../proses/proses.php" method="post">
                <li class="nav-item d-none d-sm-inline-block">
                   <!-- ANGGOTA  -->
                  <div class="form-group">
                    <select class="form-control anggota" name="nisLaporan" id="nisLaporan"">
                      <option value="0">Pilih Nama</option>

                      <?php  $ang = mysqli_query($koneksi,"SELECT * FROM tb_kembali k LEFT JOIN tb_anggota a ON k.nis = a.nis GROUP BY k.nis ORDER BY k.nis");
                        foreach ($ang as $tampil) {
                      ?>
                        <option value="<?=$tampil['nis']?>"><?=$tampil['nama_anggota']?></option>
                      <?php }?>
                    </select>
                  </div>
                </li>
              </ul>
              </div>
        </div>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm mb-3 ml-1" type="submit" name="laporanPeminjaman">Lap Per Nama</button>
                </li>
            </form> 

        <script>
  $(document).ready(function(){
 $('.anggota').select2();

  })
</script>

        <!-- ====================================================================== -->
      

      <!-- file peminjaman_tanggal_pinjam.php         -->
        <ul class="navbar-nav ml-auto">
          <form action="../../../proses/proses.php" method="post">
          <li class="nav-item d-none d-sm-inline-block">
            <div class="form-group">
            <select class="nav-link form-control" name="tglPinjamLaporan" id="tglPinjamLaporan">
                        <option value="0">Semua</option>
                        <?php
                        
                        // $qNisPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali GROUP BY tgl_pinjam");
                        // ?>
                        // <?php while($rowTglPinjam = mysqli_fetch_array($qNisPinjam)): ?>
                        //     <option value="<?= $rowTglPinjam["tgl_pinjam"] ?>"><?= $rowTglPinjam["tgl_pinjam"] ?></option>
                        // <?php endwhile ?>
                    </select>
                  </div>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm" type="submit" name="tglPinjamReport">Lap Pinjam & Kembali</button>
                </li>
            </form>
        </ul>

        <!-- ====================================================================== -->

        <!-- <ul class="navbar-nav ml-auto">
            <form action="../../../proses/proses.php" method="post">
                <li class="nav-item d-none d-sm-inline-block">
                  <div class="form-group">
                    <select class="form-control" class="nav-link" name="tglKembaliLaporan" id="tglKembaliLaporan">
                        <option value="0">Tgl Kembali</option>
                        <?php
                        
                        $qNisKembali = mysqli_query($koneksi, "SELECT * FROM tb_kembali WHERE tgl_kembali > 0 GROUP BY tgl_kembali");
                        ?>
                        <?php while($rowTglKembali = mysqli_fetch_array($qNisKembali)): ?>
                            <option value="<?= $rowTglKembali["tgl_kembali"] ?>"><?= $rowTglKembali["tgl_kembali"] ?></option>
                        <?php endwhile ?>
                    </select>
                    </div>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm" type="submit" name="tglKembaliReport">Laporan Peminjaman</button>
                </li>
            </form>
        </ul> -->

        <!-- ====================================================================== -->
    </nav>

    <?php endif ?>
    <?php endif ?>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/grisa.png" alt="SMK PGRI 1 NGAWI Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SMK PGRI 1 NGAWI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php
        $nis = $_SESSION['nis'];
        $fotof = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nis = $nis");
          while ($row = mysqli_fetch_array($fotof)):
        ?>
          <img style="background-color: wheat;" src="../../../proses/file/<?= $row['foto'] ?>" class="img-circle elevation-2" alt="Fotoku">
        </div>
        <div class="info">
          <a href="index.php?profil=profil" class="d-block">
            <?php 
            if($row["nama_anggota"] == null){
              echo $row["nis"];
            }else{ 
              echo $row["nama_anggota"]; 
            }
            ?>
          <?php endwhile ?>
          </a>
        </div>
      </div>


      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-<?php if($_SESSION["cekStatus"] == 2) {
            echo 'open';
          }else{
            echo 'close';
          }
          ?>">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Home
                <!-- <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
          </li>
        </ul>
        </nav>  

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-<?php if($_SESSION["cekStatus"] == 2) {
            echo 'open';
          }else{
            echo 'close';
          }
          ?>">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
                Data Master
              <?php elseif($_SESSION["cekStatus"] == 2): ?>
                Dashboard
              <?php endif ?>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
          <ul class="nav nav-treeview">
                
            <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?users=users" class="nav-link <?php if(isset($_GET["users"])) {echo "active";}elseif(isset($_GET["tambahUsers"])){echo "active";}elseif(isset($_GET["editUsers"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
              <?php endif ?>

              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?lokasiBuku=lokasiBuku" class="nav-link <?php if(isset($_GET["lokasiBuku"])) {echo "active";}elseif(isset($_GET["tambahLokasiBuku"])){echo "active";}elseif(isset($_GET["editLokasiBuku"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lokasi Buku</p>
                </a>
              </li>
              <?php endif ?>

              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?jurusan=jurusan" class="nav-link <?php if(isset($_GET["jurusan"])) {echo "active";}elseif(isset($_GET["tambahJurusan"])){echo "active";}elseif(isset($_GET["editJurusan"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <?php endif ?>

              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?kelas=kelas" class="nav-link <?php if(isset($_GET["kelas"])) {echo "active";}elseif(isset($_GET["tambahKelas"])){echo "active";}elseif(isset($_GET["editKelas"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kelas</p>
                </a>
              </li>
              <?php endif ?>

              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?offering=offering" class="nav-link <?php if(isset($_GET["offering"])) {echo "active";}elseif(isset($_GET["tambahOffering"])){echo "active";}elseif(isset($_GET["editOffering"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Offering</p>
                </a>
              </li>
              <?php endif ?>

              <li class="nav-item">
                <a href="index.php?buku=buku" class="nav-link <?php if(isset($_GET["buku"])) {echo "active";}elseif(isset($_GET["tambahBuku"])){echo "active";}elseif(isset($_GET["editBuku"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Buku</p>
                </a>
              </li>

              <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
              <li class="nav-item">
                <a href="index.php?anggota=anggota" class="nav-link <?php if(isset($_GET["anggota"])) {echo "active";}elseif(isset($_GET["tambahAnggota"])){echo "active";}elseif(isset($_GET["editAnggota"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Anggota</p>
                </a>
              </li>
              <?php endif ?>

              <li class="nav-item">
                <a href="index.php?pinjam=pinjam" class="nav-link <?php if(isset($_GET["pinjam"])) {echo "active";}elseif(isset($_GET["tambahPinjam"])){echo "active";}elseif(isset($_GET["editPinjam"])){echo "active";} ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pinjam & Kembali</p>
                </a>
              </li>

            </ul>
            
          </li>
        </ul>

    <?php if($_SESSION["cekStatus"] == 2 ): ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-<?php if($_SESSION["cekStatus"] == 2) {
            echo 'open';
          }else{
            echo 'open';
          }
          ?>">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Download Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          <ul class="nav nav-treeview">

          <li class="nav-item">
            <a href="../../../proses/proses.php?laporanku=<?= $_SESSION["nis"]; ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Peminjamanku</p>
            </a>
          </li>

          </ul>
      </nav>
    <?php endif ?>

    <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1  ): ?>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-<?php if($_SESSION["cekStatus"] == 2) {
            echo 'open';
          }else{
            echo 'open';
          }
          ?>">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Download Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

          <ul class="nav nav-treeview">

            <li class="nav-item"> 
                <a id="laporanku" href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  
                  <!-- Button trigger modal -->
                  <p data-toggle="modal" data-target="#modalPerPinjam"> 
                    Lap. Tanggal Pinjam
                  </p>   

                </a>
            </li> 

            <li class="nav-item">
                <a id="laporanku" href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  
                  <!-- Button trigger modal -->
                  <p data-toggle="modal" data-target="#modalPerKembali">
                    Lap. Tanggal Kembali
                  </p>   

                </a>
            </li>

            <!-- <li class="nav-item"> -->
                <!-- <a id="laporanku" href="#" class="nav-link"> -->
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  
                  <!-- Button trigger modal -->
                  <!-- <p data-toggle="modal" data-target="#modalPerAnggota"> -->
                    <!-- Buku Per Anggota -->
                  <!-- </p>    -->

                <!-- </a> -->
            <!-- </li> --

            <!-- <li class="nav-item">
            <form action="../../../proses/proses.php" method="post">
                <li class="nav-item d-none d-sm-inline-block btn-sm">
                    <select class="btn-sm" name="tglPinjamLaporan" id="tglPinjamLaporan">
                        <option value="0">Tgl Pinjam</option>
                        <?php
                        
                        $qNisPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali");
                        ?>
                        <?php while($rowTglPinjam = mysqli_fetch_array($qNisPinjam)): ?>
                            <option value="<?= $rowTglPinjam["tgl_pinjam"] ?>"><?= $rowTglPinjam["tgl_pinjam"] ?></option>
                        <?php endwhile ?>
                    </select>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm" type="submit" name="tglPinjamReport">Download</button>
                </li>
            </form>
            </li>

            <form action="../../../proses/proses.php" method="post">
                <li class="nav-item d-none d-sm-inline-block btn-sm">
                    <select class="btn-sm" name="tglKembaliLaporan" id="tglKembaliLaporan">
                        <option value="0">Tgl Kembali</option>
                        <?php
                        
                        $qNisKembali = mysqli_query($koneksi, "SELECT * FROM tb_kembali WHERE tgl_kembali > 0");
                        ?>
                        <?php while($rowTglKembali = mysqli_fetch_array($qNisKembali)): ?>
                            <option value="<?= $rowTglKembali["tgl_kembali"] ?>"><?= $rowTglKembali["tgl_kembali"] ?></option>
                        <?php endwhile ?>
                    </select>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm" type="submit" name="tglKembaliReport">Download</button>
                </li>
            </form>

            
            <form action="../../../proses/proses.php" method="post">
                <li class="nav-item d-none d-sm-inline-block btn-sm">
                    <select class="btn-sm" name="nisLaporan" id="nisLaporan">
                        <option value="0"> Nama</option>
                        <?php
                        
                        $qNisPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k JOIN tb_anggota a ON k.nis = a.nis GROUP BY k.nis");
                        while($rowNisPinjam = mysqli_fetch_array($qNisPinjam)):
                        ?>
                            <option value="<?= $rowNisPinjam["nis"] ?>"><?= $rowNisPinjam["nama_anggota"] ?></option>
                        <?php endwhile ?>
                    </select>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <button class="btn btn-primary btn-sm" type="submit" name="laporanPeminjaman">Download</button>
                </li>
            </form>  -->

          </ul>
      </nav>
    <?php endif ?>
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
            <!-- <h1 class="m-0 text-dark">Dashboardd</h1> -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- tampil buku -->
    <div style="position: fixed; z-index: 999; width: 100%" id="tampil_sedia"></div>

    <!-- Main content -->
    <section class="content">
      <div class="container">
      
      <?php
        // include "../../../koneksi/koneksi.php";
        if(isset($_GET["users"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/users/users.php";
          }
        }elseif(isset($_GET["editUsers"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/users/editUsers.php";
          }
        }elseif(isset($_GET["tambahUsers"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/users/tambahUsers.php";
          }
        }elseif(isset($_GET["buku"])){
          include "../../../form/buku/buku.php";
        }elseif(isset($_GET["editBuku"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/buku/editBuku.php";
          }
        }elseif(isset($_GET["tambahBuku"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/buku/tambahBuku.php";
          }
        }elseif(isset($_GET["tambahPetugas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/petugas/tambahPetugas.php";
          }
        }elseif(isset($_GET["petugas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/petugas/petugas.php";
          }
        }elseif(isset($_GET["editPetugas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/petugas/editPetugas.php";
          }
        }elseif(isset($_GET["jurusan"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/jurusan/jurusan.php";
          }
        }elseif(isset($_GET["tambahJurusan"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/jurusan/tambahJurusan.php";
          }
        }elseif(isset($_GET["editJurusan"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/jurusan/editJurusan.php";
          }
        }elseif(isset($_GET["anggota"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/anggota/anggota.php";
          }
        }elseif(isset($_GET["tambahAnggota"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/anggota/tambahAnggota.php";
          }
        }elseif(isset($_GET["editAnggota"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/anggota/editAnggota.php";
          }
        }elseif(isset($_GET["kelas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/kelas/kelas.php";
          }
        }elseif(isset($_GET["tambahKelas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/kelas/tambahKelas.php";
          }
        }elseif(isset($_GET["editKelas"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/kelas/editKelas.php";
          }
        }elseif(isset($_GET["offering"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/offering/offering.php";
          }
        }elseif(isset($_GET["tambahOffering"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/offering/tambahOffering.php";
          }
        }elseif(isset($_GET["editOffering"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/offering/editOffering.php";
          }
        }elseif(isset($_GET["lokasiBuku"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/lokasiBuku/lokasiBuku.php";
          }
        }elseif(isset($_GET["tambahLokasiBuku"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/lokasiBuku/tambahLokasiBuku.php";
          }
        }elseif(isset($_GET["editLokasiBuku"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/lokasiBuku/editLokasiBuku.php";
          }
        }elseif(isset($_GET["pinjam"])){
          // if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/pinjam/pinjam.php";
          // }
        }elseif(isset($_GET["tambahpinjam"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/pinjam/tambahPinjam.php";
          }
        }elseif(isset($_GET["editpinjam"])){
          if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/pinjam/editPinjam.php";
          }
        }elseif(isset($_GET["pagePinjam"])){
            include "../../../form/pinjam/pinjam.php";
        }elseif(isset($_GET["pageUsers"])){
          include "../../../form/users/users.php";
        }elseif(isset($_GET["pageBuku"])){
            include "../../../form/buku/buku.php";
        }elseif(isset($_GET["pageLokasiBuku"])){
          include "../../../form/lokasiBuku/lokasiBuku.php";
        }elseif(isset($_GET["pagePetugas"])){
          include "../../../form/petugas/petugas.php";
        }elseif(isset($_GET["pageJurusan"])){
          include "../../../form/jurusan/jurusan.php";
        }elseif(isset($_GET["pageUsers"])){
          include "../../../form/users/users.php";
        }elseif(isset($_GET["pageKelas"])){
          include "../../../form/kelas/kelas.php";
        }elseif(isset($_GET["pageOffering"])){
          include "../../../form/offering/offering.php";
        }elseif(isset($_GET["pageAnggota"])){
          // if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1){
            include "../../../form/anggota/anggota.php";
            // echo "ua";
          // }
        }elseif(isset($_GET["profil"])){
          // $profil = $_GET["profil"];
          include "../../../form/profil/profil.php";
        }elseif(isset($_GET["editProfil"])){
          // $profil = $_GET["profil"];
          include "../../../form/profil/editProfil.php";
        }elseif(isset($_GET["buku_belum_dikembalikan"])){
          include "../../../form/buku_belum_dikembalikan.php";
        }else{
          include "../../../form/grafik/grafik.php";
        }
      ?>
      <!-- disini kontennya -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>SKRIPSI &copy;2020 <a href="#">FATKHUL UMAR | 16112307</a></strong>
    
    <div class="float-right d-none d-sm-inline-block">
      <b>STT STIKMA </b><i>Internasional</i>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
    $(document).ready(function(){
      $('#search_sedia').keyup(function(){
        var search = $('#search_sedia').val()
        $.ajax({
          type : 'POST',
          url : '../../../proses/ajax_sedia.php?search_sedia=' + search,
          data : 'search=' + search,
          success : function(data){
            $('#tampil_sedia').html(data)
          }
        })
      })
    })
</script>


<!-- Modal -->
<div class="modal fade" id="modalLaporanku" tabindex="-1" role="dialog" aria-labelledby="modalLaporankuTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLaporankuTitle">Download Laporanku</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Download</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPerPinjam" tabindex="-1" role="dialog" aria-labelledby="modalPerPinjamTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPerPinjamTitle"><b>Tanggal Pinjam</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
     
        <form action="../../../proses/laporan_peminjaman_pinjam.php " method="post">
            <div class="form-group">
                <label>Dari Tanggal</label>
                <input type="date" name="tgl_dari" class="form-control" required="  ">

             </div>
              <div class="form-group">
                <label>Ke  Tanggal</label>
                <input type="date" name="tgl_ke" class="form-control" required="  ">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Download</button>
      </div>
      </form>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPerKembali" tabindex="-1" role="dialog" aria-labelledby="modalPerKembaliTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPerKembaliTitle"><b>Tanggal Kembali</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <form action="../../../proses/laporan_peminjaman_kembali.php " method="post">  
        <div class="form-group">
            <label>Dari Tanggal</label>
                <input type="date" name="tgl_dari" class="form-control" required="  ">

             </div>
              <div class="form-group">
                <label>Ke  Tanggal</label>
                <input type="date" name="tgl_ke" class="form-control" required="  ">

              </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Download</button>
        <!-- </form> -->
        </form>
      <!-- </div> -->
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalPerAnggota" tabindex="-1" role="dialog" aria-labelledby="modalPerAnggotaTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="modalPerKembaliTitle">Laporan Per Kembali</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form action="">

          <div class="form-group">
              <label>Anggota</label>
              <select name="anggota" id="anggota" class="form-control">

                <?php  $ang = mysqli_query($koneksi,"select * from tb_anggota ");
                  foreach ($ang as $tampil) {
                    # code...
                 
                 ?>

                  <option><?=$tampil['nama_anggota']?>  </option>

                <?php }?>

                </select>

           </div>

        </form>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Download</button>
        <!-- </form> -->
        
      <!-- </div> -->
    </div>
  </div>
</div>

    <?php 
        if(isset($_SESSION["login"])){
            $data_alert = "Selamat Datang Diperpus SMK PGRI 1 NGAWI";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["login"]);
        }
    ?>

<script>
  $(document).ready(function(){
 $('#username').select2();

  })
</script>



<!-- <script src="../select2/select2/dist/js/select2.min.js"></script> -->


</body>
</html>

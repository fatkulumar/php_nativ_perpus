<?php
  $nis = $_SESSION["nis"];
  $status = $_SESSION["cekStatus"];

  $users = mysqli_query($koneksi, "SELECT * FROM tb_user");
  $jml_users = mysqli_num_rows($users);
  //jumlah buku admin
  $buku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
  $jml_buku = mysqli_num_rows($buku);
  //jumlah buku anggota
  $buku_anggota = mysqli_query($koneksi, "SELECT * FROM tb_kembali WHERE nis = '$nis' AND status = 1");
  $jml_buku_anggota = mysqli_num_rows($buku_anggota);

  
  //denda yang login anggota
  $denda = mysqli_query($koneksi, "SELECT SUM(denda) AS denda FROM tb_kembali WHERE nis = '$nis' AND status <= 2 AND status_denda = 0");
  $jml_denda = mysqli_fetch_array($denda);
  //denda yang login admin
  $denda_admin = mysqli_query($koneksi, "SELECT SUM(denda) AS denda_admin FROM tb_kembali WHERE status <= 2 AND status_denda = 0");
  $jml_denda_admin = mysqli_fetch_array($denda_admin);

?>
<?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
<div class="card">   
    <div class="card-header bg-primary mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-0 text-white">
                    <strong>Home</strong>
                </h1>
            </div>
        </div>
    </div>

    <div class="card-body">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span data-toggle="modal" data-target="#modalDetailBuku" class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Denda</span>
                <span class="info-box-number"><?= number_format($jml_denda_admin['denda_admin']); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span data-toggle="modal" data-target="#modalDetailBuku" class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Buku</span>
                <span class="info-box-number"><?=  $jml_buku ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
            <div class="info-box mb-3">
              <span data-toggle="modal" data-target="#modalDetailBuku" class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Users</span>
                <span class="info-box-number"><?= $jml_users ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="modalDetailBuku" tabindex="-1" role="dialog" aria-labelledby="modalDetailBukuTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalDetailBukuTitle"><b>Detail</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-hover table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Buku</td>
              <td>Denda</td>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 0;
              $qdetail = mysqli_query($koneksi, "SELECT * FROM tb_kembali k JOIN tb_anggota a ON k.nis = a.nis JOIN tb_buku b ON b.id_buku = k.id_buku WHERE k.status = 1");
              while($row = mysqli_fetch_array($qdetail)){
                $no++;
              
            ?>
            <tr>
              <td><?= $no ?></td>
              <td><?= $row["nama_anggota"];?></td>
              <td><?= $row["judul_buku"];?></td>
              <td><?= $row["denda"];?></td>
            </tr>
              <?php } ?>
          </tbody>
        </table>
      
        
        
        
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


<?php 
        if(isset($_SESSION["login"])){
            $data_alert = "Selamat Datang Diperpus SMK PGRI 1 NGAWI";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["login"]);
        }
    ?>

<?php elseif($_SESSION["cekStatus"] == 2): ?>

  <div class="card">   
    <div class="card-header bg-primary mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-0 text-white">
                    <strong>Home</strong>
                </h1>
            </div>
        </div>
    </div>

    <div class="card-body">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          
          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-lock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Denda</span>
                <span class="info-box-number"><?= number_format($jml_denda['denda']) ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Buku Dipinjam</span>
                <span class="info-box-number"><?= $jml_buku_anggota ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
      </div>
    </div>
</div>


<?php 
    if(isset($_SESSION["login"])){
        $data_alert = "Selamat Membaca Diperpus SMK PGRI 1 NGAWI";
        require_once "../../../form/sweetalert/sweetalert.php";
        unset($_SESSION["login"]);
    }
?>


<?php endif ?>
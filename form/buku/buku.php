<?php error_reporting(0); if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>

<?php
    $qqBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
    $cekBuku = mysqli_fetch_array($qqBuku);
    if($cekBuku == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_buku AUTO_INCREMENT = 1");
    }
?>

   

    <div class="container">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
              
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div style="margin-bottom: 5px;">
       
    </div>

    <?php       
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_buku b LEFT JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku");  

    ?>
   
    <div class="card">
        
        <div class="card-header bg-primary">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-0 text-white">
                    <strong>Data Buku</strong>
                </h1>
            </div>
            <div class="col-md-6">
                <form action="../../../proses/proses.php" method="post" class="float-right">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambahBuku">(+) Tambah Buku</a>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <!-- <input class="form-control" style="float: right" type="text" name="search_buku" id="search_buku" placeholder="Cari Buku" autocomplete="off"> -->
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success btn-sm" type="submit" name="bukuReport">Laporan Buku</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
	<div class="card-body">
    <div class="table table-responsive">
        <table id="table_buku" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Lokasi Buku</th>
                    <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
                        <th>Aksi</th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody id="tampil">
                <?php
                    $no = 0;
                    while($rBuku = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rBuku["kd_buku"] ?></td>
                    <td><?= $rBuku["judul_buku"] ?></td>
                    <td><?= $rBuku["pengarang"] ?></td>
                    <td><?= $rBuku["penerbit"] ?></td>
                    <td><?= $rBuku["tahun_terbit"] ?></td>
                    <td><?= $rBuku["stok"] ?></td>
                    <td><?= $rBuku["lokasi_buku"] ?></td>
                    <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
                    <td>
                        <div class="btn-group" role="group">
                        <a onclick="return confirm('Yakin Hapus Buku?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?hapusBuku=<?= $rBuku["id_buku"] ?>">Hapus</a> <a class="btn btn-success btn-sm" href="index.php?editBuku=<?= $rBuku["id_buku"] ?>">Edit</a>
                        </div>
                    </td>
                    <?php endif ?>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
	</div>
    </div>

        <script>
            $(document).ready( function () {
                $('#table_buku').DataTable();
            } );
        </script>
 

    <script>
        $(document).ready(function(){
        $('#search_buku').keyup(function(){
            var search = $('#search_buku').val()
            $.ajax({
                type : 'POST',
                url : '../../../proses/ajax_buku.php?search_buku=' + search,
                data : 'search_buku=' + search,
                success : function(data) {
                    $('#tampil').html(data)
                }
            })
        })
        })

    </script> 

            <div>
        </div>

        <?php 
        if(isset($_SESSION["alert_tambah_buku"])){
            $data_alert = "Data Buku Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_buku"]);
        }elseif(isset($_SESSION["alert_hapus_buku"])){
            $data_alert = "Data Buku Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_buku"]);
        }elseif(isset($_SESSION["alert_edit_buku"])){
            $data_alert = "Data Buku Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_buku"]);
        }
    ?>
    
<!-- </div> -->

     
<!-- </div> -->

    
<?php else: ?>
    <?php
        $qPinjamBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku");
        $qqPinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam");
        $cekPinjam = mysqli_fetch_array($qqPinjam);
        if($cekPinjam == null){
            $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_pinjam AUTO_INCREMENT = 1");
        }
    ?>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
     
        
        <div class="card-header bg-primary mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Buku</strong>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div> 

    
<?php

    $sessionNis = $_SESSION["nis"];

?>

            <table id="table_buku" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        while($rPinjamBuku = mysqli_fetch_array($qPinjamBuku)) :
                            $no++;
                    ?>
                    <tr onclick="buku(<?= $rPinjamBuku['id_buku'] ?>)">
                        <td><?= $no ?></td>
                        <td><?= $rPinjamBuku["judul_buku"] ?></td>
                        <td><?= $rPinjamBuku["pengarang"] ?></td>
                        <td><?= $rPinjamBuku["penerbit"] ?></td>
                        <td><?= $rPinjamBuku["tahun_terbit"] ?></td>
                        <td id="stok">
                            <?php
                                if($rPinjamBuku["stok"] < 0 || $rPinjamBuku["stok"] == 0){
                                    echo "Persediaan Kosong";
                                }else{
                                    echo $rPinjamBuku["stok"];
                                }
                            ?>
                        </td>
                    </tr>

            <?php
                $tglPinjam = date_create(date('Y-m-d')); // waktu sekarang
                // $tanggalPinjam = date('d-F-Y H:i:s');
                $tanggalPinjam = date('d-F-Y');
                $tiga_hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
                $tglKembali = date_create(date('Y-m-d', $tiga_hari));
                $tanggalKembali = date('d-F-Y', $tiga_hari);
            ?>

            <div class='modal' id='myModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
            
                    <!-- Modal Header -->
                    <div class='modal-header'>
                        <h4 class='modal-title'>Pinjam Buku</h4>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        </div>
                        <div class='row'>
                        
                            <!-- Modal body -->
                            <div class='modal-body'>
                                <input class='form-control' type='hidden' name='id_buku' id='id_buku' value='$pbId' readonly>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='nis'>NIS</label>
                                            <input class='form-control' type='text' name='nis' id='nis' value=<?=$_SESSION['nis'] ?> readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='kd_buku'>Kode Buku</label>
                                            <input class='form-control' type='text' name='kd_buku' id='kd_buku' value='' readonly>
                                        </div>
                                    </div>
                                    
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='nama_anggota'>Nama</label>
                                            <input class='form-control' type='text' name='nama_anggota' id='nama_anggota' value='<?=$_SESSION['nama_anggota']?>' readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='judul_buku'>Judul Buku</label>
                                            <input class='form-control' type='text' name='judul_buku' id='judul_buku' value='' readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='pengarang'>Pengarang</label>
                                            <input class='form-control' type='text' name='pengarang' id='pengarang' value='' readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='tahun_terbit'>Tahun Terbit</label>
                                            <input class='form-control' type='text' name='tahun_terbit' id='tahun_terbit' value='' readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='tgl_pinjam'>Tanggal Pinjam</label>
                                            <input class='form-control' type='text' name='tgl_pinjam' id='tgl_pinjam' value='<?= $tanggalPinjam ?>' readonly>
                                        </div>
                                    </div>

                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <label for='tgl_kembali'>Harus Kembali</label>
                                            <input class='form-control' type='text' name='tgl_kembali' id='tgl_kembali' value='<?= $tanggalKembali ?>' readonly>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class='col-md-12'>
                                <div class='form-group'>
                                <?php
                                    $nis = $_SESSION["nis"];
                                    $cek_pinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali WHERE nis = '$nis' AND `status` <= 1");
                                    $rowNis = mysqli_fetch_array($cek_pinjam);
                                    $jml_pinjam = mysqli_num_rows($cek_pinjam);
                                    if($jml_pinjam >= 3):
                                ?>
                                <input class="form-control" type="text"value="Anda Sudah Meminjam Batas Maksimal" readonly>
                                </div>
                                <?php endif ?>
                            </div>
                                    
                            <!-- Modal footer -->
                            <div class='modal-footer'>
                                <button type='button' <?= ($jml_pinjam >= 3) ? "disabled" : "" ?> class='btn btn-danger' id='pinjam' onclick='pinjam()'>Pinjam</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
                </div>
                    <div id="tampil-alert"></div>
                    
                    <?php endwhile ?>
                    
                </tbody>
            </table>
        </div>

        <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
        <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
        <script>
            function buku(id){
                $.ajax({
                    url:"../../../proses/ajax_p_buku.php?id="+id,
                    type:"get",
                    dataType:"JSON",
                    success:function(tampil){
                        document.getElementById('id_buku').value=tampil.id_buku;
                        document.getElementById('kd_buku').value=tampil.kd_buku;
                        document.getElementById('judul_buku').value=tampil.judul_buku;
                        document.getElementById('pengarang').value=tampil.pengarang;
                        document.getElementById('tahun_terbit').value=tampil.tahun_terbit;
                        var stok = tampil.stok;
                        if(stok <= 0){
                            alert('Stok Buku Habis')
                        }else{
                            $('#myModal').modal();
                        }
                    }
                });
            }

            function pinjam(){
                var id_buku = $('#id_buku').val();
                var nisku = $('#nis').val();
                $.ajax({
                    url : '../../../proses/proses.php?pinjamBuku',
                    type : 'POST',
                    data : {
                        id_buku: id_buku,
                        nisku: nisku
                    },
                   // dataType : 'JSON',
                    success : function(data){
                        $(function() {
                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000 
                        });

                        Toast.fire({
                            type: 'success',
                            title: 'Berhasil Pinjam Buku'
                        })
                    });
                        // location.reload();
                        // $("#tampil-alert").html(data.stok);
                        $('#myModal').modal('hide'); //menghilangkan modal
                        setInterval(function() {
                                location.reload();
                            }, 3250)
                    }
                })
            }

            $(document).ready( function () {
                $('#table_buku').DataTable();
            } );
        </script>


        <?php
        
            $tglPinjam = date_create(date('Y-m-d')); // waktu sekarang
            $tanggalPinjam = date('Y-m-d H:i:s');
            $tiga_hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
            $tglKembali = date_create(date('Y-m-d', $tiga_hari));
            $tanggalKembali = date('Y-m-d', $tiga_hari) . " " . date('H:i:s');
            $diff  = date_diff( $tglPinjam, $tglKembali );
            if($diff->d > 3 ){
                $diff->days;
                $denda = $diff->days . '000';
            }else{
                $diff->d;

                $denda = '0';
                $tglCoba = mysqli_query($koneksi, "SELECT * FROM tb_pinjam p RIGHT JOIN tb_kembali k ON p.id_buku = k.id_buku");
                $row = mysqli_fetch_array($tglCoba);
                 $satu = $row["tgl_kembali"];
                 "<br>";
                 $dua = $tanggalKembali = date('Y-m-d H:i:s', $tiga_hari);
                 "<br>";
                 $jml = (int) $dua - (int) $satu;

            }

// $tgl1 = $row["tgl_kembali"];
// $tanggal1 = new DateTime($tgl1);
// $tgl2 = new DateTime(date("Y-m-d H:i:s"));
// echo $tanggal2 = date_format($tgl2, 'Y-m-d H:i:s');
 
// $perbedaan = $tgl2->diff($tanggal1)->format("%a");
// echo "<br>";
// echo "==";
// echo $tgl1;
// echo "<br>";
// echo $perbedaan;
 
// echo "<br>";

// echo $denda = ($perbedaan-3)*1000;
$qLastIdPinjam = mysqli_query($koneksi, "SELECT *
FROM tb_pinjam
WHERE id_pinjam
IN
(
SELECT MAX(id_pinjam)
 FROM tb_pinjam
)");
$row=mysqli_fetch_array($qLastIdPinjam);
$row["id_pinjam"];

        ?>



<?php endif ?>
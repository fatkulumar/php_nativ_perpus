<?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>

<?php
    $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam p JOIN tb_buku b ON p.id_buku = b.id_buku");
    $qqPinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam");
    $cekPinjam = mysqli_fetch_array($qqPinjam);
    if($cekPinjam == null){
        $setAutoIncrementPinjam = mysqli_query($koneksi, "ALTER TABLE tb_pinjam AUTO_INCREMENT = 1");
    }

    $qqKembali = mysqli_query($koneksi, "SELECT * FROM tb_kembali");
    $cekKembali = mysqli_fetch_array($qqKembali);
    if($cekKembali == null){
        $setAutoIncrementKembali = mysqli_query($koneksi, "ALTER TABLE tb_kembali AUTO_INCREMENT = 1");
    }
?>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
   
    <div class="card">   
    <div class="card-header bg-primary mb-3">
        <div class="row">
            <div class="col-md-6">
                <h4 class="m-0 text-white">
                    Data Peminjaman & Pengembalian Buku
                </h4>
            </div>
            <div class="col-md-6">
                <h4 class="m-0 text-white float-right">
                    <a class="m-0 text-white" href="index.php?buku_belum_dikembalikan">Buku Belum Dikembalikan</a>
                </h4>
            </div>
            <!-- <div class="col-md-6">
                <form action="../../../proses/proses.php" method="post" class="float-right"> -->
                    <!-- <a class="btn btn-danger float-right btn-sm" href="index.php?tambahUsers">(+) Tambah User</a> -->
                    <!-- <div class="form-group row">
                        <div class="col-md-6">
                        <input style="float: right" type="text" name="search" class="" id="search" placeholder="Cari Peminjaman" autocomplete="off"></div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-sm mr-1" type="submit" name="pinjamReport">Laporan</button>
                    </div>
                </form>
            </div> -->
        </div>
    <!-- </div> -->

    <!-- <div class="card-header mb-3 bg-primary">
        <div style="position: relative;">
            <h3 class="m-0 text-white">
                <strong>Data Peminjaman & Pengembalian Buku</strong>
            </h3> -->
        </div>
    </div>

    
    
    <div style="margin-bottom: 10px">
        <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = p.nis"); 
        
            $nomor = 0;
            ?>
            <table id="myTable" style="text-align: center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Anggota</th>
                            <th>Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tanggal Pinjam</th>
                            <th>Harus Kembali</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th style="width: 200px">Aksi</th>
                            <!-- <th><input id="pilihsemua" onchange="checkAll(this)" name="chk[]" type="checkbox"></th> -->
                        </tr>
                    <thead>
                <tbody id="tampil">
                    <?php
                        while($data = mysqli_fetch_array($sql)) : 
                            $nomor++;
                        ?>
                        <tr>
                            <td><?= $nomor ?></td>
                            <td><?= $data["nis"] ?></td>
                            <td><?= $data["nama_anggota"] ?></td>
                            <td><?= $data["judul_buku"] ?></td>
                            <td><?= $data["pengarang"] ?></td>
                            <td><?= $data["penerbit"] ?></td>
                            <td><?= date('d F Y', strtotime($data["tgl_pinjam"])) ?></td>
                            <td><?= date('d F Y', strtotime($data["tgl_harus_kembali"])) ?></td>
                            <td>
                                <?php
                                    if($data["tgl_kembali"] == ""){
                                        echo "";
                                    }else{
                                        echo date('d F Y', strtotime($data["tgl_kembali"]));
                                    }
                                  
                                ?>
                            </td>
                            <td style="width: 160px">
                                <?php 
                                    $denda = $data["denda"];
                                    echo $denda;
                                    if($data["status_denda"] == 0 && $data["status"] == 2 && $denda > 0) : 
                                ?>
                                <div>
                                    <form action="../../../proses/proses.php" method="post">
                                        <input type="hidden" name="id_kembali" value="<?= $data["id_kembali"] ?>">
                                        <button class="btn btn-success" name="status_denda">Belum Lunas</button>
                                    </form>
                                </div>
                                <?php elseif($data["status_denda"] == 1 && $data["status"] == 2 && $denda > 0): ?>
                                <div>
                                        <button class="btn btn-success" disabled name="status_denda">Lunas</button>
                                </div>
                                <?php endif ?>
                            </td>
                            <!-- <td style="width: 170px"> -->
                            <td>
                                <?php
                                    if($data["status"] == 0):
                                ?>

                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Tidak Jadi Pinjam Buku?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?cancelPinjam=<?= $data["id_pinjam"] ?>">Cancel</a> 
                                   
                                        <form action="../../../proses/proses.php" method="GET">
                                            <input type="hidden" name="id_buku" id="" value="<?= $data["id_buku"] ?>">
                                            <input type="hidden" name="setujui" value="<?= $data['id_pinjam'] ?>">
                                            <button onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Setuju Peminjaman Buku?')" class="btn btn-success btn-sm" type="submit" name="setujuiPinjam">Setujui</button>
                                        </form>
                                    </div>

                                <?php
                                    elseif($data["status"] == 1):
                                ?>
                                    <form action="../../../proses/proses.php" method="GET">
                                        <input type="hidden" name="id_buku" id="" value="<?= $data["id_buku"] ?>">
                                        <input type="hidden" name="dikembalikan" value="<?= $data['id_pinjam'] ?>" >
                                        <button onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Mau Mengembalikan?')" class="btn btn-warning btn-sm" type="submit" name="dikembalikanPinjam">Belum Kembali</button>
                                    </form>
                                <?php
                                    elseif($data["status"] == 2):
                                ?>
                                    <button class="btn btn-primary btn-sm" disabled>Sudah Kembali</button>

                                <?php
                                    elseif($data["status"] == 3):
                                ?>
                                    <button class="btn btn-danger btn-sm" disabled>Cancel Peminjaman</button>
                                <?php
                                    endif
                                ?>
                            </td>
                            <!-- <td>
                                <input class="pilih" type="checkbox" name="chkbox[]" value="<?= $data["id_kembali"] ?>">
                            </td> -->
                        </tr>
                        <?php endwhile ?> 
                    </tbody>
                </table>
                </div>
                <?php 
                    if(isset($_SESSION["alert_status_denda"])){
                        $data_alert = "Denda Lunas";
                        require_once "../../../form/sweetalert/sweetalert.php";
                        unset($_SESSION["alert_status_denda"]);
                    }elseif(isset($_SESSION["alert_cancel_pinjam"])){
                        $data_alert = "Buku Batal Dipinjam";
                        require_once "../../../form/sweetalert/sweetalert.php";
                        unset($_SESSION["alert_cancel_pinjam"]);
                    }elseif(isset($_SESSION["alert_setujui_pinjam"])){
                        $data_alert = "Peminjaman Telah Disetujui Admin";
                        require_once "../../../form/sweetalert/sweetalert.php";
                        unset($_SESSION["alert_setujui_pinjam"]);
                    }elseif(isset($_SESSION["alert_kembali_pinjam"])){
                        $data_alert = "Buku Dikembalikan";
                        require_once "../../../form/sweetalert/sweetalert.php";
                        unset($_SESSION["alert_kembali_pinjam"]);
                    }
                ?>
                
                <script>
                    $(document).ready( function () {
                        $('#myTable').DataTable();
                    } );
                </script>
        
               
        <!-- <form style="float: right; margin-right: 15px" action="../../../proses/proses.php" method="POST">
            <input style="float: right" type="text" name="search" id="search" placeholder="Cari Peminjaman" autocomplete="off">
            <button class="btn btn-primary btn-sm mr-1" type="submit" name="pinjamReport">Laporan</button>
        </form> -->

    </div>
</div>

    

    <script>
        $(document).ready(function(){
            $('#search').keyup(function(){
                var search = $('#search').val()
                $.ajax({
                    type : 'POST',
                    url : '../../../proses/ajax_pinjam.php?search=' + search,
                    data : 'search=' + search,
                    success : function(data) {
                        $('#tampil').html(data)
                    }
                })
            })
        })

        function checkAll(ele) {
        var checkboxes = document.getElementsByTagName('input');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox' ) {
                    checkboxes[i].checked = true;
                    }
                }
            }else{
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == 'checkbox') {
                    checkboxes[i].checked = false;
                }
                }
            }
        }

    </script>

    

<?php else: ?>

    <?php
        $qqPinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam");
        $cekPinjam = mysqli_fetch_array($qqPinjam);
        if($cekPinjam == null){
            $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_pinjam AUTO_INCREMENT = 1");
        }
    ?>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->

        <!-- <script src="../jquery.js"></script> -->
    <!-- <script src="../datatables/media/js/dataTables.bootstrap4.min.js"></script> -->
    <!-- <link rel="stylesheet" href="../datatables/media/css/dataTables.bootstrap4.min.css"> -->

        <!-- <script src="../jquery.js"></script> -->

        <div class="card-header bg-primary mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Pinjam & Kembali</strong>
                    </h1>
                </div>
            </div><!-- /.row -->
        </div> 

            <table id="myTable" class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Harus Kembali</th>
                        <th>Tanggal Kembali</th>
                        <th>Denda</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sessionNis = $_SESSION["nis"];
                        $no = 0;
                        $qryPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku WHERE p.nis = '$sessionNis'");
                        while($rPinjamBuku = mysqli_fetch_array($qryPinjam)) :
                            $no++;
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $rPinjamBuku["judul_buku"] ?></td>
                        <td><?= date('d F Y', strtotime($rPinjamBuku["tgl_pinjam"])) ?></td>
                        <td><?= date('d F Y', strtotime($rPinjamBuku["tgl_harus_kembali"])) ?></td>
                        <td>
                            <?php 
                                    if($rPinjamBuku["tgl_kembali"] == ""){
                                        echo "";
                                    }else{
                                        echo date('d F Y', strtotime($rPinjamBuku["tgl_kembali"]));
                                    } 
                                ?>    
                            </td>
                            <td style=text-align:center>Rp.
                        <?php echo $denda = $rPinjamBuku["denda"];  
                            if($rPinjamBuku["status_denda"] == 0 && $rPinjamBuku["status"] == 2 && $denda > 0){ 
                                echo "<br>";
                                echo "Belum Lunas";
                            }elseif($rPinjamBuku["status_denda"] == 1 && $rPinjamBuku["status"] == 2 && $denda > 0){
                                echo "<br>";
                                echo "Lunas";
                            } ?>
                        </td>

                        <td>
                            
                            <?php if($rPinjamBuku["status"] == 0 ): ?>
                                <button class="btn btn-danger" disabled>
                                    Pending
                                </button>
                            <?php elseif($rPinjamBuku["status"] == 1 ): ?>
                                <button class="btn btn-success" disabled>
                                    Belum Kembali
                                </button>
                            <?php elseif($rPinjamBuku["status"] == 2 ): ?>
                                <button class="btn btn-primary" disabled>
                                    Sudah Kembali
                                </button>
                            <?php elseif($rPinjamBuku["status"] == 3 ): ?>
                                <button class="btn btn-warning" disabled>
                                    Cancel Peminjaman
                                </button>
                            <?php endif ?>
                        </td>
                    </tr>

                    <!-- ==================================================modal============================================== -->
                    <input class="form-control" type="hidden" name="id_buku" id="id_buku<?= $rPinjamBuku["id_buku"] ?>" value="<?= $rPinjamBuku["id_buku"] ?>" readonly>
                    <input class="form-control" type="hidden" name="judul_buku" id="judul_buku<?= $rPinjamBuku["id_buku"] ?>" value="<?= $rPinjamBuku["judul_buku"] ?>" readonly>
                    <input class="form-control" type="hidden" name="pengarang" id="pengarang<?= $rPinjamBuku["id_buku"] ?>" value="<?= $rPinjamBuku["pengarang"] ?>" readonly>
                    <input class="form-control" type="hidden" name="tahun_terbit" id="tahun_terbit<?= $rPinjamBuku["id_buku"] ?>" value="<?= $rPinjamBuku["tahun_terbit"] ?>" readonly>

                    <div id="tampil-modal"></div>
                    
                    <script type="text/javascript">
                        $(document).ready(function(){

                            $('#testModal<?= $rPinjamBuku["id_buku"] ?>').on('click', function (event) {
                                event.preventDefault();
                                var id = $("#id_buku<?= $rPinjamBuku["id_buku"] ?>").attr("value");
                                var judul_buku = $("#judul_buku<?= $rPinjamBuku["id_buku"] ?>").attr("value");
                                var pengarang = $("#pengarang<?= $rPinjamBuku["id_buku"] ?>").attr("value");
                                var tahun_terbit = $("#tahun_terbit<?= $rPinjamBuku["id_buku"] ?>").attr("value");
                                $.ajax({
                                    type : 'get',
                                    url : '../../../proses/proses.php?pinjamBukuId',
                                    data :  {id : id, judul_buku : judul_buku, tahun_terbit : tahun_terbit, pengarang : pengarang},
                                    success : function(data){
                                        $('#tampil-modal').html(data);//menampilkan data ke dalam modal
                                        $('#myModal').modal();
                                    }
                                });
                            });

                        });
                            
                    </script>
    <!-- =========================================/modal============================================== -->

                    <?php endwhile ?>
                </tbody>
            </table>

            <?php      
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku");
            ?>
        </div>

        <script>
            $(document).ready( function () {
                $('#myTable').DataTable();
            } );
        </script>
        
<?php endif ?>


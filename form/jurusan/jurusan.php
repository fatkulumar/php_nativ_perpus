<?php
    $qJurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
    $qqJurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
    $cekJurusan = mysqli_fetch_array($qqJurusan);
    if($cekJurusan == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_jurusan AUTO_INCREMENT = 1");
    }
?>

    <?php 
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");  
    ?>
    
   
<div class="card">  
    <div class="card-header bg-primary mb-3">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Data Jurusan</strong>
            </h3>
        </div>
        <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?tambahJurusan">(+) Tambah Jurusan</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rJurusan = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rJurusan["nama_jurusan"] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Hapus Jurusan?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?hapusJurusan=<?= $rJurusan["id_jurusan"] ?>">Hapus</a><a class="btn btn-success btn-sm" href="index.php?editJurusan=<?= $rJurusan["id_jurusan"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
 </div>

    </div>

    <?php 
        if(isset($_SESSION["alert_tambah_jurusan"])){
            $data_alert = "Data Jurusan Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_jurusan"]);
        }elseif(isset($_SESSION["alert_hapus_jurusan"])){
            $data_alert = "Data Jurusan Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_jurusan"]);
        }elseif(isset($_SESSION["alert_edit_jurusan"])){
            $data_alert = "Data Jurusan Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_jurusan"]);
        }
    ?>
    

    <script>
        $(document).ready( function () {
                $('.table').DataTable();
        });
    </script>
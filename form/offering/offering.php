<?php
    $qOffering = mysqli_query($koneksi, "SELECT * FROM tb_offering");
    $qqOffering = mysqli_query($koneksi, "SELECT * FROM tb_offering");
    $cekOffering = mysqli_fetch_array($qqOffering);
    if($cekOffering == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_offering AUTO_INCREMENT = 1");
    }
?>

    <?php         
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_offering");
    ?>

   <div class="card">    

    <div class="card-header bg-primary mb-3">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Data Offering</strong>
            </h3>
        </div>
        <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?tambahOffering">(+) Tambah Offering</a>
            </div>
        </div>

        <table id="table_offering" class="table table-striped mb-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Offering</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rOffering = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rOffering["offering"] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Hapus Offering?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?hapusOffering=<?= $rOffering["id_offering"] ?>">Hapus</a><a class="btn btn-success btn-sm" href="index.php?editOffering=<?= $rOffering["id_offering"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>

        </div>
    </div>

    <?php 
        if(isset($_SESSION["alert_tambah_offering"])){
            $data_alert = "Data Offering Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_offering"]);
        }elseif(isset($_SESSION["alert_hapus_offering"])){
            $data_alert = "Data Offering Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_offering"]);
        }elseif(isset($_SESSION["alert_edit_offering"])){
            $data_alert = "Data Offering Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_offering"]);
        }
    ?>

    <script>
         $(document).ready( function () {
                $('#table_offering').DataTable();
        });
    </script>
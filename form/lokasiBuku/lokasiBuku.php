<?php
    $qLokasiBuku = mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku");
    $qqLokasiBuku = mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku");
    $cekLokasiBuku = mysqli_fetch_array($qqLokasiBuku);
    if($cekLokasiBuku == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_Lokasi_buku AUTO_INCREMENT = 1");
    }
?>

            <?php          
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku"); 
            ?>

    <div class="card">   

    <div class="card-header bg-primary mb-3">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Data Lokasi Buku</strong>
            </h3>
        </div>
        <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?tambahLokasiBuku">(+) Tambah Lokasi Buku</a>
            </div>
        </div>

    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Lokasi Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rLokasiBuku = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rLokasiBuku["lokasi_buku"] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Hapus Lokasi Buku?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?hapusLokasiBuku=<?= $rLokasiBuku["id_lokasi_buku"] ?>">Hapus</a>  <a class="btn btn-success btn-sm" href="index.php?editLokasiBuku=<?= $rLokasiBuku["id_lokasi_buku"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>

        </div>

    </div>

    <?php 
        if(isset($_SESSION["alert_tambah_lokasiBuku"])){
            $data_alert = "Data Lokasi Buku Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_lokasiBuku"]);
        }elseif(isset($_SESSION["alert_hapus_lokasiBuku"])){
            $data_alert = "Data Lokasi Buku Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_lokasiBuku"]);
        }elseif(isset($_SESSION["alert_edit_lokasiBuku"])){
            $data_alert = "Data Lokasi Buku Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_lokasiBuku"]);
        }
    ?>

    <script>
        $(document).ready( function () {
                $('.table').DataTable();
        });
    </script>
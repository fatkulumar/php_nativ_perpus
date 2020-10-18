<?php
    // $qAnggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota a LEFT JOIN tb_kelas k ON a.id_kelas = k.id_kelas LEFT JOIN tb_offering o ON a.id_offering = o.id_offering LEFT JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan ORDER BY nis DESC");
    $qqAnggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
    $cekAnggota = mysqli_fetch_array($qqAnggota);
    if($cekAnggota == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_anggota AUTO_INCREMENT = 1");
    }
?>

    
    <?php         
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_anggota a LEFT JOIN tb_kelas k ON a.id_kelas = k.id_kelas LEFT JOIN tb_offering o ON a.id_offering = o.id_offering LEFT JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan"); 
    ?>

  

    <div class="card-header bg-primary mb-3">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Data Anggota</strong>
            </h3>
        </div>
        <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?tambahAnggota">(+) Tambah Anggota</a>
            </div>
        </div>
    
        <table id="table_anggota" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Anggota</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Offering</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rAnggota = mysqli_fetch_array($sql)) :
                        $no++;
                        if($no == 1){
                            continue;
                        }
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rAnggota["nis"] ?></td>
                    <td><?= $rAnggota["nama_anggota"] ?></td>
                    <td><?= $rAnggota["kelas"] ?></td>
                    <td><?= $rAnggota["nama_jurusan"] ?></td>
                    <td><?= $rAnggota["offering"] ?></td>
                    <td><?= $rAnggota["alamat"] ?></td>
                    <td><div class="btn-group" role="group" aria-label="Basic example">
                        <a onclick="return confirm('Yakin Hapus Anggota?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?hapusAnggota=<?= $rAnggota["nis"] ?>">Hapus</a>  <a class="btn btn-success btn-sm" href="index.php?editAnggota=<?= $rAnggota["nis"] ?>">Edit</a></div>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>    
    </div>
    
    <?php 
        if(isset($_SESSION["alert_tambah_anggota"])){
            $data_alert = "Data Anggota Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_anggota"]);
        }elseif(isset($_SESSION["alert_hapus_anggota"])){
            $data_alert = "Data Anggota Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_anggota"]);
        }elseif(isset($_SESSION["alert_edit_anggota"])){
            $data_alert = "Data Anggota Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_anggota"]);
        }
    ?>

    <script>
         $(document).ready( function () {
            $('#table_anggota').DataTable();
        });
    </script>
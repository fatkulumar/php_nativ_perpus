<?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
    <div class="card-header bg-primary mb-3">
        <div class="row">
            <div class="col-md-12"> 
                <div style="position: absolute;">  
                    <h3 class="m-0 text-white">
                        <strong>Data Profil</strong>
                    </h3>
                </div>
                <div style="position: relative;">
                    <a class="btn btn-danger float-right btn-sm" href="../../../proses/proses.php?editProfil=<?= $_SESSION['nis'] ?>">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_SESSION["alert_profil"])){
            $data_alert = "Profil Di rubah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_profil"]);
        }
    ?>
      
        <table id="table_profil" class="table table-bordered table-striped">
            <thead>
                <tr style="text-align: center;">
                    <td>No</td>
                    <td>NIS</td>
                    <td>Nama</td>
                    <td>Jurusan</td>
                    <td>Kelas</td>
                    <td>Offering</td>
                    <td>Alamat</td>
                    <td>Foto</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(isset($_GET["profil"])){
                        $nis = $_SESSION['nis'];
                        $profil = mysqli_query($koneksi, "SELECT * FROM tb_anggota a LEFT JOIN tb_jurusan j ON a.id_jurusan = j.id_jurusan LEFT JOIN tb_kelas k ON k.id_kelas = a.id_kelas LEFT JOIN tb_offering o ON o.id_offering = a.id_offering LEFT JOIN tb_user u ON u.nis = a.nis");
                        $no = 0;
                        while($row = mysqli_fetch_array($profil)):
                        $no++;
                        if($no == 1){continue;}
                ?>
                <tr style="text-align: center;">
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $no ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["nis"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["nama_anggota"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["nama_jurusan"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["kelas"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["offering"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><?= $row["alamat"] ?></td>
                    <td style="color :<?php if($row['status'] == "0" || $row['status'] == "1"){echo 'red';} ?>"><img width="80px" src="<?= '../../../proses/file/' . $row['foto'] ?>" alt="foto"></td>
                </tr>
                <?php endwhile ?>
                <?php } ?>
            </tbody>

        </table>

        <script>
            $(document).ready( function () {
                $('#table_profil').DataTable();
            } );
        </script>

<?php else: ?>

    <div class="card-header bg-primary">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Profil</strong>
            </h3>
        </div>
        <div style="position: relative;">
            <a class="btn btn-danger float-right btn-sm" href="../../../proses/proses.php?editProfil=<?= $_SESSION['nis'] ?>">Edit</a>
        </div>
    </div>
        
        <div class="card">
            <div class="card-body">
                <?php
            if(isset($_GET["profil"])){
                    $nis = $_SESSION['nis'];
                    $select = mysqli_query($koneksi, "SELECT * FROM tb_anggota a LEFT JOIN tb_jurusan j ON a.id_jurusan = j.id_jurusan LEFT JOIN tb_kelas k ON k.id_kelas = a.id_kelas LEFT JOIN tb_offering o ON o.id_offering = a.id_offering WHERE a.nis = '$nis'");
                    $no = 0;
                    while($row = mysqli_fetch_array($select)):
                        $no++;
                        ?>
        <div class="row">
            <div class="col-md-6"> 
                <img class="card-img-top" src="../../../proses/file/<?= $row["foto"] ?>" class="elevation-2" alt="User Image"></div>
            <tr>
                <div class="col-md-6"><table class="table table-bordered"> <tr>
                <td>NIS</td>
                <td><?= $row["nis"]?></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><?= $row["nama_anggota"]?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?= $row["nama_jurusan"]?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td><?= $row["kelas"]?></td>
            </tr>
            <tr>
                <td>Offering</td>
                <td><?= $row["offering"]?></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td><?= $row["alamat"]?></td>
            </tr>
        </table>
    </div>
        <!-- <a class="btn btn-primary mt-5" href="../../../proses/proses.php?editProfil=<?= $row["nis"] ?>">Edit</a> -->
            </div>
            <?php endwhile ?>
            <?php } ?>
            </div>

    </div>
<?php endif ?>
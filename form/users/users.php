<?php
    $qUser = mysqli_query($koneksi, "SELECT * FROM tb_user");
    $cekUsers = mysqli_fetch_array($qUser);
    if($cekUsers == null){
        $_SESSION["username"] = "";
        unset($_SESSION["username"]);
        session_unset();
        session_destroy();
        echo "
                <script>
                    alert('Database Kosong');
                    window.location='../../../index.php';
                </script>
            ";
    }
?>

    <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_user u LEFT JOIN tb_anggota a ON u.nis = a.nis JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON o.id_offering = a.id_offering JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan");  
    ?>


    <div class="card">   
    <div class="card-header bg-primary mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="m-0 text-white">
                    <strong>Data Users</strong>
                </h1>
            </div>
            <div class="col-md-6">
                <form action="../../../proses/proses.php" method="post" class="float-right">
                    <a class="btn btn-danger float-right btn-sm" href="index.php?tambahUsers">(+) Tambah User</a>
                    <div class="form-group row">
                        <div class="col-md-6">
                        <input  type="text" name="search_users" class="form-control" id="search_users" placeholder="Cari User" autocomplete="off"></div>
                    <div class="col-md-6">
                        <button class="btn btn-success btn-sm" type="submit" name="usersReport">Laporan Users</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>


   
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Offering</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tampil">
                <?php
                    $no = 0;
                    while($rUser = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rUser["username"] ?></td>
                    <td><?= $rUser["nama_anggota"] ?></td>
                    <td><?= $rUser["kelas"] ?></td>
                    <td><?= $rUser["nama_jurusan"] ?></td>
                    <td><?= $rUser["offering"] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Hapus User?')" class="btn btn-danger" href="../../../proses/proses.php?hapusUsers=<?= $rUser["id_user"] ?>">Hapus</a><a class="btn btn-success" href="index.php?editUsers=<?= $rUser["id_user"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        </div>
    </div>

    <?php 
        if(isset($_SESSION["alert_tambah_user"])){
            $data_alert = "Data User Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_user"]);
        }elseif(isset($_SESSION["alert_hapus_user"])){
            $data_alert = "Data User Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_user"]);
        }elseif(isset($_SESSION["alert_edit_user"])){
            $data_alert = "Data User Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_user"]);
        }
    ?>

    <script>
        $(document).ready(function(){
        $('#search_users').keyup(function(){
            var search = $('#search_users').val()
            $.ajax({
                type : 'POST',
                url : '../../../proses/ajax_users.php?search_users=' + search,
                data : 'search_users=' + search, 
                success : function(data) {
                    $('#tampil').html(data)
                }
            })
        })
        });

        

    </script>

    <script>
        $(document).ready( function () {
                $('#myTable').DataTable();
        });
    </script>
<?php
    $qKelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
    $qqKelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
    $cekKelas = mysqli_fetch_array($qqKelas);
    if($cekKelas == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_kelas AUTO_INCREMENT = 1");
    }
?>

<?php
        $page = (isset($_GET['pageKelas']))? $_GET['pageKelas'] : 1; // Cek apakah terdapat data page pada URL
        $limit = 10; // Jumlah data per halamannya
        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database      
        $limit_start = ($page - 1) * $limit;
        // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan          
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_kelas LIMIT ".$limit_start.",".$limit);  
        $no = $limit_start + 1; // Untuk penomoran tabel
    ?>

    

  <div class="card"> 


    <div class="card-header bg-primary mb-3">
        <div style="position: absolute;">  
            <h3 class="m-0 text-white">
                <strong>Data Kelas</strong>
            </h3>
        </div>
        <div style="position: relative;">
                <a class="btn btn-danger float-right btn-sm" href="index.php?tambahKelas">(+) Tambah Anggota</a>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rKelas = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rKelas["kelas"] ?></td>
                    <td>
                        <a onclick="return confirm('Yakin Hapus Kelas?')" class="btn btn-danger btn-sm  " href="../../../proses/proses.php?hapusKelas=<?= $rKelas["id_kelas"] ?>">Hapus</a> | <a class="btn btn-success btn-sm" href="index.php?editKelas=<?= $rKelas["id_kelas"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>

        </div>

        <ul class="pagination" <?php if($cekKelas == null){ echo "style='display:none'";} ?>>
            <?php        
                if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV        
            ?>

                <li class="disabled" style="display: none">
                    <a href="#">First</a>
                </li>      

                <li class="disabled" style="display: none">
                    <a href="#">&laquo;</a></li>        
                    <?php        
                        }else{ // Jika page bukan page ke 1          
                            $link_prev = ($page > 1) ? $page - 1 : 1;        
                    ?>
                <li>
                    <a class="page-link" href="index.php?pageKelas=1">First</a></li>
                        <li><a class="page-link" href="index.php?pageKelas=<?php echo $link_prev; ?>">&laquo;</a></li>  
                    <?php    
                        }        
                    ?>

                <?php        
                    // Buat query untuk menghitung semua jumlah data        
                    $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tb_kelas");   
                    // $get_jumlah = $sql2->fetch();                
                    // $get_jumlah = mysqli_num_rows($sql2);      

                    $sql    ="SELECT * FROM tb_kelas";
                    $query    =mysqli_query($koneksi, $sql);
                    $data    =array();
                    while(($row    =mysqli_fetch_array($query)) != null){
                        $data[] =$row;
                    }
                    $count    =count($data);
                    // echo "Jumlah data dari array PHP: $count";

                    $jumlah_page = ceil($count / $limit); // Hitung jumlah halamannya        
                    $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif        
                    $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; 
                    // Untuk awal link number        
                    $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number                
                    for($i = $start_number; $i <= $end_number; $i++){          
                        $link_active = ($page == $i)? ' class="page-link active"' : '';        ?>          
                        <!-- <li<?php echo $link_active; ?>><a class="page-link" href="index.php?pageKelas=<?php echo $i; ?>"> -->
                        <!-- <?php echo $i; ?></a></li>         -->
                        <?php        
                            }        
                ?>                
        <!-- LINK NEXT AND LAST -->        
        <?php        
        // Jika page sama dengan jumlah page, maka disable link NEXT nya        
        // Artinya page tersebut adalah page terakhir         
        if($page == $jumlah_page){ // Jika page terakhir        
        ?>          
        <li class="disabled" style="display: none">
            <a href="#">&raquo;</a></li>          
            <li class="disabled" style="display: none"><a href="#">Last</a></li>        
                <?php        
                    }else{ // Jika Bukan page terakhir          
                        $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;        
                    ?>          
                        <li>
                            <!-- <a class="page-link" href="index.php?pageKelas=<?php echo $link_next; ?>">&raquo;</a></li> -->
                                <!-- <li><a class="page-link" href="index.php?pageKelas=<?php echo $jumlah_page; ?>">Last</a></li>         -->
                <?php        
                    }        
                ?>      
            </ul>

    </div>

    <script>
        $(document).ready( function () {
                $('.table').DataTable();
        });
    </script>

    <?php 
        if(isset($_SESSION["alert_tambah_kelas"])){
            $data_alert = "Data Kelas Berhasil Ditambah";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_tambah_kelas"]);
        }elseif(isset($_SESSION["alert_hapus_kelas"])){
            $data_alert = "Data Kelas Berhasil Dihapus";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_hapus_kelas"]);
        }elseif(isset($_SESSION["alert_edit_kelas"])){
            $data_alert = "Data Kelas Berhasil Diedit";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_edit_kelas"]);
        }
    ?>
<?php
    $qBuku = mysqli_query($koneksi, "SELECT * FROM tb_petugas");
    $qqPetugas = mysqli_query($koneksi, "SELECT * FROM tb_petugas");
    $cekPetugas = mysqli_fetch_array($qqPetugas);
    if($cekPetugas == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_petugas AUTO_INCREMENT = 1");
    }
?>

<?php
        $page = (isset($_GET['pagePetugas']))? $_GET['pagePetugas'] : 1; // Cek apakah terdapat data page pada URL
        $limit = 2; // Jumlah data per halamannya
        // Untuk menentukan dari data ke berapa yang akan ditampilkan pada tabel yang ada di database      
        $limit_start = ($page - 1) * $limit;
        // Buat query untuk menampilkan data siswa sesuai limit yang ditentukan          
        $sql = mysqli_query($koneksi, "SELECT * FROM tb_petugas LIMIT ".$limit_start.",".$limit);  
        $no = $limit_start + 1; // Untuk penomoran tabel
    ?>

    <div class="container">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Petugas</strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div>
        <a class="btn btn-danger" href="index.php?tambahPetugas">(+) Tambah Petugas</a>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Petugas</th>
                    <th>Jenjang</th>
                    <th>Alamat</th>
                    <th>Telphone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rBuku = mysqli_fetch_array($sql)) :
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rBuku["nama_petugas"] ?></td>
                    <td><?= $rBuku["jenkel"] ?></td>
                    <td><?= $rBuku["alamat"] ?></td>
                    <td><?= $rBuku["telp"] ?></td>
                    <td>
                        <a class="btn btn-danger" href="../../../proses/proses.php?hapusPetugas=<?= $rBuku["id_petugas"] ?>">Hapus</a> | <a class="btn btn-success" href="index.php?editPetugas=<?= $rBuku["id_petugas"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>

        

        <ul class="pagination" <?php if($cekPetugas == null){ echo "style='display:none'";} ?>>
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
                    <a class="page-link" href="index.php?pagePetugas=1">First</a></li>
                        <li><a class="page-link" href="index.php?pagePetugas=<?php echo $link_prev; ?>">&laquo;</a></li>  
                    <?php    
                        }        
                    ?>

                <?php        
                    // Buat query untuk menghitung semua jumlah data        
                    $sql2 = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM tb_petugas");   
                    // $get_jumlah = $sql2->fetch();                
                    // $get_jumlah = mysqli_num_rows($sql2);      

                    $sql    ="SELECT * FROM tb_petugas";
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
                        <li<?php echo $link_active; ?>><a class="page-link" href="index.php?pagePetugas=<?php echo $i; ?>">
                        <?php echo $i; ?></a></li>        
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
                            <a class="page-link" href="index.php?pagePetugas=<?php echo $link_next; ?>">&raquo;</a></li>
                                <li><a class="page-link" href="index.php?pagePetugas=<?php echo $jumlah_page; ?>">Last</a></li>        
                <?php        
                    }        
                ?>      
            </ul>

    </div>
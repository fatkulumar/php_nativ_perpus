<?php

    include "../koneksi/koneksi.php";
    if(isset($_GET["search_sedia"])){
        $search = $_GET["search_sedia"];
        if($search == ""){
            exit();
        }
        elseif($search != "") {
            $sql_search = mysqli_query($koneksi, "SELECT judul_buku, tgl_kembali,stok FROM tb_buku b LEFT JOIN tb_kembali k ON b.id_buku = k.id_buku WHERE judul_buku LIKE '%".$search."%' GROUP BY b.id_buku ORDER BY judul_buku"); 
            // mysqli_query($koneksi, "SELECT * FROM tb_kembali");
        }

        $jmlBuku = mysqli_num_rows($sql_search);
        if($jmlBuku < 1){
            echo "
            <div class='form-group'>
                <input style='background-color: red; color: white' class='form-control' type='text' name=' id=' value='Buku Kosong'
            </div>
            ";
        }
        while($data = mysqli_fetch_array($sql_search)):
         
?>


    <?php
        $stok = $data["stok"];

        $judul_buku = $data["judul_buku"];
    
        $tanggalKembali = $data["tgl_kembali"];
        // date($tanggalKembali, strtotime('+6 days', $tanggalKembali));
        $time = strtotime("$tanggalKembali");
 
        $newformat = date('Y-m-d',$time);
        // $tgl1 = "$tanggalKembali";// pendefinisian tanggal awal
        $tgl2 = date('Y-m-d', strtotime('+2 days', strtotime($newformat))); //operasi penjumlahan tanggal sebanyak 6 hari
        "Tersedia Pada Tanggal : " . $tgl2; //print tanggal

        if($judul_buku == "") {
            echo "<div><input class='form-control' type='text' name=' id=' value='Buku Kosong'></div>";
        }
    
    ?>
    <div>
        <input class="form-control" type="text" name="" id="" value="<?= "Buku " . $judul_buku; if($tanggalKembali == "" AND $stok > 0){ echo " Masih Tersedia ". $stok . " Buku";}elseif($tanggalKembali != "" AND $stok == 0){echo " Tersedia Pada Tanggal " . $tgl2;} ?>">
    </div>

    
    <!-- <script>
        alert("umar")
    </script> -->

    <?php endwhile ?>
    <?php } ?>
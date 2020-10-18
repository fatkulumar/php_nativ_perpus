<?php 

    session_start();
    include "../koneksi/koneksi.php";
    if(isset($_POST["search_buku"])){
        // echo json_encode("umar");
        $search = $_POST["search_buku"];
        if($search == ""){
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_buku b JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku LIMIT 0,10"); 
        }else{
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_buku b JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku WHERE judul_buku LIKE '%".$search."%' OR penerbit LIKE '%".$search."%' OR pengarang LIKE '%".$search."%' OR kd_buku LIKE '%".$search."%'");
        }
        $nomor = 0;
        while($data = mysqli_fetch_array($sql_search)){
        $nomor++
        ?>
        
            <table class="table table-striped">
            <tbody>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $data["kd_buku"] ?></td>
                    <td><?= $data["judul_buku"] ?></td>
                    <td><?= $data["pengarang"] ?></td>
                    <td><?= $data["penerbit"] ?></td>
                    <td><?= date("d F Y", strtotime($data["tahun_terbit"])) ?></td>
                    <td><?= $data["stok"] ?></td>
                    <td><?= $data["lokasi_buku"] ?></td>
                    <?php if($_SESSION["cekStatus"] == 0 || $_SESSION["cekStatus"] == 1): ?>
                    <td>
                        <a class="btn btn-danger" href="../../../proses/proses.php?hapusBuku=<?= $data["id_buku"] ?>">Hapus</a> | <a class="btn btn-success" href="index.php?editBuku=<?= $data["id_buku"] ?>">Edit</a>
                    </td>
                    <?php endif ?>
                </tr>
                    </tbody>
            </table>

        <?php } ?>
        <?php } ?>
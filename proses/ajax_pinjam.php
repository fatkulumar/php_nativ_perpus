<?php 

    include "../koneksi/koneksi.php";
    if(isset($_POST["search"])){
        // echo json_encode("umar");
        $search = $_POST["search"];
        if($search == ""){
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = p.nis LIMIT 0,10"); 
            // mysqli_fetch_array($sql_search); 
        }else{
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = p.nis WHERE nama_anggota LIKE '%".$search."%' OR penerbit LIKE '%".$search."%' OR judul_buku LIKE '%".$search."%' OR pengarang LIKE '%".$search."%' OR a.nis LIKE '%".$search."%'");
        }
        $nomor = 0;
        while($data = mysqli_fetch_array($sql_search)){
        $nomor++
        ?>
        
            <table class="table table-striped">
            <tbody>
                <tr>
                    <td><?= $nomor ?></td>
                    <td><?= $data["nis"] ?></td>
                    <td><?= $data["nama_anggota"] ?></td>
                    <td><?= $data["pengarang"] ?></td>
                    <td><?= $data["penerbit"] ?></td>
                    <td><?= $data["judul_buku"] ?></td>
                    <td><?= $data["tgl_pinjam"] ?></td>
                    <td><?= $data["tgl_kembali"] ?></td>
                    <td><?= $data["denda"] ?></td>
                    <td>
                        <?php
                            if($data["status"] == 0):
                        ?>
                            <a class="btn btn-danger" href="../../../proses/proses.php?cancelPinjam=<?= $data["id_pinjam"] ?>">Cancel</a> | <a class="btn btn-success" href="../../../proses/proses.php?setujuiPinjam=<?= $data["id_pinjam"] ?>">Setujui</a> 
                        <?php
                            elseif($data["status"] == 1):
                        ?>
                            <a class="btn btn-warning" href="../../../proses/proses.php?dikembalikanPinjam=<?= $data["id_pinjam"] ?>">Belum Kembali</a>
                        <?php
                            else:
                        ?>
                            <button class="btn btn-primary" disabled>Kembali</button>
                        <?php
                            endif
                        ?>
                    </td>
                </tr>
            </tbody>
            </table>

        <?php } ?>
        <?php } ?>
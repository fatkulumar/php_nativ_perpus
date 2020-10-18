<?php 

    include "../koneksi/koneksi.php";
    if(isset($_POST["search_users"])){
        // echo json_encode("umar");
        $search = $_POST["search_users"];
        if($search == ""){
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON o.id_offering = a.id_offering JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan LIMIT 0,10"); 
        }else{
            $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON o.id_offering = a.id_offering JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan  WHERE username LIKE '%".$search."%' OR nama_anggota LIKE '%".$search."%'");
        }
        $nomor = 0;
        while($data = mysqli_fetch_array($sql_search)){
        $nomor++
        ?>
            <tr>
                <td><?= $nomor ?></td>
                <td><?= $data["username"] ?></td>
                <td><?= $data["nama_anggota"] ?></td>
                <td><?= $data["kelas"] ?></td>
                <td><?= $data["nama_jurusan"] ?></td>
                <td><?= $data["offering"] ?></td>
                <td>
                    <a class="btn btn-danger" href="../../../proses/proses.php?hapusUsers=<?= $rUser["id_user"] ?>">Hapus</a> | <a class="btn btn-success" href="index.php?editUsers=<?= $rUser["id_user"] ?>">Edit</a>
                </td>
            </tr>

        <?php } ?>
    <?php } ?>
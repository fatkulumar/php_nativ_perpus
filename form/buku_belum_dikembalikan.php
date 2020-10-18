    <div class="card">   
        <div class="card-header bg-primary mb-3">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="m-0 text-white">
                        <strong>Data Buku Belum Kembali</strong>
                    </h1>
                </div>
            </div>
        </div>

        <table id="myTable" style="text-align: center" class='table table-striped'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Anggota</th>
                            <th>Buku</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tanggal Pinjam</th>
                            <th>Harus Kembali</th>
                            <th>Tanggal Kembali</th>
                            <th>Denda</th>
                            <th style="width: 200px">Aksi</th>
                            <!-- <th><input id="pilihsemua" onchange="checkAll(this)" name="chk[]" type="checkbox"></th> -->
                        </tr>
                    <thead>
                    <tbody id="tampil">
                        <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = p.nis WHERE p.status = 1");
                                $nomor = 0;
                            while($data = mysqli_fetch_array($sql)) : 
                                $nomor++;
                            ?>
                            <tr>
                                <td><?= $nomor ?></td>
                                <td><?= $data["nis"] ?></td>
                                <td><?= $data["nama_anggota"] ?></td>
                                <td><?= $data["judul_buku"] ?></td>
                                <td><?= $data["pengarang"] ?></td>
                                <td><?= $data["penerbit"] ?></td>
                                <td><?= date('d F Y', strtotime($data["tgl_pinjam"])) ?></td>
                                <td><?= date('d F Y', strtotime($data["tgl_harus_kembali"])) ?></td>
                                <td>
                                    <?php
                                        if($data["tgl_kembali"] == ""){
                                            echo "";
                                        }else{
                                            echo date('d F Y', strtotime($data["tgl_kembali"]));
                                        }
                                    
                                    ?>
                                </td>
                                <td style="width: 160px">
                                    <?php 
                                        $denda = $data["denda"];
                                        echo $denda;
                                        if($data["status_denda"] == 0 && $data["status"] == 2 && $denda > 0) : 
                                    ?>
                                    <div>
                                        <form action="../../../proses/proses.php" method="post">
                                            <input type="hidden" name="id_kembali" value="<?= $data["id_kembali"] ?>">
                                            <button class="btn btn-success" name="status_denda">Belum Lunas</button>
                                        </form>
                                    </div>
                                    <?php elseif($data["status_denda"] == 1 && $data["status"] == 2 && $denda > 0): ?>
                                    <div>
                                            <button class="btn btn-success" disabled name="status_denda">Lunas</button>
                                    </div>
                                    <?php endif ?>
                                </td>
                                <!-- <td style="width: 170px"> -->
                                <td>
                                    <?php
                                        if($data["status"] == 0):
                                    ?>

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Tidak Jadi Pinjam Buku?')" class="btn btn-danger btn-sm" href="../../../proses/proses.php?cancelPinjam=<?= $data["id_pinjam"] ?>">Cancel</a> 
                                    
                                            <form action="../../../proses/proses.php" method="GET">
                                                <input type="hidden" name="id_buku" id="" value="<?= $data["id_buku"] ?>">
                                                <input type="hidden" name="setujui" value="<?= $data['id_pinjam'] ?>">
                                                <button onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Setuju Peminjaman Buku?')" class="btn btn-success btn-sm" type="submit" name="setujuiPinjam">Setujui</button>
                                            </form>
                                        </div>

                                    <?php
                                        elseif($data["status"] == 1):
                                    ?>
                                        <form action="../../../proses/proses.php" method="GET">
                                            <input type="hidden" name="id_buku" id="" value="<?= $data["id_buku"] ?>">
                                            <input type="hidden" name="dikembalikan" value="<?= $data['id_pinjam'] ?>" >
                                            <button onclick="return confirm('<?= $data['nama_anggota']; echo ' NIS '; echo $data['nis']?> Apakah Mau Mengembalikan?')" class="btn btn-warning btn-sm" type="submit" name="dikembalikanPinjam">Belum Kembali</button>
                                        </form>
                                    <?php
                                        elseif($data["status"] == 2):
                                    ?>
                                        <button class="btn btn-primary btn-sm" disabled>Sudah Kembali</button>

                                    <?php
                                        elseif($data["status"] == 3):
                                    ?>
                                        <button class="btn btn-danger btn-sm" disabled>Cancel Peminjaman</button>
                                    <?php
                                        endif
                                    ?>
                                </td>
                                <!-- <td>
                                    <input class="pilih" type="checkbox" name="chkbox[]" value="<?= $data["id_kembali"] ?>">
                                </td> -->
                            </tr>
                            <?php endwhile ?> 
                        </tbody>
                </table>
        
    </div> 
    
    <script>
        $(document).ready( function () {
                $('#buku_belum_dikembalikan').DataTable();
        });
    </script>
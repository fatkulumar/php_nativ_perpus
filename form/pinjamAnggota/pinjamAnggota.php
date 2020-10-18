<?php
    $peminjaman = mysqli_query($koneksi, "SELECT * FROM tb_pinjam p JOIN tb_anggota a ON p.nis = a.nis JOIN tb_buku b ON b.kd_buku = p.kd_buku JOIN tb_jurusan j ON a.id_jurusan = j.id_jurusan JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON a.id_offering = o.id_offering");
    $qqPetugas = mysqli_query($koneksi, "SELECT * FROM tb_petugas");
    $cekPetugas = mysqli_fetch_array($qqPetugas);
    if($cekPetugas == null){
        $setAutoIncrement = mysqli_query($koneksi, "ALTER TABLE tb_petugas AUTO_INCREMENT = 1");
    }
?>

    <div class="container">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Peminjaman <?= $_SESSION["username"] ?></strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>

    <div>
        <a class="btn btn-danger" href="index.php?tambahPetugas">(+) Tambah PeminjamPeminjaman</a>
    </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Offering</th>
                    <th>NaPeminjaman</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Terima</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 0;
                    while($rowPeminjaman = mysqli_fetch_array($peminjaman)):
                        $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $rowPeminjamn["nama_petugas"] ?></td>
                    <td><?= $rowPeminjamn["jenkel"] ?></td>
                    <td><?= $rowPeminjamn["alamat"] ?></td>
                    <td><?= $rowPeminjamn["telp"] ?></td>
                    <td>
                        <a class="btn btn-danger" href="../../../proses/proses.php?hapusPetugas=<?= $rowPeminjamn["id_petugas"] ?>">Hapus</a> | <a class="btn btn-success" href="index.php?editPetugas=<? $rowPeminjamn["id_petugas"] ?>">Edit</a>
                    </td>
                </tr>
                <?php endwhile ?>
            </tbody>
        </table>
    </div>
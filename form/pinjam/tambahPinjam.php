<div class="container" style="margin-bottom: 15px">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Tambah Anggota</strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <form action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="nis">NIS</label>
            <input class="form-control" type="number" name="nis"  required>
        </div>
        <div class="form-group">
            <label for="nama_anggota">Nama</label>
            <input class="form-control" type="text" name="nama_anggota"  required>
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" name="id_kelas" id="id_kelas">
                    <option value="">- Pilih Kelas -</option>
                <?php
                    $kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                    while($row = mysqli_fetch_array($kelas)):
                ?>
                    <option value="<?= $row["id_kelas"] ?>"><?= $row["kelas"] ?></option>
                <?php endwhile ?>
            </select>

            <select class="form-control" name="id_offering" id="id_offering">
                    <option value="">- Pilih Offering -</option>
                <?php
                    $offerring = mysqli_query($koneksi, "SELECT * FROM tb_offering");
                    while($row1 = mysqli_fetch_array($offerring)):
                ?>
                    <option value="<?= $row1["id_offering"] ?>"><?= $row1["offering"] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahAnggota">Tambah Anggota</button>
        </div>
    </form>
</div>
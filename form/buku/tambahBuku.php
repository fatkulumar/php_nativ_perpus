<?php
    $tLokasi = mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku");
?>
    <div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Tambah Buku</strong>
        </h3>
    </div>

    <form class="mt-3 mb-3" action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="kd_buku">Kode Buku</label>
            <input class="form-control" type="text" name="kd_buku"  required>
        </div>
        <div class="form-group">
            <label for="id_lokasi_buku">Lokasi Buku</label>
            <select class="form-control" name="id_lokasi_buku" id="id_lokasi_buku" required>
                <option value="">- Pilih Lokasi Buku -</option>
            <?php
                while($row = mysqli_fetch_array($tLokasi)):
            ?>
            <option value="<?= $row["id_lokasi_buku"] ?>"><?= $row["lokasi_buku"] ?></option>
            <?php endwhile ?>
            </select>
        </div>

        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input class="form-control" type="text" name="judul_buku" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input class="form-control" type="text" name="pengarang" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input class="form-control" type="text" name="penerbit" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input class="form-control" type="text" name="tahun_terbit"  required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input class="form-control" type="text" name="stok"  required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahBuku">Tambah Buku</button>
        </div>
    </form>
</div>
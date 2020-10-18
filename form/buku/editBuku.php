<?php
    $eLokasi = mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku");
    $id = mysqli_real_escape_string($koneksi, $_GET["editBuku"]);
    $eBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$id'");
    $row = mysqli_fetch_array($eBuku);
?>

<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Buku</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="kd_buku">Kode Buku</label>
            <input class="form-control" type="text" name="kd_buku" value="<?= $row["kd_buku"] ?>" required>
        </div>

        <div class="form-group">
            <label for="id_lokasi_buku">Lokasi Buku</label>
            <select class="form-control" name="id_lokasi_buku" id="id_lokasi_buku" required>
                <option value="">- Pilih Lokasi Buku -</option>
            <?php
                while($rowLokasi = mysqli_fetch_array($eLokasi)):
            ?>
            <option value="<?= $rowLokasi["id_lokasi_buku"] ?>" <?php if($rowLokasi["id_lokasi_buku"] == $row["id_lokasi_buku"]){ echo "selected";}  ?>><?= $rowLokasi["lokasi_buku"] ?></option>
            <?php endwhile ?>
            </select>
        </div>

        <div class="form-group">
            <label for="judul_buku">Judul Buku</label>
            <input class="form-control" type="text" name="judul_buku" value="<?= $row["judul_buku"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input class="form-control" type="text" name="pengarang" value="<?= $row["pengarang"] ?>" required>
        </div>
        <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input class="form-control" type="text" name="penerbit" value="<?= $row["penerbit"] ?>" required>
        </div>
        <div class="form-group">
            <label for="tahun_terbit">Tahun Terbit</label>
            <input class="form-control" type="text" name="tahun_terbit" value="<?= $row["tahun_terbit"] ?>" required>
        </div>
        <div class="form-group">
            <label for="stok">Stok</label>
            <input class="form-control" type="text" name="stok" value="<?= $row["stok"] ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editBuku">Edit Buku</button>
        </div>
    </form>
</div>
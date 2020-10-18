<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editLokasiBuku"]);
    $eLokasiBuku= mysqli_query($koneksi, "SELECT * FROM tb_lokasi_buku WHERE id_lokasi_buku = '$id'");
    $row = mysqli_fetch_array($eLokasiBuku);
?>

    <div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Lokasi Buku</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="lokasi_buku">Lokasi Buku</label>
            <input class="form-control" type="text" name="lokasi_buku" value="<?= $row["lokasi_buku"] ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editLokasiBuku">Edit Lokasi Buku</button>
        </div>
    </form>
</div>
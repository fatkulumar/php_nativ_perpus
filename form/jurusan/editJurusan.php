<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editJurusan"]);
    $eJurusan= mysqli_query($koneksi, "SELECT * FROM tb_jurusan WHERE id_jurusan = '$id'");
    $row = mysqli_fetch_array($eJurusan);
?>

<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Jurusan</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="nama_jurusan">Nama Jurusan</label>
            <input class="form-control" type="text" name="nama_jurusan" value="<?= $row["nama_jurusan"] ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editJurusan">Edit Jurusan</button>
        </div>
    </form>
</div>
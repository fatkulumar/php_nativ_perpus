<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editKelas"]);
    $eKelas= mysqli_query($koneksi, "SELECT * FROM tb_kelas WHERE id_kelas = '$id'");
    $row = mysqli_fetch_array($eKelas);
?>

<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Kelas</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input class="form-control" type="text" name="kelas" value="<?= $row["kelas"] ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editKelas">Edit Kelas</button>
        </div>
    </form>
</div>
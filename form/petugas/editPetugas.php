<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editPetugas"]);
    $ePetugas= mysqli_query($koneksi, "SELECT * FROM tb_petugas WHERE id_petugas = '$id'");
    $row = mysqli_fetch_array($ePetugas);
?>

<div class="container" style="margin-bottom: 15px">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Edit Petugas</strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <form action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input class="form-control" type="text" name="nama_petugas" value="<?= $row["nama_petugas"] ?>" required>
        </div>
        <div class="form-group">
            <label for="jenkel">Jenjang</label>
            <input class="form-control" type="text" name="jenkel" value="<?= $row["jenkel"] ?>" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" type="text" name="alamat" value="<?= $row["alamat"] ?>" required>
        </div>
        <div class="form-group">
            <label for="telp">Telphone</label>
            <input class="form-control" type="text" name="telp" value="<?= $row["telp"] ?>" placeholder="+62" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editPetugas">Edit Petugas</button>
        </div>
    </form>
</div>
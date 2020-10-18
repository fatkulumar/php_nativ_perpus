<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editOffering"]);
    $eOffering= mysqli_query($koneksi, "SELECT * FROM tb_offering WHERE id_offering = '$id'");
    $row = mysqli_fetch_array($eOffering);
?>

<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Offering</strong>
        </h3>
    </div>
    <form action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="offering">Offering</label>
            <input class="form-control" type="text" name="offering" value="<?= $row["offering"] ?>" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editOffering">Edit Offering</button>
        </div>
    </form>
</div>
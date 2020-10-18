<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editUsers"]);
    $eUsers = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
    $row = mysqli_fetch_array($eUsers);
?>

    <div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit User</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <div class="form-group">
            <label for="username">Username</label>
            <input class="form-control" type="text" name="username" value="<?= $row["username"] ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" value="" required>
        </div>
        <div>
        <div class="form-group">
            <label for="status">Status</label>
            <?php if($_SESSION["cekStatus"] == 1): ?>
            <select class="form-control" name="status" id="status" required>
                <option value="2">Anggota</option>
            </select>
            <?php else: ?>
            <select class="form-control" name="status" id="status" required>
                <option value="">-- Pilih --</option>
                <option value="1">Admin</option>
                <option value="2">Anggota</option>
            </select>
            <?php endif ?>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editUsers">Edit User</button>
        </div>
    </form>
</div>
    <div class="card-header bg-primary">
        <h3 class="m-0 text-white">
                <strong>Tambah User</strong>
        </h3>
    </div>
<!-- //sampai disini -->
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="username">Username</label>
            <select class="form-control" name="username" id="username">
                    <option value="">- Pilih Anggota -</option>
                <?php
                    $anggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nis not in(SELECT nis FROM tb_user) ");
                    while($row = mysqli_fetch_array($anggota)):
                ?>
                    <option value="<?= $row["nis"] ?>"><?= $row["nama_anggota"] ?></option>
                <?php endwhile ?>
            </select>
            <!-- <input class="form-control" type="number" name="username" required> -->
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="text" name="password" required>
        </div>
        <div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status" required>
                <option value="">--Pilih Status--</option>
                <option value="1">Admin</option>
                <option value="2">Anggota</option>
            </select>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahUsers">Tambah User</button>
        </div>
    </form>
</div>
<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Tambah Kelas</strong>
        </h3>
    </div>
    <form class="mt-3" action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="nama_jurusan">Kelas</label>
            <input class="form-control" type="text" name="kelas" placeholder="10, 11, 12" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahKelas">Tambah Kelas</button>
        </div>
    </form>
</div>
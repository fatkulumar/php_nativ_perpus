<div class="container" style="margin-bottom: 15px">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Tambah Petugas</strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <form action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="nama_petugas">Nama Petugas</label>
            <input class="form-control" type="text" name="nama_petugas"  required>
        </div>
        <div class="form-group">
            <label for="jenkel">Jenjang</label>
            <input class="form-control" type="text" name="jenkel" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input class="form-control" type="text" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="telp">Telphone</label>
            <input class="form-control" type="text" name="telp" placeholder="+62" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahPetugas">Tambah Petugas</button>
        </div>
    </form>
</div>
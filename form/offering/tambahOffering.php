<div class="container" style="margin-bottom: 15px">
    <div class="content">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Tambah Offering</strong></h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
    <form action="../../../proses/proses.php" method="POST">
        <div class="form-group">
            <label for="offering">Offering</label>
            <input class="form-control" type="text" name="offering" placeholder="A, B, C" required>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="tambahOffering">Tambah Offering</button>
        </div>
    </form>
</div>
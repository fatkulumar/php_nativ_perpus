<?php
    $id = mysqli_real_escape_string($koneksi, $_GET["editAnggota"]);
    $eAnggota = mysqli_query($koneksi, "SELECT * FROM tb_anggota WHERE nis = '$id'");
    $row = mysqli_fetch_array($eAnggota);
    // $nis = $row["nis"];
?>

<div class="card-header bg-primary">
        <h3 class="m-0 text-white">
            <strong>Edit Anggota</strong>
        </h3>
    </div>
    <form class="mt-3 mb-3" action="../../../proses/proses.php" method="POST">

        <input class="form-control" type="hidden" name="id_anggota" value="<?= $row["id_anggota"] ?>">

    <?php if($_SESSION["cekStatus"] == 0): ?>
        <div class="form-group">
            <label for="nama_anggota">NIS</label>
            <input class="form-control" type="text" name="nis" value="<?= $row["nis"] ?>">
        </div>
    <?php elseif($_SESSION["cekStatus"] == 1): ?>
        <div class="form-group">
            <label for="nama_anggota">NIS</label>
            <input class="form-control" type="text" name="nis" value="<?= $row["nis"] ?>" readonly>
        </div>
    <?php endif ?>
        
        <div class="form-group">
            <label for="nama_anggota">Nama</label>
            <input class="form-control" type="text" name="nama_anggota" value="<?= $row["nama_anggota"] ?>">
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select class="form-control" name="id_kelas" id="id_kelas" required>
                    <option value="">- Pilih Kelas -</option>
                <?php
                    $kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                    while($rowKelas = mysqli_fetch_array($kelas)):
                ?>
                    <option value="<?= $rowKelas["id_kelas"] ?>" <?php if($rowKelas["id_kelas"] == $row["id_kelas"]){echo "selected";} ?>><?= $rowKelas["kelas"] ?></option>
                <?php endwhile ?>
            </select>

<!-- ======================================================== -->
            <select class="form-control" name="id_jurusan" id="id_jurusan" required>
                    <option value="">- Pilih Jurusan -</option>
                <?php
                    $jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                    while($rowJurusan = mysqli_fetch_array($jurusan)):
                ?>
                    <option value="<?= $rowJurusan["id_jurusan"] ?>" <?php if($rowJurusan["id_jurusan"] == $row["id_jurusan"]){echo "selected";} ?>><?= $rowJurusan["nama_jurusan"] ?></option>
                <?php endwhile ?>
            </select>

<!-- ======================================================== -->
            <select class="form-control" name="id_offering" id="id_offering" required>
                    <option value="">- Pilih Offering -</option>
                <?php
                    $offerring = mysqli_query($koneksi, "SELECT * FROM tb_offering");
                    while($rowOffering = mysqli_fetch_array($offerring)):
                ?>
                    <option value="<?= $rowOffering["id_offering"] ?>" <?php if($rowOffering["id_offering"] == $row["id_offering"]){echo "selected";} ?>><?= $rowOffering["offering"] ?></option>
                <?php endwhile ?>
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10"><?= $row["alamat"] ?>
            </textarea>
        </div>
        <div>
            <button class="btn btn-primary" type="submit" name="editAnggota">Edit Anggota</button>
        </div>
    </form>
</div>
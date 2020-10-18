    <div class="card-header bg-primary">
            <h3 class="m-0 text-white">
                    <strong>Tambah Anggota</strong>
            </h3>
        </div>
        <form class="mt-3 mb-3" action="../../../proses/proses.php" method="POST">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input class="form-control" type="number" name="nis"  required>
            </div>
            <div class="form-group">
                <label for="nama_anggota">Nama</label>
                <input class="form-control" type="text" name="nama_anggota"  required>
            </div>
            <div class="form-group">
                <label for="id_kelas">Kelas</label>
                <select class="form-control" name="id_kelas" id="id_kelas">
                        <option value="">- Pilih Kelas -</option>
                    <?php
                        $kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                        while($row = mysqli_fetch_array($kelas)):
                    ?>
                        <option value="<?= $row["id_kelas"] ?>"><?= $row["kelas"] ?></option>
                    <?php endwhile ?>
                </select>

                <!-- ======================================================== -->
                <select class="form-control" name="id_jurusan" id="id_jurusan" required>
                        <option value="">- Pilih Jurusan -</option>
                    <?php
                        $jurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                        while($rowJurusan = mysqli_fetch_array($jurusan)):
                    ?>
                        <option value="<?= $rowJurusan["id_jurusan"] ?>"><?= $rowJurusan["nama_jurusan"] ?></option>
                    <?php endwhile ?>
                </select>

                <!-- ======================================================== -->

                <select class="form-control" name="id_offering" id="id_offering">
                        <option value="">- Pilih Offering -</option>
                    <?php
                        $offerring = mysqli_query($koneksi, "SELECT * FROM tb_offering");
                        while($row1 = mysqli_fetch_array($offerring)):
                    ?>
                        <option value="<?= $row1["id_offering"] ?>"><?= $row1["offering"] ?></option>
                    <?php endwhile ?>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" required></textarea>
            </div>
            <div>
                <button class="btn btn-primary" type="submit" name="tambahAnggota">Tambah Anggota</button>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_SESSION["alert_nis_terdaftar"])){
            $data_alert = "Nis Sudah Terdaftar";
            require_once "../../../form/sweetalert/sweetalert.php";
            unset($_SESSION["alert_nis_terdaftar"]);
        }
    ?>
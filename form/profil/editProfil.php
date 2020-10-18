<?php 
        if(isset($_GET["editProfil"])){
            $nis = $_SESSION['nis'];
            $select = mysqli_query($koneksi, "SELECT * FROM tb_anggota a LEFT JOIN tb_jurusan j ON a.id_jurusan = j.id_jurusan LEFT JOIN tb_kelas k ON k.id_kelas = a.id_kelas LEFT JOIN tb_offering o ON o.id_offering = a.id_offering WHERE a.nis = '$nis'");
            $no = 0;
            while($row = mysqli_fetch_array($select)):
            $no++;
    ?>

        <script src="../../../template/external/jquery.js"></script>

            <div class="card-header bg-primary mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <h3 class="m-0 text-white">
                                <strong>Edit Profil</strong>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <form action="../../../proses/proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="ePNis" value="<?= $nis ?>">
                <div class="form-group">
                    <label for="nama_anggota">Nama</label>
                    <input class="form-control" type="text" name="nama_anggota" value="<?= $row["nama_anggota"] ?>" required>
                </div>

            <?php if($_SESSION["cekStatus"] == 2): ?>

                <div class="form-group">
                    <label for="id_jurusan">Jurusan</label>
                    <select class="form-control" name="id_jurusan" id="id_jurusan" required>
                        <option value="">- Pilih Jurusan -</option>
                    <?php
                        $eJurusan = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                        while($rowJurusan = mysqli_fetch_array($eJurusan)):
                    ?>
                    <option value="<?= $rowJurusan["id_jurusan"] ?>" <?php if($rowJurusan["id_jurusan"] == $row["id_jurusan"]){ echo "selected";}  ?>><?= $rowJurusan["nama_jurusan"] ?></option>
                    <?php endwhile ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_kelas">Kelas</label>
                    <select class="form-control" name="id_kelas" id="id_kelas" required>
                        <option value="">- Pilih Kelas -</option>
                    <?php
                        $eKelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                        while($rowKelas = mysqli_fetch_array($eKelas)):
                    ?>
                    <option value="<?= $rowKelas["id_kelas"] ?>" <?php if($rowKelas["id_kelas"] == $row["id_kelas"]){ echo "selected";}  ?>><?= $rowKelas["kelas"] ?></option>
                    <?php endwhile ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="id_offering">Offering</label>
                    <select class="form-control" name="id_offering" id="id_offering" required>
                        <option value="">- Pilih Jurusan -</option>
                    <?php
                        $eOffering = mysqli_query($koneksi, "SELECT * FROM tb_offering");
                        while($rowOffering = mysqli_fetch_array($eOffering)):
                    ?>
                    <option value="<?= $rowOffering["id_offering"] ?>" <?php if($rowOffering["id_offering"] == $row["id_offering"]){ echo "selected";}  ?>><?= $rowOffering["offering"] ?></option>
                    <?php endwhile ?>
                    </select>
                </div>

                <?php endif ?>

                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input class="form-control" type="text" name="alamat" value="<?= $row["alamat"] ?>" required>
                </div>

                <div class="form-group">
                    <label for="fProfil">Foto</label>
                    <input type="file" class="form-control" name="fProfil" id="file_gambar" accept="image/*">
                </div>

                <?php
                    if($row["foto"] != ""){
                        echo "<img id=prev_foto width=150px height=100px src=../../../proses/file/$row[foto]>";
                    }else{
                        echo "<img id=prev_foto width=150px height=100px src=<?= $row[foto] ?>";
                    }
                ?>
                
                <div style="margin-top : 10px">
                    <button class="btn btn-primary mb-3" type="submit" name="ePProfil">Update</button>
                </div>
            </form>
        </div>

        <script>
            function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                $('#prev_foto').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(input.files[0]);
            }
            } 

            $(document).ready(function(){
            $('#file_gambar').change(function(){
                readURL(this);
            });

        });
        </script>

        <?php endwhile ?>
        <?php } ?>
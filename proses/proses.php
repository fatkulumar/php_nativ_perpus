<?php
    session_start();
    include "../koneksi/koneksi.php";
    if(isset($_POST["login"])) {
        $email = mysqli_real_escape_string($koneksi, $_POST["email"]);
        $password = mysqli_real_escape_string($koneksi, $_POST["password"]);
        $qUser = mysqli_query($koneksi, "SELECT * FROM tb_user");
        $cekUser = mysqli_fetch_array($qUser);
            if($cekUser === null){
                 $encPassword = password_hash($password, PASSWORD_DEFAULT); 
                 $insertUser = mysqli_query($koneksi, "INSERT INTO `tb_user`(`nis`, `username`, `password`) VALUES ('$email', '$email', '$encPassword')");
                 $insertAnggota = mysqli_query($koneksi, "INSERT INTO `tb_anggota`(`nis`) VALUES ('$email')");
                    if($insertUser) {
                        $tLogin = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis");

                        $tLogin = mysqli_fetch_array($tLogin);
                        $nama_anggota = $tLogin["nama_anggota"];
                        $id_user = $tLogin["id_user"];
                        $cekStatus = $tLogin["status"];
                        $nis = $tLogin["nis"];
                        $hashPssd = $tLogin["password"];
                        // $hashPassword = password_verify($password, $hashPssd);
                        // if($email == $nis && $password == $hashPassword){
                            $_SESSION["nama_anggota"] = $nama_anggota; 
                            $_SESSION["username"] = $nis;
                            $_SESSION["nis"] = $nis;
                            $_SESSION["cekStatus"] = $cekStatus;
                            $_SESSION["id_user"] = $id_user;
                            $_SESSION["login"] = "login";
                        header("location: ../template/external/adminlte/index.php");
                        // }else{
                            
                        //     echo "gagal registrasi Super Admin";
                        // }
                    }else{
                        echo "gagal registrasi Super Admin";
                    }
                }else{    
                $qLogin = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis");
                while($rLogin = mysqli_fetch_array($qLogin)){
                    $nama_anggota = $rLogin["nama_anggota"];
                    $id_user = $rLogin["id_user"];
                    $cekStatus = $rLogin["status"];
                    $nis = $rLogin["nis"];
                    $hashPssd = $rLogin["password"];
                    $hashPassword = password_verify($password, $hashPssd);
                    if($email == $nis && $password == $hashPassword){
                        $_SESSION["nama_anggota"] = $nama_anggota; 
                        $_SESSION["username"] = $nis;
                        $_SESSION["nis"] = $nis;
                        $_SESSION["cekStatus"] = $cekStatus;
                        $_SESSION["id_user"] = $id_user;
                        $_SESSION["login"] = "login";
                        header("location: ../template/external/adminlte/index.php");
                    }else{
                        $_SESSION["psdSalah"] = "Password Salah";
                        header("location: ../index.php?users");
                    }
                }
            }
    }elseif(isset($_POST["editUsers"])){
        $eIdUsers = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eNisUsers = mysqli_real_escape_string($koneksi, $_POST["nis"]);
        $eUsername = mysqli_real_escape_string($koneksi, $_POST["username"]);
        $ePassword = mysqli_real_escape_string($koneksi, $_POST["password"]);
        $hePassword = password_hash($ePassword, PASSWORD_DEFAULT);
        $eStatus = mysqli_real_escape_string($koneksi, $_POST["status"]);
        $qeUsers = mysqli_query($koneksi, "UPDATE `tb_user` SET `username`='$eUsername', `nis`='$eUsername',`password`='$hePassword',`status`='$eStatus' WHERE id_user = '$eIdUsers'");
        if($qeUsers){
            $_SESSION["alert_edit_user"] = "alert_edit_user";
            header("location: ../template/external/adminlte/index.php?users=editUsers");
        }else{
            echo "Gagal Edit Users";
        }
    }elseif(isset($_GET["hapusUsers"])){
        $hapusUsers = mysqli_real_escape_string($koneksi, $_GET["hapusUsers"]);
        $qHapusUsers = mysqli_query($koneksi, "DELETE FROM `tb_user` WHERE id_user = '$hapusUsers'");
        if($qHapusUsers){
            $_SESSION["alert_hapus_user"] = "alert_hapus_user";
            header("location: ../template/external/adminlte/index.php?users=users");
        }else{
            echo "Gagal Hapus User";
        }
    }elseif(isset($_POST["tambahUsers"])){
        // $tUNis = mysqli_real_escape_string($koneksi, $_POST["nis"]);
        $tUsername = mysqli_real_escape_string($koneksi, $_POST["username"]);
        $tPassword = mysqli_real_escape_string($koneksi, $_POST["password"]);
        $tStatus = mysqli_real_escape_string($koneksi, $_POST["status"]);
        $hPassword = password_hash($tPassword, PASSWORD_DEFAULT);
        // $updateAnggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `status_user`='1'");
        $qTUsers = mysqli_query($koneksi, "INSERT INTO `tb_user`(`nis`,`username`, `password`, `status`) VALUES ('$tUsername', '$tUsername', '$hPassword', '$tStatus')");
        if($qTUsers){
            $_SESSION["alert_tambah_user"] = "alert_tambah_user";
            header("location: ../template/external/adminlte/index.php?users=users");
        }else{
            echo "Insert User Gagal";
        }
    }elseif(isset($_POST["editBuku"])){ 
        $eBuku = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eKd_buku = mysqli_real_escape_string($koneksi, $_POST["kd_buku"]);
        $eIdLokasi_buku = mysqli_real_escape_string($koneksi, $_POST["id_lokasi_buku"]);
        $eJudul_buku = mysqli_real_escape_string($koneksi, $_POST["judul_buku"]);
        $ePengarang = mysqli_real_escape_string($koneksi, $_POST["pengarang"]);
        $ePenerbit = mysqli_real_escape_string($koneksi, $_POST["penerbit"]);
        $eTahun_terbit = mysqli_real_escape_string($koneksi, $_POST["tahun_terbit"]); 
        $eStok = mysqli_real_escape_string($koneksi, $_POST["stok"]);
        $qEBuku = mysqli_query($koneksi, "UPDATE `tb_buku` SET `kd_buku`='$eKd_buku', `id_lokasi_buku` = '$eIdLokasi_buku',`judul_buku`='$eJudul_buku',`pengarang`='$ePengarang',`penerbit`='$ePenerbit',`tahun_terbit`='$eTahun_terbit',`stok`='$eStok' WHERE `id_buku` = '$eBuku'");
        if($qEBuku){
            $_SESSION["alert_edit_buku"] = "alert_edit_buku";
            header("location: ../template/external/adminlte/index.php?buku=buku");
        }else{
            echo "Edit Buku Gagal";
        }
    }elseif(isset($_POST["tambahBuku"])){ 
        $tKd_buku = mysqli_real_escape_string($koneksi, $_POST["kd_buku"]);
        $tBIdLokasi_buku = mysqli_real_escape_string($koneksi, $_POST["id_lokasi_buku"]);
        $tJudul_buku = mysqli_real_escape_string($koneksi, $_POST["judul_buku"]);
        $tPengarang = mysqli_real_escape_string($koneksi, $_POST["pengarang"]);
        $tPenerbit = mysqli_real_escape_string($koneksi, $_POST["penerbit"]);
        $tTahun_terbit = mysqli_real_escape_string($koneksi, $_POST["tahun_terbit"]); 
        $tStok = mysqli_real_escape_string($koneksi, $_POST["stok"]);
        $qTBuku = mysqli_query($koneksi, "INSERT INTO `tb_buku`(`kd_buku`, `id_lokasi_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`) VALUES ('$tKd_buku', '$tBIdLokasi_buku','$tJudul_buku','$tPengarang','$tPenerbit','$tTahun_terbit','$tStok')");
        if($qTBuku){
            $_SESSION["alert_tambah_buku"] = "alert_tambah_buku";
            header("location: ../template/external/adminlte/index.php?buku=buku");
        }else{
            echo "Tambah Buku Gagal";
        }
    }elseif(isset($_GET["hapusBuku"])){ 
        $hBuku = mysqli_real_escape_string($koneksi, $_GET["hapusBuku"]);
        $qHBuku = mysqli_query($koneksi, "DELETE FROM `tb_buku` WHERE id_buku = '$hBuku'");
        if($qHBuku){
            $_SESSION["alert_hapus_buku"] = "alert_hapus_buku";
            header("location: ../template/external/adminlte/index.php?buku=buku");
        }else{
            echo "Edit Buku Gagal";
        }
    }elseif(isset($_POST["tambahPetugas"])){ 
        $tnama_petugas = mysqli_real_escape_string($koneksi, $_POST["nama_petugas"]);
        // $tJenkel = mysqli_real_escape_string($koneksi, $_POST["jenkel"]);
        $tAlamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
        $tTelp = mysqli_real_escape_string($koneksi, $_POST["telp"]);
        $qTPetugas = mysqli_query($koneksi, "INSERT INTO `tb_petugas`(`nama_petugas`,  `alamat`, `telp`) VALUES ('$tnama_petugas','$tAlamat','$tTelp')");
        if($qTPetugas){
            header("location: ../template/external/adminlte/index.php?petugas=petugas");
        }else{
            echo "Tambah Petugas Gagal";
        }
    }elseif(isset($_POST["editPetugas"])){ 
        $ePetugas = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $enama_petugas = mysqli_real_escape_string($koneksi, $_POST["nama_petugas"]);
        // $eJenkel = mysqli_real_escape_string($koneksi, $_POST["jenkel"]);
        $eAlamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
        $eTelp = mysqli_real_escape_string($koneksi, $_POST["telp"]);
        $qEPetugas = mysqli_query($koneksi, "UPDATE `tb_petugas` SET `nama_petugas`='$enama_petugas',`alamat`='$eAlamat',`telp`='$eTelp' WHERE id_petugas = '$ePetugas'");
        if($qEPetugas){
            header("location: ../template/external/adminlte/index.php?petugas=petugas");
        }else{
            echo "Edit Petugas Gagal";
        }
    }elseif(isset($_GET["hapusPetugas"])){ 
        $hPetugas = mysqli_real_escape_string($koneksi, $_GET["hapusPetugas"]);
        $qEPetugas = mysqli_query($koneksi, "DELETE FROM `tb_petugas` WHERE id_petugas='$hPetugas'");
        if($qEPetugas){
            header("location: ../template/external/adminlte/index.php?petugas=petugas");
        }else{
            echo "Hapus Petugas Gagal";
        }
    }elseif(isset($_POST["tambahJurusan"])){ 
        $tNama_jurusan = mysqli_real_escape_string($koneksi, $_POST["nama_jurusan"]);
        $qTPetugas = mysqli_query($koneksi, "INSERT INTO `tb_jurusan`(`nama_jurusan`) VALUES ('$tNama_jurusan')");
        if($qTPetugas){
            $_SESSION["alert_tambah_jurusan"] = "alert_tambah_jurusan";
            header("location: ../template/external/adminlte/index.php?jurusan=jurusan");
        }else{
            echo "Tambah Jurusan Gagal";
        }
    }elseif(isset($_POST["editJurusan"])){ 
        $eJurusan = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eNama_jurusan = mysqli_real_escape_string($koneksi, $_POST["nama_jurusan"]);
        $qTJurusan = mysqli_query($koneksi, "UPDATE `tb_jurusan` SET `nama_jurusan`='$eNama_jurusan' WHERE id_jurusan = '$eJurusan'");
        if($qTJurusan){
            $_SESSION["alert_edit_jurusan"] = "alert_edit_jurusan";
            header("location: ../template/external/adminlte/index.php?jurusan=jurusan");
        }else{
            echo "Edit Jurusan Gagal";
        }
    }elseif(isset($_GET["hapusJurusan"])){ 
        $hJurusan = mysqli_real_escape_string($koneksi, $_GET["hapusJurusan"]);
        $qHJurusan = mysqli_query($koneksi, "DELETE FROM `tb_jurusan` WHERE id_jurusan = '$hJurusan'");
        if($qHJurusan){
            $_SESSION["alert_hapus_jurusan"] = "alert_hapus_jurusan";
            header("location: ../template/external/adminlte/index.php?jurusan=jurusan");
        }else{
            echo "Hapus Jurusan Gagal";
        }
    }elseif(isset($_POST["tambahAnggota"])){ 
        $tNis = mysqli_real_escape_string($koneksi, $_POST["nis"]);

        $qceknisanggota = mysqli_query($koneksi, "SELECT nis FROM tb_anggota"); 
        while($rceknisanggota = mysqli_fetch_array($qceknisanggota)){
            $nisada = $rceknisanggota['nis'];
            if($tNis == $nisada){
                $_SESSION["alert_nis_terdaftar"] = "alert_nis_terdaftar";
                header("location: ../template/external/adminlte/index.php?tambahAnggota");
            }
        }
        $tNama_anggota = mysqli_real_escape_string($koneksi, $_POST["nama_anggota"]);
        $tIdKelas = mysqli_real_escape_string($koneksi, $_POST["id_kelas"]);
        $tIdJurusan = mysqli_real_escape_string($koneksi, $_POST["id_jurusan"]);
        $tIdOffering = mysqli_real_escape_string($koneksi, $_POST["id_offering"]);
        $tAlamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
        $qTAnggota = mysqli_query($koneksi, "INSERT INTO `tb_anggota`(`nis`, `nama_anggota`, `id_jurusan`, `id_kelas`, `id_offering`, `alamat`) VALUES ('$tNis','$tNama_anggota', '$tIdJurusan','$tIdKelas','$tIdOffering', '$tAlamat')");
        if($qTAnggota){
            $_SESSION["alert_tambah_anggota"] = "alert_tambah_anggota";
            header("location: ../template/external/adminlte/index.php?anggota=anggota");
        }else{
            echo "Tambah Anggota Gagal Cek Nis";
        }
    }elseif(isset($_POST["editAnggota"])){ 
        $eIdAnggota = mysqli_real_escape_string($koneksi, $_POST["id_anggota"]); 
        $eNis = mysqli_real_escape_string($koneksi, $_POST["nis"]);
        $eNama_anggota = mysqli_real_escape_string($koneksi, $_POST["nama_anggota"]);
        $eIdKelas = mysqli_real_escape_string($koneksi, $_POST["id_kelas"]);
        $eIdJurusan = mysqli_real_escape_string($koneksi, $_POST["id_jurusan"]);
        $eIdOffering = mysqli_real_escape_string($koneksi, $_POST["id_offering"]);
        $eAlamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);
        $qEAnggota = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nis`='$eNis',`nama_anggota`='$eNama_anggota', `id_jurusan`='$eIdJurusan', `id_kelas`='$eIdKelas',`id_offering`='$eIdOffering',`alamat`='$eAlamat' WHERE id_anggota = '$eIdAnggota'");
        if($qEAnggota){
            $_SESSION["alert_edit_anggota"] = "alert_edit_anggota";
            header("location: ../template/external/adminlte/index.php?anggota=anggota");
        }else{
            echo "Edit Anggota Gagal";
        }
    }elseif(isset($_GET["hapusAnggota"])){ 
        echo $hAnggota = mysqli_real_escape_string($koneksi, $_GET["hapusAnggota"]);
        $qHAnggota = mysqli_query($koneksi, "DELETE FROM `tb_anggota` WHERE nis = '$hAnggota'");
        if($qHAnggota){
            $_SESSION["alert_hapus_anggota"] = "alert_hapus_anggota";
            header("location: ../template/external/adminlte/index.php?anggota=anggota");
        }else{
            echo "Hapus Anggota Gagal";
        }
    }elseif(isset($_POST["tambahKelas"])){ 
        $tKelas = mysqli_real_escape_string($koneksi, $_POST["kelas"]);
        $qTKelas = mysqli_query($koneksi, "INSERT INTO `tb_kelas`(`kelas`) VALUES ('$tKelas')");
        if($qTKelas){
            require "../form/sweetalert/sweetalert.php";
            $_SESSION["alert_tambah_kelas"] = "alert_tambah_kelas";
            header("location: ../template/external/adminlte/index.php?kelas=kelas");
        }else{
            echo "Tambah Kelas Gagal";
        }
    }elseif(isset($_POST["editKelas"])){ 
        $eIdKelas = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eKelas = mysqli_real_escape_string($koneksi, $_POST["kelas"]);
        $qEKelas = mysqli_query($koneksi, "UPDATE `tb_kelas` SET `kelas`='$eKelas' WHERE id_kelas = '$eIdKelas'");
        if($qEKelas){
            $_SESSION["alert_edit_kelas"] = "alert_edit_kelas";
            header("location: ../template/external/adminlte/index.php?kelas=kelas");
        }else{
            echo "Edit Kelas Gagal";
        }
    }elseif(isset($_GET["hapusKelas"])){ 
        $hKelas = mysqli_real_escape_string($koneksi, $_GET["hapusKelas"]);
        $qHKelas = mysqli_query($koneksi, "DELETE FROM `tb_kelas` WHERE id_kelas = '$hKelas'");
        if($qHKelas){ 
            $_SESSION["alert_hapus_kelas"] = "alert_hapus_kelas";
            header("location: ../template/external/adminlte/index.php?kelas=kelas");
        }else{
            echo "Hapus Kelas Gagal";
        }
    }elseif(isset($_POST["tambahOffering"])){ 
        $tOffering = mysqli_real_escape_string($koneksi, $_POST["offering"]);
        $qTOffering = mysqli_query($koneksi, "INSERT INTO `tb_offering`(`offering`) VALUES ('$tOffering')");
        if($qTOffering){
            $_SESSION["alert_tambah_offering"] = "alert_tambah_offering";
            header("location: ../template/external/adminlte/index.php?offering=offering");
        }else{
            echo "Tambah Offering Gagal";
        }
    }elseif(isset($_POST["editOffering"])){ 
        $eIdOffering = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eOffering = mysqli_real_escape_string($koneksi, $_POST["offering"]);
        $qEOffering = mysqli_query($koneksi, "UPDATE `tb_offering` SET `offering`='$eOffering' WHERE id_offering = '$eIdOffering'");
        if($qEOffering){
            $_SESSION["alert_edit_offering"] = "alert_edit_offering";
            header("location: ../template/external/adminlte/index.php?offering=offering");
        }else{
            echo "Edit Offering Gagal";
        }
    }elseif(isset($_GET["hapusOffering"])){ 
        $hOffering = mysqli_real_escape_string($koneksi, $_GET["hapusOffering"]);
        $qHOffering = mysqli_query($koneksi, "DELETE FROM `tb_offering` WHERE id_offering = '$hOffering'");
        if($qHOffering){ 
            $_SESSION["alert_hapus_offering"] = "alert_hapus_offering";
            header("location: ../template/external/adminlte/index.php?offering=offering");
        }else{
            echo "Hapus Offering Gagal";
        }
    }

    elseif(isset($_POST["tambahLokasiBuku"])){ 
        $tLokasiBuku = mysqli_real_escape_string($koneksi, $_POST["lokasi_buku"]);
        $qTLokasiBuku = mysqli_query($koneksi, "INSERT INTO `tb_lokasi_buku`(`lokasi_buku`) VALUES ('$tLokasiBuku')");
        if($qTLokasiBuku){
            $_SESSION["alert_tambah_lokasiBuku"] = "alert_tambah_lokasiBuku";
            header("location: ../template/external/adminlte/index.php?lokasiBuku=lokasiBuku");
        }else{
            echo "Tambah Lokasi Buku Gagal";
        }
    }elseif(isset($_POST["editLokasiBuku"])){ 
        $eIdLokasiBuku = mysqli_real_escape_string($koneksi, $_POST["id"]);
        $eLokasiBuku = mysqli_real_escape_string($koneksi, $_POST["lokasi_buku"]);
        $qELokasiBuku = mysqli_query($koneksi, "UPDATE `tb_lokasi_buku` SET `lokasi_buku`='$eLokasiBuku' WHERE id_lokasi_buku = '$eIdLokasiBuku'");
        if($qELokasiBuku){
            $_SESSION["alert_edit_lokasiBuku"] = "alert_edit_lokasiBuku";
            header("location: ../template/external/adminlte/index.php?lokasiBuku=lokasiBuku");
        }else{
            echo "Edit Lokasi Buku Gagal";
        }
    }elseif(isset($_GET["hapusLokasiBuku"])){
        $hLokasiBuku = mysqli_real_escape_string($koneksi, $_GET["hapusLokasiBuku"]);
        $qHLokasiBuku = mysqli_query($koneksi, "DELETE FROM `tb_lokasi_buku` WHERE id_lokasi_buku = '$hLokasiBuku'");
        if($qHLokasiBuku){ 
            $_SESSION["alert_edit_lokasiBuku"] = "alert_edit_lokasiBuku";
            header("location: ../template/external/adminlte/index.php?lokasiBuku=lokasiBuku");
        }else{
            echo "Hapus Lokasi Buku Gagal";
        }
    // }elseif(isset($_GET["modalPinjamBuku"])){ 
    //     $pbId = mysqli_real_escape_string($koneksi, $_GET["id"]);
    //     $pbStok = mysqli_real_escape_string($koneksi, $_GET["stok"]);
    //     $pbKdBuku = mysqli_real_escape_string($koneksi, $_GET["kd_buku"]);
    //     $pbJudulBuku = mysqli_real_escape_string($koneksi, $_GET["judul_buku"]);
    //     $pbPengarang = mysqli_real_escape_string($koneksi, $_GET["pengarang"]);
    //     $pbTahunTerbit1 = mysqli_real_escape_string($koneksi, $_GET["tahun_terbit"]);
    //     $pbTahunTerbit = date('d-F-Y', strtotime($pbTahunTerbit1));

    //     $tglPinjam = date_create(date('Y-m-d')); // waktu sekarang
    //     // $tanggalPinjam = date('d-F-Y H:i:s');
    //     $tanggalPinjam = date('d-F-Y');
    //     $tiga_hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
    //     $tglKembali = date_create(date('Y-m-d', $tiga_hari));
    //     $tanggalKembali = date('d-F-Y', $tiga_hari);

    //     $qpbBuku = mysqli_query($koneksi, "SELECT * FROM tb_anggota");
    //     $rpbBuku = mysqli_fetch_array($qpbBuku);
    //     $sessionNis = $_SESSION["nis"];
    //     $sessionNamaAnggota = $_SESSION["nama_anggota"];
    //     if($pbStok <= 0 ){
    //         echo "
    //         <script>
    //             alert('Persediaan Kosong')
    //         </script>";
    //         die();
    //     }

    //     echo "
    //     <div class='container'>
    //     <!-- The Modal -->
    //     <div class='modal' id='myModal'>
    //         <div class='modal-dialog'>
    //             <div class='modal-content'>
            
    //                 <!-- Modal Header -->
    //                 <div class='modal-header'>
    //                     <h4 class='modal-title'>Pinjam Buku</h4>
    //                     <button type='button' class='close' data-dismiss='modal'>&times;</button>
    //                     </div>
    //                     <div class='row'>
                        
    //                         <!-- Modal body -->
    //                         <div class='modal-body'>
    //                             <input class='form-control' type='hidden' name='id_buku' id='id_buku' value='$pbId' readonly>
    //                             <div class='row'>
    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='nis'>NIS</label>
    //                                         <input class='form-control' type='text' name='nis' id='nis' value='$sessionNis' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='kd_buku'>Kode Buku</label>
    //                                         <input class='form-control' type='text' name='kd_buku' id='kd_buku' value='$pbKdBuku' readonly>
    //                                     </div>
    //                                 </div>
                                    
    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='nama_anggota'>Nama</label>
    //                                         <input class='form-control' type='text' name='nama_anggota' id='nama_anggota' value='$sessionNamaAnggota' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='judul_buku'>Judul Buku</label>
    //                                         <input class='form-control' type='text' name='judul_buku' id='judul_buku' value='$pbJudulBuku' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='pengarang'>Pengarang</label>
    //                                         <input class='form-control' type='text' name='pengarang' id='pengarang' value='$pbPengarang' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='tahun_terbit'>Tahun Terbit</label>
    //                                         <input class='form-control' type='text' name='tahun_terbit' id='tahun_terbit' value='$pbTahunTerbit' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='tgl_pinjam'>Tanggal Pinjam</label>
    //                                         <input class='form-control' type='text' name='tgl_pinjam' id='tgl_pinjam' value='$tanggalPinjam' readonly>
    //                                     </div>
    //                                 </div>

    //                                 <div class='col-md-6'>
    //                                     <div class='form-group'>
    //                                         <label for='tgl_kembali'>Tanggal Kembali</label>
    //                                         <input class='form-control' type='text' name='tgl_kembali' id='tgl_kembali' value='$tanggalKembali' readonly>
    //                                     </div>
    //                                 </div>
                                    
    //                             </div>
    //                         </div>
                                    
    //                         <!-- Modal footer -->
    //                         <div class='modal-footer'>
    //                             <button type='button' class='btn btn-danger' id='pinjam' onclick='pinjam()'>Pinjam</button>
    //                         </div>
                            
    //                     </div>
    //                 </div>
    //         </div>
            
    //     </div>
    //     ";
    }elseif(isset($_GET["pinjamBuku"])){ 
        // echo json_encode("umar"); 
        $pId = mysqli_real_escape_string($koneksi, $_POST["id_buku"]);
        $nisku = $_SESSION["nis"];
        $cekJmlPinjam = mysqli_query($koneksi, "SELECT nis FROM tb_kembali WHERE nis = $nisku");
        $bukuKosong = mysqli_query($koneksi, "SELECT stok FROM tb_buku WHERE id_buku = $pId");
        $cekJmlP = mysqli_fetch_array($cekJmlPinjam);
        $jmlP = mysqli_num_rows($cekJmlPinjam);
        if($jmlP >= 3){
            $alert_perpinjaman = "Anda Sudah Meminjam Melebihi Batas!!!";

            echo json_encode($alert_perpinjaman);
        }
        $pNis = mysqli_real_escape_string($koneksi, $_POST["nisku"]);
        // $tglPinjam = date_create(date('Y-m-d')); // waktu sekarang
        // $tanggalPinjam = date('Y-m-d H:i:s');
        $tanggalPinjam = date('Y-m-d');
        $tiga_hari = mktime(0,0,0,date("n"),date("j")+3,date("Y"));
        // $tglKembali = date_create(date('Y-m-d', $tiga_hari));
        // $tanggalKembali = date('Y-m-d', $tiga_hari) . " " . date('H:i:s');
        $tanggalHarusKembali = date('Y-m-d', $tiga_hari);
        // $diff  = date_diff( $tglPinjam, $tglKembali );
        // if($diff->d > 3 ){
            //revisi
            // jika buku dicancel harusnya stok kembali menambah
            // $denda = '1000';
            // $denda = $diff->d * 1000;
        // }else{
        //     $denda = '0';
        // }

        $qStokBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku WHERE id_buku = '$pId'");
        $rPinjamBuku = mysqli_fetch_array($qStokBuku);
        $jmlStokBuku = $rPinjamBuku["stok"] - 1;
        $updStok = mysqli_query($koneksi, "UPDATE `tb_buku` SET `stok`='$jmlStokBuku' WHERE id_buku = '$pId'");
        
        $qLastIdPinjam = mysqli_query($koneksi, "SELECT *
        FROM tb_pinjam WHERE id_pinjam IN (SELECT MAX(id_pinjam) FROM tb_pinjam)");
        $row=mysqli_fetch_array($qLastIdPinjam);
        $idPinjam = $row["id_pinjam"] + 1;

        $sessionPinjamNamaAnggota = $_SESSION["nama_anggota"];
        $qPinjam = mysqli_query($koneksi, "INSERT INTO `tb_pinjam`(`nis`, `tgl_pinjam`, `id_buku`) VALUES ('$pNis', '$tanggalPinjam', '$pId')");
        $qKembali = mysqli_query($koneksi, "INSERT INTO `tb_kembali`(`id_buku`, `id_pinjam`, `nis`, `tgl_pinjam`, `tgl_harus_kembali`) VALUES ('$pId', '$idPinjam','$pNis','$tanggalPinjam','$tanggalHarusKembali')");
        if($qPinjam){
            echo "
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Berhasil Pinjam! <i>$sessionPinjamNamaAnggota</i></strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            ";
        echo json_encode($jmlStokBuku);
        // echo json_encode($jmlStokBuku);

        }else{
            echo "Gagal Pinjam";
        }
    }elseif(isset($_GET["cancelPinjam"])){
        $idCancel = mysqli_real_escape_string($koneksi, $_GET["cancelPinjam"]);
        $_SESSION["alert_cancel_pinjam"] = "alert_cancel_pinjam";
        $qCancelKembali = mysqli_query($koneksi, "UPDATE `tb_kembali` SET `status`= 3 WHERE id_pinjam = '$idCancel'");

        $qCancel = mysqli_query($koneksi, "SELECT * FROM tb_kembali k JOIN tb_pinjam p ON p.id_pinjam = k.id_pinjam JOIN tb_buku b ON b.id_buku = p.id_buku WHERE k.id_pinjam = '$idCancel'");
        $rowCancel = mysqli_fetch_array($qCancel);
        $idBukuCancel = $rowCancel['id_buku']; 
        $tambahStok = $rowCancel['stok'] + 1;
        $updateStok = mysqli_query($koneksi, "UPDATE tb_buku SET `stok` = '$tambahStok' WHERE `id_buku` ='$idBukuCancel'"); 

        if($qCancelKembali && $updateStok){
            header("location: ../template/external/adminlte/index.php?pinjam=pinjam");
        }else{
            echo "Gagal Cancel Pinjam";
        }
    }elseif(isset($_GET["dikembalikanPinjam"])){
        $idBukuKembali = mysqli_real_escape_string($koneksi, $_GET["id_buku"]);
        $idKembaliPinjam = mysqli_real_escape_string($koneksi, $_GET["dikembalikan"]); 

        $qKembaliBuku = mysqli_query($koneksi, "SELECT stok FROM tb_buku WHERE `id_buku` = '$idBukuKembali'");
        $rowBukuKembali = mysqli_fetch_array($qKembaliBuku);
        $stokKembali = $rowBukuKembali["stok"]+1;
        $updateStokKembali = mysqli_query($koneksi, "UPDATE tb_buku SET `stok`=$stokKembali WHERE id_buku = '$idBukuKembali'");
        
        $qTglKem = mysqli_query($koneksi, "SELECT tgl_harus_kembali FROM tb_kembali WHERE id_pinjam = '$idKembaliPinjam'");
        $row = mysqli_fetch_array($qTglKem);
        $tgl1 = $row["tgl_harus_kembali"];
        $tanggal1 = new DateTime($tgl1);
        // $tgl2 = new DateTime(date("Y-m-d H:i:s"));
        $tanggalKembaliPinjam = date('Y-m-d');
        $tgl2 = new DateTime(date("Y-m-d"));
        // $tanggal2 = date_format($tgl2, 'Y-m-d H:i:s');
        // $tanggal2 = date_format($tgl2, 'Y-m-d');
        $perbedaan = $tgl2->diff($tanggal1)->format("%a");
        $perbedaan;
        // if($perbedaan > 3){
        $denda = $perbedaan * 1000;
        // }else{
        //     $denda = 0; 
        // }
        //update status pinjam
        $qKembaliPinjam = mysqli_query($koneksi, "UPDATE `tb_kembali` SET `tgl_kembali`= '$tanggalKembaliPinjam', `status`= 2, `denda`= '$denda' WHERE id_pinjam = '$idKembaliPinjam'");

        if($qKembaliPinjam && $updateStokKembali){
            $_SESSION["alert_kembali_pinjam"] = "alert_kembali_pinjam";
            header("location: ../template/external/adminlte/index.php?pinjam=pinjam");
        }else{
            echo "Gagal Kembali Pinjam";
        }
    }elseif(isset($_GET["setujuiPinjam"])){
        $idSetujuiPinjam = mysqli_real_escape_string($koneksi, $_GET["setujui"]);
        $idBukuSet = mysqli_real_escape_string($koneksi, $_GET["id_buku"]);
        $qSetujuiPinjam = mysqli_query($koneksi, "UPDATE `tb_kembali` SET `status`= 1 WHERE id_pinjam = '$idSetujuiPinjam'");

        if($qSetujuiPinjam){
            $_SESSION["alert_setujui_pinjam"] = "alert_setujui_pinjam";
            header("location: ../template/external/adminlte/index.php?pinjam=pinjam");
        }else{
            echo "Gagal Setujui Pinjam";
        }
    }elseif(isset($_POST["laporanPeminjaman"])){
        $nisLaporan = mysqli_real_escape_string($koneksi, $_POST["nisLaporan"]); 
        header("location: ../proses/laporan_peminjaman.php?nisLaporan=$nisLaporan");
        //laporan berdasarkan tanggal pinjam
    }elseif(isset($_POST["tglPinjamReport"])){
        $tglPinjamLaporan = mysqli_real_escape_string($koneksi, $_POST["tglPinjamLaporan"]);
        header("location: ../proses/laporan_peminjaman_semua.php?nisLaporan=$tglPinjamLaporan");
    }elseif(isset($_POST["tglKembaliReport"])){
        $tglPinjamLaporan = mysqli_real_escape_string($koneksi, $_POST["tglKembaliLaporan"]); 
        header("location: ../proses/laporan_peminjaman_kembali.php?nisLaporan=$tglPinjamLaporan");
    }elseif(isset($_POST["bukuReport"])){
        header("location: ../proses/laporan_buku.php");
    }elseif(isset($_GET["laporanku"])){
        $nLaporanku = mysqli_real_escape_string($koneksi, $_GET["laporanku"]);
        header("location: ../proses/laporan_ku.php?nisLaporan=$nLaporanku");
    }elseif(isset($_POST["usersReport"])){
        $search_users = mysqli_real_escape_string($koneksi, $_POST["search_users"]);
        header("location: ../proses/laporan_users.php?search_users=$search_users");
    }elseif(isset($_POST["bookReport"])){
        $search_book = mysqli_real_escape_string($koneksi, $_POST["search_buku"]); 
        header("location: ../proses/laporan_book.php?search_book=$search_book");
    }elseif(isset($_POST["pinjamReport"])){
        $search_pinjam = mysqli_real_escape_string($koneksi, $_POST["search"]);
        header("location: ../proses/laporan_search_pinjam.php?search_pinjam=$search_pinjam"); 
    }elseif(isset($_GET["profil"])){
        header("location: ../template/external/adminlte/index.php?profil");
    }elseif(isset($_GET["editProfil"])){
        header("location: ../template/external/adminlte/index.php?editProfil");
    }elseif(isset($_POST["ePProfil"])){
        $ePNis = mysqli_real_escape_string($koneksi, $_POST["ePNis"]);
        $ePNama_anggota = mysqli_real_escape_string($koneksi, $_POST["nama_anggota"]);
        if($_SESSION["cekStatus"] == 2){
            $ePId_jurusan = mysqli_real_escape_string($koneksi, $_POST["id_jurusan"]);
            $ePId_kelas = mysqli_real_escape_string($koneksi, $_POST["id_kelas"]);
            $ePId_offering = mysqli_real_escape_string($koneksi, $_POST["id_offering"]);
        }else{
            $ePId_jurusan = 0;
            $ePId_kelas = 0;
            $ePId_offering = 0;
        }
        
        $ePAlamat = mysqli_real_escape_string($koneksi, $_POST["alamat"]);

        if($_FILES['fProfil']['name'] == null){
            $ePquery = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota`='$ePNama_anggota',`id_jurusan`='$ePId_jurusan',`id_kelas`='$ePId_kelas',`id_offering`='$ePId_offering',`alamat`='$ePAlamat' WHERE nis = '$ePNis'");
            if($ePquery){
                header("location: ../template/external/adminlte/index.php?profil");
            }else{
                echo "Gagal Edit Profil";
            }
        }

        $ekstensi_diperbolehkan = array('png', 'jpg');
        $nama_files = $_FILES['fProfil']['name'];
        $x = explode('.', $nama_files);
        $ekstensi = strtolower(end($x));
        $waktu = date(date('Y-m-d'));
        $ukuran_files = $_FILES['fProfil']['size'];
        $file_tmp = $_FILES['fProfil']['tmp_name'];
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran_files < 1044070){
                move_uploaded_file($file_tmp, 'file/'.$nama_files);
                $ePquery = mysqli_query($koneksi, "UPDATE `tb_anggota` SET `nama_anggota`='$ePNama_anggota',`id_jurusan`='$ePId_jurusan',`id_kelas`='$ePId_kelas',`id_offering`='$ePId_offering',`alamat`='$ePAlamat', `foto` = '$nama_files' WHERE nis = '$ePNis'");
                if($ePquery){
                    $_SESSION["alert_profil"] = "alert_profil";
                    header("location: ../template/external/adminlte/index.php?profil");
                }else{
                    echo "Gagal Edit Profil";
                }
            }else{
                echo "
                    <script>
                        alert('Ukuran Foto Terlalu Besar')
                        history.back()
                    </script>
                ";
            }
        }
    }elseif(isset($_POST["status_denda"])){
       echo $nis_pinjam = mysqli_real_escape_string($koneksi, $_POST["id_kembali"]);  
        $status_denda = mysqli_query($koneksi, "UPDATE tb_kembali SET `status_denda` = '1' WHERE id_kembali = '$nis_pinjam'");
        if($status_denda){
            $_SESSION["alert_status_denda"] = "alert_status_denda";
            header("location: ../template/external/adminlte/index.php?pinjam=pinjam");
        }else{
            echo "Gagal Update Status Denda";
        }
    }
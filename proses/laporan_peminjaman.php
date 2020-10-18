<?php
    session_start();
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "LAPORAN PEMINJAMAN BERDASARKAN NAMA " . date("Y-m-d H:i:s a");
    $mpdf = new \Mpdf\Mpdf();
ob_start();
?>

    <div>
        <div style="float: left; width: 100px; position: relative">
            <img style="" src="grisa.png" alt="GRISA">
        </div>
        <div style="float: right; position: absolute">
            <h1 style="text-align: center; line-height: 0.1%">LAPORAN PERPUSTAKAAN GRISA</h1>
            <h2 style="text-align: center; line-height: 0.1%">SMK PGRI 1 NGAWI</h2>
            <h5 style="text-align: center; line-height: 0.1%">Telp & fax (0351)746081 | Email : tatausahasmkpgri1ngawi@gmail.com</h5>
            <h5 style="text-align: center; line-height: 0.1%">Homepage : www.smkpgri1ngawi.sch.id</h5>
        </div>
    </div>
    <hr>
    <!-- <div style="margin-left: 50%; margin-right: 50%"> -->
    <h3 style="text-align: center; line-height: 0.1%">LAPORAN PEMINJAMAN BERDASARKAN NAMA</h3>
    <div>
        <table style="text-align: center" border="1">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kode Buku</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Harus Kembali</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php
                    $nisLaporan = mysqli_real_escape_string($koneksi, $_GET["nisLaporan"]);

                    // $dari=date('Y-m-d',strtotime($_POST['tgl_dari']));
                    // $ke=date('Y-m-d',strtotime($_POST['tgl_ke']));
                    // $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k  JOIN tb_buku b ON k.id_buku = b.id_buku  JOIN tb_anggota a ON a.nis = k.nis WHERE  k.tgl_pinjam BETWEEN '$dari' and '$ke'");

                    if($nisLaporan == 0){
                        $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k JOIN tb_buku b ON k.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = k.nis");
                    }else{
                        $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k  JOIN tb_buku b ON k.id_buku = b.id_buku  JOIN tb_anggota a ON a.nis = k.nis WHERE k.nis = '$nisLaporan'");
                    }

                    $hitungDenda = mysqli_query($koneksi, "SELECT SUM(denda) as hitungDenda FROM tb_kembali WHERE nis = '$nisLaporan' AND status = 1");
                    $rowDenda = mysqli_fetch_array($hitungDenda);
                    $denda = $rowDenda["hitungDenda"];
                    $queryPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali WHERE nis = '$nisLaporan' AND `status` = 1");
                    $data = array();
                    while($rowPinjam = mysqli_fetch_array($queryPinjam)){
                        $dataP[] = $rowPinjam;
                    }
                    $jumlahBukuPinjam = count($dataP);
                    
                    $no = 0;
                    while($rPinjam = mysqli_fetch_array($qPinjam)){
                    $no++;
                    $nama = $rPinjam["nama_anggota"];
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $rPinjam["nis"] ?></td>
                        <td><?= $rPinjam["nama_anggota"] ?></td>
                        <td><?= $rPinjam["kd_buku"] ?></td>
                        <td><?= $rPinjam["judul_buku"] ?></td>
                        <td><?= date('d F Y', strtotime($rPinjam["tgl_pinjam"])) ?></td>
                        <td><?= date('d F Y', strtotime($rPinjam["tgl_harus_kembali"])) ?></td>
                        <td><?php if($rPinjam["tgl_kembali"] == ""){
                             echo "";
                            }else{
                                echo date('d F Y', strtotime($rPinjam["tgl_kembali"]));
                            } 
                            ?>
                        </td>
                        <td style=text-align:center>Rp.
                            <?php echo $denda = $rPinjam["denda"];  
                            if($rPinjam["status_denda"] == 0 && $rPinjam["status"] == 2 && $denda > 0){ 
                                echo "<br>";
                                echo "Belum Lunas";
                            }elseif($rPinjam["status_denda"] == 1 && $rPinjam["status"] == 2 && $denda > 0){
                                echo "<br>";
                                echo "Lunas";
                            } ?>
                        </td>
                    </tr>
                        
                        <td>
                            <?php
                                if($rPinjam["status"] == 0){
                                    echo "Belum Disetujui";
                                }
                                elseif($rPinjam["status"] == 1){
                                    echo "Belum Kembali";
                                }
                                else{
                                    echo "Kembali";
                                }
                            ?>
                        </td>
                        
                    
                            <?php } ?>
            </tr>
        </table>
    </div>

    <?php  
        $qAnggota = mysqli_query($koneksi, "SELECT nis FROM tb_anggota");
        $data = array();
        while($row = mysqli_fetch_array($qAnggota)){
            $data[] = $row;
        }
        if($nisLaporan == 0){
            echo "Jumlah Anggota : " . $count = count($data);
            echo "<br>";
            echo "Nama Petugas : " . $_SESSION["nama_anggota"];
        }else{
            echo $nama ." meminjam " . $jumlahBukuPinjam;
            echo "<br>";
            echo "Jumlah Anggota : " . $count = count($data);
            echo "<br>";
            echo "Nama Petugas : " . $_SESSION["nama_anggota"];
        }
    ?>

<?php
    $mpdf->setFooter('<div style="text-align: left; font-weight: bold; font-size: 8pt; font-style: italic;">
    SMK PGRI 1 Ngawi </div> {PAGENO}');//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');

    
    exit;
?>
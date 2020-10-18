<?php
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "LAPORAN BERDASARKAN TANGGAL PINJAM " . date("Y-m-d H:i:s a");
    $mpdf = new \Mpdf\Mpdf();
ob_start();
?>
    <div>
        <div style="float: left; width: 100px; position: relative">
            <img  src="grisa.png" alt="GRISA">
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
    <h3 style="text-align: center; line-height: 0.1%">LAPORAN PEMINJAMAN DAN PENGEMBALIAN</h3>
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
                <th>Stok</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php
                    $nisLaporan = mysqli_real_escape_string($koneksi, $_GET["nisLaporan"]);
                    $nisLaporan;
                    if($nisLaporan == 0){
                        $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k JOIN tb_buku b ON k.id_buku = b.id_buku JOIN tb_anggota a ON a.nis = k.nis WHERE k.status > 0");

                    }else{
                        $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_kembali k LEFT JOIN tb_buku b ON k.id_buku = b.id_buku LEFT JOIN tb_anggota a ON a.nis = k.nis WHERE k.tgl_pinjam='$nisLaporan'");
                    }
                    $no = 0;
                    while($rPinjam = mysqli_fetch_array($qPinjam)): ?>
                    <?= $no++ ?>
                    <tr>
                        <td style=text-align:center><?= $no ?></td>
                        <td style=text-align:center><?= $rPinjam["nis"] ?></td>
                        <td style=text-align:center><?= $rPinjam["nama_anggota"] ?></td>
                        <td style=text-align:center><?= $rPinjam["kd_buku"] ?></td>
                        <td style=text-align:center><?= $rPinjam["judul_buku"] ?></td>
                        <td style=text-align:center><?= date('d F Y', strtotime($rPinjam["tgl_pinjam"])) ?></td>
                        <td style=text-align:center><?= date('d F Y', strtotime($rPinjam["tgl_harus_kembali"])) ?></td>
                        <td style=text-align:center>
                            <?php 
                                if($rPinjam["tgl_kembali"] == ""){
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
                        <td style=text-align:center> <?=$rPinjam["stok"] ?></td>
                    </tr>
                    <td style=text-align:center>
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
                        </td>;
                        
                    <?php endwhile ?>
            </tr>
        </table>
    </div>

<?php  
    $data_stok = mysqli_query($koneksi, "SELECT SUM(stok) AS stok FROM tb_buku");
    $jml_stok = mysqli_fetch_array($data_stok);
    $qAnggota = mysqli_query($koneksi, "SELECT nis FROM tb_anggota");
    $data = array();
    while($row = mysqli_fetch_array($qAnggota)){
        $data[] = $row;
    }
    echo "Jumlah Buku : " . $jml_stok["stok"]. "<br>";
    echo "Jumlah Anggota : " . $count = count($data);
    // echo $nisLaporan = mysqli_real_escape_string($koneksi, $_GET["nisLaporan"]);

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
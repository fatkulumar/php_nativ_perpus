<?php
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "LAPORAN BUKU " . date("Y-m-d H:i:s a");
    $mpdf = new \Mpdf\Mpdf();
ob_start();
?>
    <div>
        <div style="float: left; width: 100px; position: relative">
            <img src="grisa.png" alt="GRISA">
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
    <h3 style="text-align: center; line-height: 0.1%">LAPORAN BUKU</h3>
        <table width="100%" style="text-align: center" class="table table-striped" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Lokasi Buku</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sum = mysqli_query($koneksi, "SELECT SUM(stok) as totalStok FROM tb_buku");
                    $row = mysqli_fetch_array($sum);
                    $totalStok = $row["totalStok"];
                    $no = 0;
                    $hitungBuku = mysqli_query($koneksi,"SELECT * FROM tb_buku b JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku");
                    while($rowHitungBuku = mysqli_fetch_array($hitungBuku)):
                    $no++;
                ?>
                <tr>
                    <td style="text-align:center"><?= $no ?></td>
                    <td style="text-align:center"><?= $rowHitungBuku["kd_buku"] ?></td>
                    <td style="text-align:center"><?= $rowHitungBuku["judul_buku"] ?></td>
                    <td style="text-align:center"><?= $rowHitungBuku["lokasi_buku"] ?></td>
                    <td style="text-align:center"><?= $rowHitungBuku["stok"] ?></td>
                    <?php $rowHitungBuku["stok"] ?>
                </tr>
                    <?php endwhile ?>
                <tr>
                    <td style="text-align:center" colspan="2"></td>
                    <td style="text-align:center">Jumlah Buku</td>
                    <td style="text-align:center"><?= $totalStok ?></td>
                </tr>
                <tr>
                    <td style="text-align:center" colspan="2">
                        <?php
                            $qJmlBkPinjam = mysqli_query($koneksi, "SELECT id_buku FROM tb_pinjam");
                            $dataJmlBkPinjam = array();
                            while($rowJmlBkPinjam = mysqli_fetch_array($qJmlBkPinjam)){
                                $dataJmlBkPinjam[] = $rowJmlBkPinjam;
                            }
                            $count = count($dataJmlBkPinjam);
                            echo "<td style=text-align:center>Jumlah Buku Yang Di Pinjam</td>"; 
                            echo "<td style=text-align:center>$count</td>";
                        
                        ?>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center" colspan="2"></td>
                    <td style="text-align:center">
                    Jumlah Anggota
                    </td>
                    <td style="text-align:center"x`>
                    <?php  
                        $qJmlAnggota = mysqli_query($koneksi, "SELECT nis FROM tb_anggota");
                        $dataJmlAnggota = array();
                        while($rowJmlAnggota = mysqli_fetch_array($qJmlAnggota)){
                            $dataJmlAnggota[] = $rowJmlAnggota;
                        }
                        echo $count = count($dataJmlAnggota);
                    ?>
                    </td>
                </tr>
            </tbody>

        </table>
    <!-- </div> -->

<?php
    $mpdf->setFooter('<div style="text-align: left; font-weight: bold; font-size: 8pt; font-style: italic;">
    SMK PGRI 1 Ngawi </div> {PAGENO}');//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
?>
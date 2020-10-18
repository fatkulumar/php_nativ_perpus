<?php
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "Laporan Perpustakaan " . date("Y-m-d H:i:s a");
    $mpdf = new \Mpdf\Mpdf();
ob_start();
?>
    <div>
        <h1 style="text-align: center; line-height: 0.1%">Laporan Perpustakaan</h1>
        <h2 style="text-align: center; line-height: 0.1%">SMK PGRI 1 NGAWI</h2>
    </div>
    <div>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Harus Kembali</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>
            <tr>
                <?php
                    $no = 0;
                    $qPinjam = mysqli_query($koneksi, "SELECT * FROM tb_pinjam p JOIN tb_buku b ON p.id_buku = b.id_buku");
                    while($rPinjam = mysqli_fetch_array($qPinjam)):
                    $no++; ?>
                        
                    <tr>
                        <td style=text-align:center><?= $no ?></td>
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
                        <td style=text-align:center><?= $rPinjam["denda"] ?></td>
                    </tr>
                        
                        <td style=text-align:center>
                        <?php
                            if($rPinjam["statusku"] == 0){
                                echo "Belum Disetujui";
                            }
                            elseif($rPinjam["statusku"] == 1){
                                echo "Kembali";
                            }
                            else{
                                echo "Diterima";
                            }
                        ?>
                        
                    <?php endwhile ?>
                ?>
            </tr>
        </table>
    </div>

<?php
    $mpdf->setFooter('<div style="text-align: left; font-weight: bold; font-size: 8pt; font-style: italic;">
    SMK PGRI 1 Ngawi </div> {PAGENO}');//penulisan output selesai, sekarang menutup mpdf dan generate kedalam format pdf
    $html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
    ob_end_clean();//Disini dimulai proses convert UTF-8, kalau ingin ISO-8859-1 cukup dengan mengganti $mpdf->WriteHTML($html);
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
    exit;
?>
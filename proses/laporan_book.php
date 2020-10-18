<?php
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "LAPORAN BUKU STOK " . date("Y-m-d H:i:s a");
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
    <h3 style="text-align: center; line-height: 0.1%">LAPORAN BUKU STOK</h3>
    <div style="margin-left: 0px">
        <table style="text-align: center" border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Buku</th>
                    <th>Judul Buku</th>
                    <th>Pengarang</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Stok</th>
                    <th>Lokasi Buku</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            
                if(isset($_GET["search_book"])){
                    // echo json_encode("umar");
                    $search = $_GET["search_book"];
                    if($search == ""){
                        $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_buku b JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku"); 
                    }else{
                        $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_buku b JOIN tb_lokasi_buku l ON b.id_lokasi_buku = l.id_lokasi_buku WHERE judul_buku LIKE '%".$search."%' OR penerbit LIKE '%".$search."%' OR pengarang LIKE '%".$search."%' OR kd_buku LIKE '%".$search."%'");
                    }
                $nomor = 0;
                while($data = mysqli_fetch_array($sql_search)){
                $nomor++
            ?>


            <tr>
            <td>
                <?= $nomor ?></td>
                <td><?= $data["kd_buku"] ?></td>
                <td><?= $data["judul_buku"] ?></td>
                <td><?= $data["pengarang"] ?></td>
                <td><?= $data["penerbit"] ?></td>
                <td><?= date("d F Y", strtotime($data["tahun_terbit"])) ?></td>
                <td><?= $data["stok"] ?></td>
                <td><?= $data["lokasi_buku"] ?></td>
            </tr>

            <?php } ?>
            <?php } ?>

            </tbody>
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
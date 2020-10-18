<?php
    include "../koneksi/koneksi.php";
    require_once __DIR__ . '/../template/external/mpdf/vendor/autoload.php';
    $nama_dokumen = "Laporan Perpustakaan Users" . date("Y-m-d H:i:s a");
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
    <h3 style="text-align: center; line-height: 0.1%">LAPORAN USERS</h3>
    <div style="margin-left: 0px">
        <table width="100%" style="text-align: center" border="1" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Offering</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            
            if(isset($_GET["search_users"])){
                // echo json_encode("umar");
                echo $search = $_GET["search_users"]; 
                if($search == ""){
                    $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON o.id_offering = a.id_offering JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan"); 
                }else{
                    $sql_search = mysqli_query($koneksi, "SELECT * FROM tb_user u JOIN tb_anggota a ON u.nis = a.nis JOIN tb_kelas k ON k.id_kelas = a.id_kelas JOIN tb_offering o ON o.id_offering = a.id_offering JOIN tb_jurusan j ON j.id_jurusan = a.id_jurusan WHERE username LIKE '%".$search."%' OR nama_anggota LIKE '%".$search."%'");
                }
                $nomor = 0;
                while($data = mysqli_fetch_array($sql_search)){
                $nomor++
            
            ?>


            <tr>
                <td><?= $nomor ?></td>
                <td><?= $data["username"] ?></td>
                <td><?= $data["nama_anggota"] ?></td>
                <td><?= $data["nama_jurusan"] ?></td>
                <td><?= $data["kelas"] ?></td>
                <td><?= $data["offering"] ?></td>
            </tr>

            <?php } ?>
            <?php } ?>
            
            </tbody>
        </table>

        <?php
            $jml_users = mysqli_query($koneksi, "SELECT * FROM tb_user");
            echo "Jumlah User : " . mysqli_num_rows($jml_users) . " Anggota, diantaranya 1 Kepala Sekolah";
        ?>

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
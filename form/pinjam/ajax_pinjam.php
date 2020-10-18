<table>

  <tr>

   <th>Nomor</th>

   <th>Nama</th>

  </tr>

<?php

$db = mysqli_connect('localhost','root','','db_skripsi2');

// if(){}
$search = $_GET['search'];

$sql_search = mysqli_query($db, "SELECT * FROM tb_kembali p JOIN tb_buku b ON p.id_buku = b.id_buku LIKE judul_buku = '%".$search."%' OR penerbit LIKE '%".$search."%'");

$no = 1;

while ($d = mysqli_fetch_array($sql_search)) {

?>

  

  <tr>

   <td><?=$no;?></td>

   <td><?=$d['judul_buku'];?></td>

  </tr>

<?php

$no++;

}

?>

 </table>
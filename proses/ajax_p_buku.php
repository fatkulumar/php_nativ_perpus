<?php
include "../koneksi/koneksi.php";
$id=$_GET['id'];
$qpbBuku = mysqli_query($koneksi, "SELECT * FROM tb_buku where id_buku='$id'");
$rpbBuku = mysqli_fetch_array($qpbBuku);

echo json_encode($rpbBuku);
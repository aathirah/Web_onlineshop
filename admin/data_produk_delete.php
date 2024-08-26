<?php
include"../koneksi.php";
$query = mysqli_query($con,"select * from tbl_produk where id_produk = '$_GET[id]'");
$rq = mysqli_fetch_array($query);
mysqli_query($con,"delete from tbl_produk where id_produk = '$_GET[id]'");

unlink('foto_produk/' .$rq['gambar']);

echo"<script language = 'JavaScript'>
            confirm('Data Produk Berhasil Dihapus!');
            document.location='dashboard_admin.php?page=data_produk';
            </script>";

?>
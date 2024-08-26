<?php
include"../koneksi.php";
if(isset($_POST['id_produk'])){
    foreach ($_POST['id_produk'] as $id){
        $query = "delete from tbl_produk where id_produk=?";
        $del = $con->prepare($query);
        $del->bind_param("i", $id);
        $del->execute();
    }
}
echo"<script language = 'JavaScript'>
            confirm('Data Produk Berhasil Dihapus!');
            document.location='dashboard_admin.php?page=data_produk';
            </script>";

?>
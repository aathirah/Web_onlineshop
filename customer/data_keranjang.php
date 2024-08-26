<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active"><?php echo"$rcus[nm_customer]";?></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
			<form method="POST">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
						<td>&nbsp;</td>
							<td class="image">Item</td>
							<td class="description">Nama Produk</td>
							<td class="price">Harga</td>
							<td class="quantity">Jumlah Beli</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php 
						include"../koneksi.php"; 
						$sqlp = mysqli_query($con, "Select * From tbl_keranjang INNER JOIN tbl_produk ON
						tbl_keranjang.id_produk = tbl_produk.id_produk INNER JOIN tbl_customer ON tbl_keranjang.id_customer = 
						tbl_customer.id_customer where tbl_keranjang.id_customer = '$rcus[id_customer]'");
						while ($rp = mysqli_fetch_array($sqlp)){


						
						 ?>
						<tr>
							<td><center>
							<input type="hidden" name="tgl_checkout[]" value="<?php echo date('Y-m-d')?>">
							<input type="checkbox" name="no_belanja[]" value="<?php echo"$rp[no_belanja]"?>">
							<input type="hidden" name="id_produk[]" value="<?php echo"$rp[id_produk]"?>">
							<input type="hidden" name="id_customer[]" value="<?php echo"$rp[id_customer]"?>">
							<input type="hidden" name="qty[]" value="<?php echo"$rp[qty]"?>">
							
						</center></td>

							<td class="cart_product">
								<a href=""><img src="<?php echo"../admin/foto_produk/$rp[gambar]"?>" alt="" width='100' height='100' /></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo"$rp[nm_produk]" ?></a></h4>
								<p>No Belanja :<?php echo"$rp[no_belanja]" ?> </p>
							</td>
							<td class="cart_price">
								<p><?php echo"$rp[harga]" ?></p>
							</td>
							<td class="cart_quantity">
							<p><?php echo"$rp[qty]" ?></p>
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo $rp['harga'] * $rp['qty']?></p>
								<input type="hidden" name="total[]" value="<?php echo $rp['harga'] * $rp['qty']?>">
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-fefault cart">
					<i class="fa fa-shopping-cart"></i>
					Checkout 
					</button>
					</form>

			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
include"../koneksi.php";
$no=$_POST['no_belanja'];
$idp=$_POST['id_produk'];
$idc=$_POST['id_customer'];
$qty=$_POST['qty'];
$total=$_POST['total'];
$no_referensi=rand(1, 999999);
$status="Belum di Bayar";

$jumlah=count($no);
for ($i=0; $i < $jumlah; $i++){
	$query = mysqli_query($con,"Insert into tbl_checkout(no_referensi, tgl_checkout, no_belanja, id_produk, id_customer, qty, total, status) values ('$no_referensi','$_POST[tgl_checkout]','$no[$i]', '$idp[$i]',
	 '$idc[$i]', '$qty[$i]', '$total[$i]', '$status') ");
	 $query1=mysqli_query($con,"delete from tbl_keranjang where no_belanja = '$no[$i]'");

}


      

      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Disimpan!');
            document.location='index.php?page=data_checkout';
            </script>";

  }


   
?>
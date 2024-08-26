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
					error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
						include"../koneksi.php"; 

						$tot = array();
						$sqlp = mysqli_query($con, "SELECT * FROM tbl_checkout 
                            INNER JOIN tbl_produk ON tbl_checkout.id_produk = tbl_produk.id_produk 
                            INNER JOIN tbl_customer ON tbl_checkout.id_customer = tbl_customer.id_customer 
                            WHERE tbl_checkout.id_customer = '$rcus[id_customer]' AND tbl_checkout.status='Belum di Bayar'");
						while ($rp = mysqli_fetch_array($sqlp)){
							$product_id = $rp['id_produk']; // Ambil ID produk sebagai kunci
    						$total = $rp['total']; // Ambil nilai 'total'
    						$tot[$product_id] = $total;



						
						 ?>
						<tr>
							
						<input type="hidden" name="no_referensi" value="<?php echo"$rp[no_referensi]"; ?>">
						<input type="hidden" name="tgl_bayar" value="<?php echo date('Y-m-d') ?>">
						
						
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
							<td class="cart_quantity" align="center">
							<p><?php echo"$rp[qty]" ?></p>
								
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo "$rp[total]"?></p>
								
								
							</td>
							
						</tr>
						<?php } ?>
						<tr>
					<td class="cart_price" colspan="3" rowspan="3" align="center"><p>Pembayaran Dapat Dilakukan Pada Rekening BRI Berikut : <br>an.e-shop:Aathirah<br>no.rek:123-456-789</p></td>
					<td class="cart_price" > <p>Total Belanja</p></td>
					<td class="cart_total"><p class="cart_total_price"><?php echo "Rp." .number_format(array_sum($tot),0,',','.')."" ?></p> 
					<?php
					$pajak=(array_sum($tot) * 10) / 100;
					$total= array_sum($tot) + $pajak + 10000;
					?>
					<input type="hidden" name="tot_bayar" value="<?php echo"$total"; ?>">
					<input type="hidden" name="status_bayar" value="Menunggu Konfirmasi">
					</td>

				</tr>
				
				<tr>
					
					<td class="cart_price" > <p>Pajak</p></td>
					<td class="cart_total"><p class="cart_total_price">10%</p> </td>
				</tr>
				<tr>
					
					<td class="cart_price" > <p>Ongkos Kirim </p></td>
					<td class="cart_total"><p class="cart_total_price">Rp.10.000</p> </td>
				</tr>
					</tbody>
					
				</table>
				
				<button type="submit" class="btn btn-fefault cart">
					<i class="fa fa-money"></i>
					Checkout 
					</button>
					</form>

			</div>
		</div>
	</section> <!--/#cart_items-->
	<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
include"../koneksi.php";

	$query = mysqli_query($con,"Insert into tbl_bayar(tgl_bayar, no_referensi, tot_bayar, status_bayar) values ('$_POST[tgl_bayar]','$_POST[no_referensi]', '$_POST[tot_bayar]',
	'$_POST[status_bayar]')");

	 $query1=mysqli_query($con,"update tbl_checkout set status ='Sudah di Bayar' where no_referensi ='$_POST[no_referensi]'");

      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Disimpan!');
            document.location='index.php?page=data_status';
            </script>";

  }


   
?>
	
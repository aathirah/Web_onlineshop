<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active"><?php echo"$rcus[nm_customer]";?></li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
		<form method="POST" action="<?php echo "cetak_kwitansi.php?&id=$rcus[id_customer]" ?>" target='_blank' >
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
						include"../koneksi.php"; 
						$tot = array();
						$sqlp = mysqli_query($con, "Select * From tbl_checkout INNER JOIN tbl_bayar ON tbl_bayar.no_referensi = 
						tbl_checkout.no_referensi INNER JOIN tbl_produk ON
						tbl_checkout.id_produk = tbl_produk.id_produk INNER JOIN tbl_customer ON tbl_checkout.id_customer = 
						tbl_customer.id_customer where tbl_checkout.id_customer = '$rcus[id_customer]' AND tbl_checkout.status='Sudah di Bayar'");
						while ($rp = mysqli_fetch_array($sqlp)){
                            $status=$rp['status_bayar'];
							$product_id = $rp['id_produk']; // Ambil ID produk sebagai kunci
    						$total = $rp['total']; // Ambil nilai 'total'
    						$tot[$product_id] = $total;




						
						 ?>
						<tr>
							
						
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
					<td class="cart_price" colspan="3" rowspan="3" align="center"><p>Status Pembelian Anda Saat Ini Adalah: <b><?php echo $status ?></b></p></td>
					<td class="cart_price" > <p>Total Belanja</p></td>
					<td class="cart_total">
						<p class="cart_total_price"><?php echo "Rp." .number_format(array_sum($tot),0,',','.').""?></p> </td>
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
					<i class="fa fa-info"></i>
					Cetak Kwitansi
					</button>
					</form>

			</div>
		</div>
	</section> <!--/#cart_items-->
	
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>KATEGORI</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							<
							
							<!--/category-products-->
							<?php
							include"../koneksi.php";
							$sqlk = mysqli_query($con, "Select * From tbl_kategori");
                      while($rk = mysqli_fetch_array($sqlk)){
							
							?>
							<div class="panel panel-ddefault">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="#"> 
										<?php echo "$rk[nm_kategori]"?>
									</a></h4>
								</div>
							</div>
							<?php } ?>
						
	
					</div>
				</div>
				</div>

				<form method="POST">
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
                        <?php 
						include"../koneksi.php"; 
						$sqlp = mysqli_query($con, "Select * From tbl_produk where id_produk='$_GET[id]'");
						$rp = mysqli_fetch_array($sqlp);

						$no_belanja = 'EC-' .rand(1,99999).'';
						$tgl = date('y-m-d');
						$cus = $rcus['id_customer'];
						 ?>
						<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo"../admin/foto_produk/$rp[gambar]"?>" alt="" />
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo"$rp[nm_produk]" ?></h2>
								<p>Kode Produk : <?php echo"$rp[kd_produk]" ?></p>
								<span>
									<span>Rp.<?php echo"$rp[harga]" ?></span>
									<label>Qty : </label>
									<input type="hidden" name="no_belanja" value="<?php echo"$no_belanja" ?>" />
									<input type="hidden" name="tgl_belanja" value="<?php echo"$tgl" ?>" />
									<input type="hidden" name="id_produk" value="<?php echo"$rp[id_produk]" ?>" />
									<input type="hidden" name="id_customer" value="<?php echo"$cus" ?>" />
									<input type="text" name="qty" />
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Tambahkan 
									</button>
								</span>
								<p><b>Jumlah Stok:</b> <?php echo"$rp[stok]" ?></p>
								<p><b>Keterangan:</b> <?php echo"$rp[ket]" ?></p>
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
						
						
		
						
						
					</div><!--features_items-->
					
				
				</div>
				</form>
			</div>
		</div>
	</section>
	<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
include"../koneksi.php";


      $query = mysqli_query($con,"Insert into tbl_keranjang(no_belanja, tgl_belanja, id_produk, id_customer, qty) values ('$_POST[no_belanja]','$_POST[tgl_belanja]', '$_POST[id_produk]', '$_POST[id_customer]', '$_POST[qty]') ");

      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Disimpan!');
            document.location='index.php?page=data_keranjang';
            </script>";

  }


   
?>
	
	
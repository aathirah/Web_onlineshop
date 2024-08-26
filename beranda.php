<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1>Toko Anyar</h1>
									<h2>Selamat datang di Toko Online Terbaik!</h2>
									<p>Temukan beragam koleksi produk berkualitas tinggi, mulai dari Kaos, Kemeja, Baju Bayi, Celana. Dapatkan penawaran eksklusif, diskon menarik, dan hadiah istimewa untuk setiap pembelian. Pengiriman cepat dan aman. Jangan lewatkan
									 kesempatan untuk berbelanja dengan harga terjangkau dan kualitas terbaik hanya di toko kami! </p>
									<button type="button" class="btn btn-default get">Dapatkan Sekarang</button>
								</div>
								<div class="col-sm-6">
									<img src="asset/images/home/paperbag.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1>Toko Anyar</h1>
									<h2>Upgrade Gaya Anda dengan Pakaian Terbaru! </h2>
									<p>Apa pun kesukaan dan gaya Anda, kami memiliki segala yang Anda butuhkan untuk tampil percaya diri dan stylish.
									Dari busana kasual, pakaian formal, hingga pakaian tidur, kami menyediakan beragam pilihan pakaian. Dapatkan desain terkini dan material berkualitas 
									dengan harga yang terjangkau. Tak hanya itu, nikmati layanan pelanggan yang ramah dan pengalaman berbelanja online yang
									menyenangkan. Jadi, segera perbarui lemari pakaian Anda dengan produk-produk unggulan dari toko kami! </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="asset/images/home/koleksi.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1>Toko Anyar</h1>
									<h2>Dapatkan Produk Terbaik dengan Harga Terjangkau!</h2>
									<p>Kami Bangga dengan Produk-produk yang Dijual di Toko Online Kami,
									Karena Semua Produk Melalui Proses Seleksi Ketat untuk Memastikan Kualitas dan Kepuasan Pelanggan Tercapai. Kami Selalu Berusaha Memberikan Pengalaman Belanja Terbaik bagi Anda dengan Kombinasi Produk Berkualitas, Pelayanan Prima, dan Harga yang Bersaing. Mari Jadi Bagian dari
									Keluarga Pelanggan Kami yang Setia dan Dapatkan Manfaat Istimewa yang 
									Hanya Kami Hadirkan untuk Anda! </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="asset/images/home/diskon.png" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>KATEGORI</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							
							
							
							<!--/category-products-->
							<?php
							include"koneksi.php";
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
					
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="#"> <span class="pull-right"></span>Aerostreet</a></li>
									<li><a href="#"> <span class="pull-right"></span>Aero Kids</a></li>
									<li><a href="#"> <span class="pull-right"></span>Cool Kids</a></li>
									<li><a href="#"> <span class="pull-right"></span>Ellipsesinc</a></li>
									<li><a href="#"> <span class="pull-right"></span>Erigo</a></li>
									<li><a href="#"> <span class="pull-right"></span>Kennai kids</a></li>
									<li><a href="#"> <span class="pull-right"></span>Nikita</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
						<div class="shipping text-center"><!--shipping-->
							<img src="asset/images/home/bigsale.png" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<?php
							include"koneksi.php";
						$sqlp = mysqli_query($con, "Select * From tbl_produk ");
                      while($rp = mysqli_fetch_array($sqlp)){
						?>
						
		
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
									<img width="100" src="admin/foto_produk/<?= $rp['gambar']?>" alt=""></td>
                                                
										<h2><?php echo"Rp. ".number_format($rp['harga'],0,',','.')."";?></h2>
										<p><?php echo"$rp[nm_produk]";?></p>
										<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo"Rp. ".number_format($rp['harga'],0,',','.')."";?></h2>
											<p><?php echo"$rp[nm_produk]";?></p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<img src="images/home/sale.png" class="new" alt="" />
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
						
						<?php } ?>

						
					</div><!--features_items-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	
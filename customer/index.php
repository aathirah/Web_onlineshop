<?php
session_start();
if (!isset($_SESSION['namacus'])) {
	echo "<script language='JavaScript'>
         confirm('Anda Harus Login');
        window.location.href ='../index.php';
         </script>";
}

include "../koneksi.php";
$sqlcus = mysqli_query($con, "SELECT * FROM tbl_customer WHERE username = '$_SESSION[namacus]'");
$rcus = mysqli_fetch_assoc($sqlcus);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | Onlineshop</title>
	<link href="../asset/css/bootstrap.min.css" rel="stylesheet">
	<link href="../asset/css/font-awesome.min.css" rel="stylesheet">
	<link href="../asset/css/prettyPhoto.css" rel="stylesheet">
	<link href="../asset/css/price-range.css" rel="stylesheet">
	<link href="../asset/css/animate.css" rel="stylesheet">
	<link href="../asset/css/main.css" rel="stylesheet">
	<link href="../asset/css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="../asset/images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../asset/images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../asset/images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../asset/images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="../asset/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="../asset/images/home/logo1.png" alt="" /></a>
						</div>

					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
								<li><a href="index.php"><i class="fa fa-user"></i>Selamat Datang,<?php echo "$rcus[nm_customer]"; ?></a></li>
								<li><a href="index.php?page=data_status"><i class="fa fa-money"></i> Status Belanja</a></li>
								<li><a href="index.php?page=data_checkout"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="index.php?page=data_keranjang"><i class="fa fa-shopping-cart"></i>Keranjang</a></li>

								<li><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
									<ul role="menu" class="sub-menu">
										<li><a href="index.php?page=data_status">Status Belanja</a></li>
										<li><a href="index.php?page=data_checkout">Checkout</a></li>
										<li><a href="checkout.html">Keranjang</a></li>
										
										<li><a href="logout.php">Logout</a></li>
									</ul>
								</li>
								
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search" />
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<?php
	if (isset($_GET['page'])) {
		$page = $_GET['page'];

		switch ($page) {

			case 'form_belanja':
			include 'form_belanja.php';
			break;

			case 'data_keranjang':
			include 'data_keranjang.php';
			break;

			case 'data_checkout':
			include 'data_checkout.php';
			break;

			case 'data_status':
			include 'data_status.php';
			break;



			default:
				echo "Maaf, Halaman Tidak Ditemukan";
		}
	} else {
		include "beranda.php";
	}
	?>

	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="single-widget">
							<h3>Toko Anyar</h3>
							<p>RT. 01/03, Jl. Raya Sunan Gunung Jati Blok Kecitran, Purwawinangun,
        						Kec. Suranenggala, Kabupaten Cirebon, Jawa Barat 45152</p>
						</div>
					</div>
							

						
					

		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Layanan Pelangan</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Bantuan</a></li>
								<li><a href="#">Metode Pembayaran</a></li>
								<li><a href="#">Gratis Ongkir</a></li>
								<li><a href="#">Pengembalian Barang</a></li>
								
							</ul>
						</div>
					</div>
					
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Jelajahi Toko</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Tentang Kami</a></li>
								<li><a href="#">Kenbijakan Privacy</a></li>
								<li><a href="#">Flash Sale</a></li>
								<li><a href="#">kontak Media</a></li>
								
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="single-widget">
						<h2>Metode Pembayaran</h2>
							<img src="../asset/images/home/bank.png" alt="" />
							
						</div>
					</div>
					

				</div>
			</div>
		</div>



	</footer><!--/Footer-->



	<script src="../asset/js/jquery.js"></script>
	<script src="../asset/js/bootstrap.min.js"></script>
	<script src="../asset/js/jquery.scrollUp.min.js"></script>
	<script src="../asset/js/price-range.js"></script>
	<script src="../asset/js/jquery.prettyPhoto.js"></script>
	<script src="../asset/js/main.js"></script>
	<script src="../asset/js/contact.js"></script>
</body>

</html>
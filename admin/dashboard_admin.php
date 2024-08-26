<?php
  session_start();
  if(!isset($_SESSION['namaadmin'])){
      echo"<script language = 'JavaScript'>
           confirm('Anda Harus Login');
          document.location='index.php';
         </script>";

  }
  include"../koneksi.php";
  $sqladmin= mysqli_query($con, "Select * from tbl_user where username = '$_SESSION[namaadmin]'");
  $radmin = mysqli_fetch_assoc($sqladmin);
  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="../asset/css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-brown">
            <a class="navbar-brand" href="index.html">Halaman Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button
            ><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo"$radmin[nm_user]"; ?> <i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-brown" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Halaman Utama</div>
                            <a class="nav-link" href="dashboard_admin.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                               Beranda</a
                            >
                            <div class="sb-sidenav-menu-heading">Master Data</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Produk Onlineshop
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="dashboard_admin.php?page=data_produk">Data Produk</a>
                                <a class="nav-link" href="dashboard_admin.php?page=data_kategori">Kategori Produk</a>
                                <a class="nav-link" href="layout-static.html">Promo</a></nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuser" aria-expanded="false" aria-controls="collapseuser"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Data Costumer
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseuser" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="dashboard_admin.php?page=data_customer">Costumer</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Administrator</a>
                                
                            </div>
                            
                            
                                    
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Pembelian Barang</a
                            ><a class="nav-link" href="dashboard_admin.php?page=data_bayar"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Pembayaran Barang</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Masuk Sebagai:</div>
                        Welcome,<?php echo"$radmin[nm_user]"; ?> 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">

            <?php 
            if(isset($_GET['page'])){
              $page = $_GET['page'];
  
              switch($page){
                case 'data_customer':
                include 'data_customer.php';
                break;

                case 'data_produk':
                include 'data_produk.php';
                break;

                case 'data_produk_add':
                include 'data_produk_add.php';
                break;
                
                case 'data_produk_edit':
                include 'data_produk_edit.php';
                break;

                case 'data_produk_delete':
                include 'data_produk_delete.php';
                break;

                case 'data_produk_multi_delete':
                include 'data_produk_multi_delete.php';
                break;

                case 'data_kategori':
                include 'data_kategori.php';
                break;

                case 'data_kategori_add':
                include 'data_kategori_add.php';
                break;

                case 'data_bayar':
                include 'data_bayar.php';
                break;

                case 'data_bayar_detail':
                include 'data_bayar_detail.php';
                break;
            
    

          

          
  
                
                default: 
                echo"Maaf, Halaman Tidak Ditemukan";
  
              }
            }
            else{
              include"beranda.php";
            }
            ?>
                
               
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="asset/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

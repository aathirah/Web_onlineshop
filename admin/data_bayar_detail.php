<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Detail Data Pembayaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detail Data Pembayaran</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Detail Data Pembayaran</div>
                            <div class="card-body">
                                <div class="table-responsive">
                   
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                                    <thead>
                                            <tr>
                                                
                                                <th>Item</th>
                                                <th>No Belanja</th>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
						include"../koneksi.php"; 
						
						$sqlp = mysqli_query($con, "Select * From tbl_checkout INNER JOIN tbl_bayar ON tbl_bayar.no_referensi =tbl_checkout.no_referensi INNER JOIN tbl_produk ON
						tbl_checkout.id_produk = tbl_produk.id_produk INNER JOIN tbl_customer ON tbl_checkout.id_customer = 
						tbl_customer.id_customer where tbl_checkout.no_referensi='$_GET[id]'");
						while ($rp = mysqli_fetch_array($sqlp)){
                            $total=$rp['tot_bayar']
							



						
						 ?>
                                            <tr>
                                            
                                                <td><img width="100" src="foto_produk/<?= $rp['gambar']?>" alt=""></td>
                                                <td><?php echo"$rp[no_belanja]";?></td>
                                                <td><?php echo"$rp[nm_produk]";?></td>
                                                <td><?php echo"$rp[harga]";?></td>
                                                <td><?php echo"$rp[qty]";?></td>
                                                <td><?php echo"$rp[total]";?></td>
                                                
                                                
                                            </tr>
                                            <?php }?>
                                            <tr>
                                                <td colspan="5" >Total Pembayaran + Pajak dan Ongkos</td>
                                                <td><?php echo "$total";?></td>
                                                
                                            </tr>
                                            
                                        </tbody>
                      </form>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <main>
                    <div class="container-fluid">
                        
                        
                        
                        <div class="card mb-4">
                            <form method="POST" >
          
          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Verifikasi Pembayaran Customer :</Label>
                <input type="hidden" name="no_referensi" value="<?php echo "$_GET[id]"?>">
                <select  class="form-control" name="status_bayar" >
                    <option>Pilih Verifikasi</option>
                    <option value="terkonfirmasi">Terkonfirmasi</option>
                    <option value="belum terkonfirmasi">Belum Terkonfirmasi</option>
                </select>
          </div>
          </div>
          </div>

         

          

        

          </div>
          </div>


<center>
    <div class="form-group mt-4 mb-8">
<input type="submit" name="proses" class="btn btn-primary" value="Verifikasi">
<button type="reset" class="btn btn-dark">Reset</button>
</div>
</center>
          
          
        </form>
        
                            </div>
                        </div>
                    </div>
                </main>

<?php

if($_SERVER['REQUEST_METHOD']== "POST"){
include"../koneksi.php";


      $query = mysqli_query($con,"update tbl_bayar set status_bayar= '$_POST[status_bayar]' where no_referensi='$_POST[no_referensi]' ");

      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Disimpan!');
            document.location='dashboard_admin.php?page=data_bayar';
            </script>";

  }


   
?>
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Produk Onlineshop</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Barang </div>
                            <div class="card-body">
                                <div class="table-responsive">
                               
        
                          
                                <form action="dashboard_admin.php?page=data_produk_multi_delete" method="POST">
                                    
                                        <a href="dashboard_admin.php?page=data_produk_add" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data</a>  &nbsp;&nbsp;
                                        
                                        <button type="Submit" name="btn_delete" id="btn_delete" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda Ingin Menghapus data produk..?')"><i class="fas fa-fw fa-trash"></i>Hapus Data</button>
                                        <p></p>
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th></th>
                                                <th>No</th>
                                                <th>Foto Produk</th>
                                                <th>Kode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th></th>
                                                <th>No</th>
                                                <th>Foto Produk</th>
                                                <th>Kode Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                      include"../koneksi.php";
                      $no=1;
                      $sqlp = mysqli_query($con, "Select * From tbl_produk INNER JOIN tbl_kategori ON
                       tbl_produk.kategori = tbl_kategori.id_kategori");
                      while($rp = mysqli_fetch_array($sqlp)){
                        
                      ?>
                                            <tr>
                                            <td><input type="checkbox" name="id_produk[]" value="<?php echo"$rp[id_produk]";?>"></td>
                                                <td><?php echo"$no";?></td>
                                                <td><img width="100" src="foto_produk/<?= $rp['gambar']?>" alt=""></td>
                                                
                                                <td><?php echo"$rp[kd_produk]";?></td>
                                                <td><?php echo"$rp[nm_produk]";?></td>
                                                <td><?php echo"$rp[nm_kategori]";?></td>
                                                <td><?php echo"Rp. ".number_format($rp['harga'],0,',','.')."";?></td>
                                                <td><?php echo"$rp[stok]";?></td>
                                                <td>
                                                <a href="<?php echo "dashboard_admin.php?page=data_produk_edit&&id=$rp[id_produk]"; ?>" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                          <a href="<?php echo "dashboard_admin.php?page=data_produk_delete&id=$rp[id_produk]"; ?>" onclick="javascript: return confirm(' Apakah Anda Ingin Menghapus data produk <?php echo"$rp[nm_produk]";?>')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> </a>
                        </td>
                                            </tr>
                                            <?php $no++; }?>
                                            
                                            
                                        </tbody>
                                    </table>
                      </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    
                </main>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$('.check_all').click(function(){
			$('.chk_boxes1').prop('checked', this.checked);
		});
	});
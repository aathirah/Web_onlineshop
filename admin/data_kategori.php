<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kategori Produk</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Kategori Produk</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    
                                    
                                    <form action="dashboard_admin.php?page=data_kategori_multi_delete" method="POST">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <a href="dashboard_admin.php?page=data_kategori_add" class="btn btn-primary"><i class="fas fa-plus mr-1"></i>Tambah Data</a>  &nbsp;&nbsp;
                                        
                                        <button type="Submit" name="btn_delete" id="btn_deleete" class="btn btn-danger" onclick="javascript:
                                        return confirm(' Apakah Anda Ingin Menghapus data Traveler <?php echo"$rk[nm_kategori]";?>')<i class="fas fa-trash mr-1"></i>Hapus Data</button> 
                                        <p></p>
                                    <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Keterangan</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th></th>
                                            <th>No</th>
                                                <th>Nama Kategori</th>
                                                <th>Keterangan</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                      include"../koneksi.php";
                      $no=1;
                      $sqlk = mysqli_query($con, "Select * From tbl_kategori");
                      while($rk = mysqli_fetch_array($sqlk)){


                      ?>
                                            <tr>
                                            <td><input type="checkbox" name="id_kategori[]" value="<?php echo"$rk[id_kategori]";?>"></td>
                                                <td><?php echo"$no";?></td>
                                                <td><?php echo"$rk[nm_kategori]";?></td>
                                                <td><?php echo"$rk[ket]";?></td>
                                                
                                                <td>
                          <a href="<?php echo "index.php?page=data_mahasiswa_update&&idm=$rmhs[id_mhs]"; ?>" class="btn btn-warning"><i class="fas fa-fw fa-edit"></i></a>
                          <a href="<?php echo "index.php?page=data_mahasiswa_delete&&idm=$rmhs[id_mhs]"; ?>" onclick="javascript: return confirm(' Apakah Anda Ingin Menghapus data mahasiswa <?php echo"$rmhs[nm_mahasiswa]";?>')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i> </a>
                        </td>
                                            </tr>
                                            <?php $no++; }?>
                                            
                                            
                                        </tbody>
                      </form>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
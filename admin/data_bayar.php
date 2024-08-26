<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Pembayaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Pembayaran</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>Data Pembayaran Belanja Customer</div>
                            <div class="card-body">
                                <div class="table-responsive">
                   
                                    
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
                                    <thead>
                                            <tr>
                                                
                                                <th>No</th>
                                                <th>No Referensi</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Total Bayar</th>
                                                <th>Status</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            
                                                <th>No</th>
                                                <th>No Referensi</th>
                                                <th>Tanggal Bayar</th>
                                                <th>Total Bayar</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        <?php
                      include"../koneksi.php";
                      $no=1;
                      $sqlb = mysqli_query($con, "Select * From tbl_bayar");
                      while($rb = mysqli_fetch_array($sqlb)){


                      ?>
                                            <tr>
                                            
                                                <td><?php echo"$no";?></td>
                                                <td><?php echo"$rb[no_referensi]";?></td>
                                                <td><?php echo"$rb[tgl_bayar]";?></td>
                                                <td><?php echo"$rb[tot_bayar]";?></td>
                                                <td><?php echo"$rb[status_bayar]";?></td>
                                                <?php
                                                if($rb['status_bayar']!= "Terkonfirmasi"){
                                                    
                                                
                                                    
                                            
                                            
                                                ?>
                                                
                                                <td>
                                                <a href="<?php echo "dashboard_admin.php?page=data_bayar_detail&id=$rb[no_referensi]"; ?>" class="btn btn-success"><i class=""></i>Verifikasi</a>
                          <?php } else{
                            echo"<td>&nbsp;</td>";

                          }
                          ?>
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
<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kategori Produk</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Kategori </div>
                            <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
          
          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Nama Kategori :</Label>
                <input type="text" class="form-control" name="nm_kategori" placeholder="Masukan Nama Kategori">
          </div>
          </div>
          </div>

         

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Keterangan Kategori :</Label>
                <textarea class="form-control" name="ket" placeholder="Masukan Keterangan Kategori"></textarea>
          </div>

          </div>
          </div>

        

          </div>
          </div>


<center>
    <div class="form-group mt-4 mb-8">
<input type="submit" name="proses" class="btn btn-primary" value="Simpan Data">
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


      $query = mysqli_query($con,"Insert into tbl_kategori(nm_kategori,ket) values ('$_POST[nm_kategori]','$_POST[ket]') ");

      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Disimpan!');
            document.location='dashboard_admin.php?page=data_kategori';
            </script>";

  }


   
?>
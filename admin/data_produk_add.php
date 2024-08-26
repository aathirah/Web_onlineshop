<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Produk Onlineshop</li>
                        </ol>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Barang </div>
                            <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
          
          <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
                <Label>Kode Produk :</Label>
                <input type="text" class="form-control" name="kd_produk" placeholder="Masukan Kode Produk">
          </div>
          </div>
          
          <div class="col-md-6">
          <div class="form-group">
                <Label>Kategori Produk :</Label>
                <select class="form-control" name="kategori">
            <option>~pilih Kategori Produk~</option>
            <?php
            include"../koneksi.php";
            $sqlk = mysqli_query($con, "Select * From tbl_kategori");
                      while($rk = mysqli_fetch_array($sqlk)){
                        ?>
            <option value="<?php echo "$rk[id_kategori]"; ?>"><?php echo "$rk[nm_kategori]"; ?></option>
            
            <?php } ?>
            </select>
          </div>
          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Nama Produk :</Label>
                <input type="text" class="form-control" name="nm_produk" placeholder="Masukan Nama Produk">
          </div>
          </div>
          </div>

          <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
                <Label>Harga Produk :</Label>
                <input type="number" class="form-control" name="harga" placeholder="000.000.000">
          </div>

          </div>
        
          <div class="col-md-6">
          <div class="form-group">
                <Label>Stok Produk :</Label>
                <input type="number" class="form-control" name="stok" placeholder="000">
          </div>

          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Keterangan Produk :</Label>
                <textarea class="form-control" name="ket" placeholder="Masukan Keterangan Produk"></textarea>
          </div>

          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Gambar Produk  :</Label>
                <input type="file" class="form-control" name="gambar">
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

    
    $format = array('jpg','png','jpeg','gif');
    $nama = $_FILES['gambar']['name'];
    $x    = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran   = $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];
    $angka_acak = rand(1,9999);
    $nama_baru = $angka_acak.'-'.$nama;
    $folder  = "foto_produk/";
     
    if(in_array($ekstensi, $format) === TRUE){
        if($ukuran < 100000000 ){
            move_uploaded_file($file_tmp, $folder .$nama_baru);

            $query = mysqli_query($con,"Insert into tbl_produk(kd_produk, nm_produk, kategori, harga, stok, ket, gambar) values ('$_POST[kd_produk]','$_POST[nm_produk]','$_POST[kategori]',
            '$_POST[harga]','$_POST[stok]','$_POST[ket]','$nama_baru') ");

            if($query){
                echo"<script language = 'JavaScript'>
                confirm('Data Customer Berhasil Disimpan!');
                document.location='dashboard_admin.php?page=data_produk';
                </script>";

            }
            else{
                echo"File Gagal di Upload!";
              }
        }
        else{
            echo"Mohon Maaf, Ukuran File Anda Terlalu Besar !";
          }
    }
    else{
        echo"Mohon Maaf, Ekstensi File Yang Anda Upload Tidak Sesuai!";
    }



    
    
          
    
          
    
      }
?>
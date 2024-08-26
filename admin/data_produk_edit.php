<<?php 
Include"../koneksi.php";
$sqlp = mysqli_query($con, "select * from tbl_produk where id_produk = $_GET[id]");
$rp = mysqli_fetch_array($sqlp);

 ?>


<main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Data Produk Edit</h1>
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
                <input type="hidden" class="form-control" name="id_produk" value="<?php echo "$rp[id_produk]"?>">
                <input type="text" class="form-control" name="kd_produk" value="<?php echo "$rp[kd_produk]"?>">
          </div>
          </div>
          
          <div class="col-md-6">
          <div class="form-group">
                <Label>Kategori Produk :</Label>
                <select class="form-control" name="kategori">
            <option value="<?php echo "$rp[kategori]"?>">~<?php echo "$rp[kategori]"?>~</option>
            <option value="Baju">Baju</option>
            <option value="Celana">Celana</option>
            <option value="Sepatu">Sepatu</option>
            <option value="Jilbab">Jilbab</option>
            </select>
          </div>
          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Nama Produk :</Label>
                <input type="text" class="form-control" name="nm_produk" value="<?php echo "$rp[nm_produk]"?>">
          </div>
          </div>
          </div>

          <div class="form-row">
          <div class="col-md-6">
          <div class="form-group">
                <Label>Harga Produk :</Label>
                <input type="number" class="form-control" name="harga" value="<?php echo "$rp[harga]"?>">
          </div>

          </div>
        
          <div class="col-md-6">
          <div class="form-group">
                <Label>Stok Produk :</Label>
                <input type="number" class="form-control" name="stok" value="<?php echo "$rp[stok]"?>">
          </div>

          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Keterangan Produk :</Label>
                <textarea class="form-control" name="ket" ><?php echo "$rp[ket]"?></textarea>
          </div>

          </div>
          </div>

          <div class="form-row">
          <div class="col-md-12">
          <div class="form-group">
                <Label>Gambar Produk  :</Label>
                <input type="file" class="form-control" name="gambar">
          </div>
          <img width="100" src="foto_produk/<?= $rp['gambar']?>" alt="">
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
    if(!$file_tmp==""){
    if(in_array($ekstensi, $format) === TRUE){
        if($ukuran < 60000 ){
            move_uploaded_file($file_tmp, $folder .$nama_baru);
            $query = mysqli_query($con,"select * from tbl_produk where id_produk = '$_GET[id]'");
      $data_file = $query->fetch_array();
      unlink('foto_produk' .$data_file['gambar']);


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
else{
    $query = mysqli_query($con, "update tbl_produk set kd_produk='$_POST[kd_produk]', nm_produk='$_POST[nm_produk]', kategori='$_POST[kategori]', harga='$_POST[harga]', stok='$_POST[stok]', ket='$_POST[ket]' where id_produk = '$_GET[id]'");

    if($query){
      echo"<script language = 'JavaScript'>
            confirm('Data Berhasil Diupdate!');
            document.location='dashboard_admin.php?page=data_produk';
            </script>";
    }
    else{
        echo"FILE GAGAL DI UPLOAD";
    }
}



    
    
          
    
          
    
      }
?>
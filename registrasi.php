
	 
	 <div class="container">
    	
	    	  	
    		<div class="row">  	
	    		<div class="col-sm-12">
	    			
	    				<h2 class="title text-center">Buat Akun Anda</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form method="POST">
						<div class="form-group col-md-12">
							<label>Nama Customer: </label>
				                <input type="text" name="nm_customer" class="form-control" required="required" placeholder="Masukan Nama Anda">
				            </div>
							<div class="form-group col-md-12">
							<label>Username: </label>
				                <input type="text" name="username" class="form-control" required="required" placeholder="Masukan Username Anda">
				            </div>
							<div class="form-group col-md-12">
							<label>Password: </label>
				                <input type="password" name="password" class="form-control" required="required" placeholder="Masukan Password Anda">
				            </div>
							<div class="form-group col-md-12">
							<label>Jenis Kelamin: </label><p></p>
				                <input type="radio" name="gender" value="Laki-Laki">Laki-Laki &nbsp;&nbsp;&nbsp;
								<input type="radio" name="gender" value="Perempuan">Perempuan
				            </div>
							<div class="form-group col-md-12">
							<label>Email: </label>
				                <input type="email" name="email" class="form-control" required="required" placeholder="Masukan Email Anda">
				            </div>
							<div class="form-group col-md-12">
							<label>No Handphone: </label>
				                <input type="number" name="nohp" class="form-control" required="required" placeholder="Masukan No Handphone Anda">
				            </div>
							<div class="form-group col-md-12">
							<label>Alamat: </label>
				                <textarea name="alamat" class="form-control" required="required" placeholder="Masukan Alamat Anda"></textarea>
				            </div>
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-left" value="registrasi">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		    			
	    	 
    	
    </div><!--/#contact-page-->

	<?php
if($_SERVER['REQUEST_METHOD']== "POST"){
include"koneksi.php";


      $query = mysqli_query($con,"Insert into tbl_customer(username, password, nm_customer, gender, email, nohp, alamat) values ('$_POST[username]','$_POST[password]','$_POST[nm_customer]','$_POST[gender]','$_POST[email]','$_POST[nohp]','$_POST[alamat]') ");

      echo"<script language = 'JavaScript'>
            confirm('Data Customer Berhasil Disimpan!');
            document.location='index.php';
            </script>";

  }



?>
	
	
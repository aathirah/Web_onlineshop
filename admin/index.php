<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Administrator</title>
        <link href="../asset/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-brown">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-dark my-4">Login</h3></div>
                                    <div class="card-body">
                                        <?php
                                            if(isset($_GET['pesan'])){
                                                if($_GET['pesan']== "gagal"){
                                                    echo"<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' role='alert'>
                                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span></button>username & password salah</div>";
                                                }
                                            }
                                            ?>
                                        <form method="POST">
                                            <div class="form-group"><label class="small mb-1" for="inputUsername">Username</label><input class="form-control py-4"  type="text" name="username" placeholder="Masukan username Anda" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4"  type="password" name="password" placeholder="Masukan Password Anda" /></div>
                                            
                                            <div class="form-group"> 
                                                <input class="form-control btn btn-primary " type="submit" value="Sign In">
                                                </div>
                                            
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="asset/js/scripts.js"></script>
    </body>
</html>
<?php 
if($_SERVER['REQUEST_METHOD']=="POST"){
Include"../koneksi.php";
$user = $_POST['username'];
$pass = $_POST['password'];

$sqluser = mysqli_query($con,"Select * from tbl_user where username= '$user' AND password= '$pass' ");
$row = mysqli_num_rows($sqluser);

if($row > 0){
    $ruser = mysqli_fetch_assoc($sqluser);
    session_start();
    $_SESSION['namaadmin'] = $ruser['username'];
    $_SESSION['passadmin'] = $ruser['password'];

    echo"<script language = 'JavaScript'>
    confirm('Login Sebagai ADMIN Berhasil!');
    document.location='dashboard_admin.php';
    </script>";
}

 else{
    echo"<script language = 'JavaScript'>
    alert('Username & Password Salah!');
    document.location='index.php?pesan=gagal';
    </script>";
 }


}
?>


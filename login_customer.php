<div class="container">
    <div class="row">
        <div class="col-sm-12">

            <h2 class="title text-center">Masuk Akun Anda</h2>
            <?php
            if (isset($_GET['pesan'])) {
                if ($_GET['pesan'] == "gagal") {
                    echo "<div class='alert alert-danger alert-dismissible bg-danger text-white border-0 fade show' role='alert'>
                                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span></button>username & password salah</div>";
                }
            }
            ?>

            <form method="POST">
                <div class="form-group col-md-12">
                    <label>Username: </label>
                    <input type="text" name="username" class="form-control" required="required" placeholder="Masukan Username Anda">
                </div>
                <div class="form-group col-md-12">
                    <label>Password: </label>
                    <input type="password" name="password" class="form-control" required="required" placeholder="Masukan Password Anda">
                </div>

                <div class="form-group col-md-12">
                    <input type="submit" name="submit" class="btn btn-primary pull-left" value="login akun">
                </div>
            </form>
        </div>
    </div>



</div><!--/#contact-page-->
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include "koneksi.php";
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sqlcus = mysqli_query($con, "SELECT * FROM tbl_customer WHERE username = '$user' AND password = '$pass'");
    $row = mysqli_num_rows($sqlcus);

    if ($row > 0) {
        // echo $_SESSION['namacus'];
        $rcus = mysqli_fetch_assoc($sqlcus);
        $_SESSION["namacus"] = $rcus['username'];
        $_SESSION['passcus'] = $rcus['password'];

        echo "<script language='JavaScript'>
        confirm('Login Sebagai CUSTOMER Berhasil!');
        document.location='customer/index.php';
        </script>";
    } else {
        echo "<script language='JavaScript'>
        alert('Username & Password Salah!');
        document.location='index.php?page=login_customer&pesan=gagal';
        </script>";
    }
}
?>
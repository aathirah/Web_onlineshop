<?php

session_start();
$_SESSION['namacus'] = '';
unset($_SESSION['namacus']);
session_unset();
session_destroy();
echo"<script language = 'JavaScript'>
    alert('Anda Berhasil Logout!');
    document.location='../index.php';
    </script>";


?>
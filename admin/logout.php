<?php

session_start();
$_SESSION['namaadmin'] = '';
unset($_SESSION['namaadmin']);
session_unset();
session_destroy();
echo"<script language = 'JavaScript'>
    alert('Anda Berhasil Logout!');
    document.location='index.php';
    </script>";


?>
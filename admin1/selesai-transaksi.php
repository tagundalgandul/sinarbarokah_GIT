<?php 
session_start();

unset($_SESSION['no_faktur']);
 echo '<script>alert("Berhasil Menambah transaksi");document.location="transaksi.php";</script>';

?>
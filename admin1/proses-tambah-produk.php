<?php
include "koneksi.php";
include "lib_func.php";

if (isset($_POST['tambah_produk'])) {
   $kd_barang = kd_barang();
   $nama_barang = $_POST['nama_barang'];
   $harga = $_POST['harga'];

   $uploaddir = 'img/produk/';
   $nama_gambar = $uploaddir.$_FILES['gambar']['name'];
   $uploadfile = $uploaddir . basename($_FILES['gambar']['name']);


   $query=mysqli_query($con,"INSERT INTO produk VALUES('$kd_barang', '$nama_barang', '$harga','$nama_gambar') " ) or die(mysqli_error($con));

   if ($query) {

     if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
         echo '<script language="javascript">alert("Sukses Menambahkan Data produk");document.location="produk.php"</script>';
     } else {
         echo "Possible file upload attack!\n";
     }

   }
   //

}
?>

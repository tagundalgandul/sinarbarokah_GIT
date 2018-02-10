<?php
include "koneksi.php";

if (isset($_POST['edit_produk'])) {

   $kd_barang = $_POST['kd_barang'];
   $uploaddir = 'img/produk/';
   $nama_gambar = $uploaddir.$_FILES['gambar']['name'];
   $uploadfile = $uploaddir . basename($_FILES['gambar']['name']);

   $query=mysqli_query($con,"UPDATE produk SET gambar = '$nama_gambar' WHERE kd_barang='$kd_barang' " ) or die(mysqli_error($con));

   if ($query) {

     if (move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadfile)) {
         echo '<script language="javascript">alert("Sukses Mengubah Data produk");document.location="produk.php"</script>';
     } else {
         echo "Possible file upload attack!\n";
     }

   }

}
?>

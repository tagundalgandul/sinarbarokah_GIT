<?php
include 'koneksi.php';

if(isset($_POST['edit_produk'])) {
  $kd_barang = $_POST['kd_barang'];
  $nama_barang = $_POST['nama_barang'];
  $harga = $_POST['harga'];


  $query_update=mysqli_query($con, "UPDATE produk SET nama_barang='$nama_barang', harga='$harga' WHERE kd_barang='$kd_barang'" ) or die (mysqli_error($con));

  echo '<script language="javascript">alert("Sukses Mengubah Data produk");document.location="produk.php"</script>';
}

?>

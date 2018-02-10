<?php

session_start();
include "koneksi.php";

var_dump($_POST);

if(isset($_POST) && !empty($_POST)){
	$no_faktur      = $_POST['no_faktur'];
 	$kd_barang		= $_POST['kd_barang'];
 	$tgl_transaksi  = $_POST['tanggal'];
 	$id_pengguna    = $_POST['id_pengguna'];
 	$id_pelanggan   = $_POST['pelanggan'];
 	$qty			= $_POST['qty'];

 	$queryIdFaktur = "SELECT no_faktur FROM transaksi
 	                  WHERE no_faktur = '$no_faktur' ";
 	$cek = mysqli_query($con,$queryIdFaktur);

 	if (mysqli_num_rows($cek) < 1){
 		$sql = mysqli_query($con,"INSERT INTO transaksi VALUES ('$no_faktur','$tgl_transaksi','$id_pengguna','$id_pelanggan',0)")or die(mysqli_error($con));
 		$sql2 = mysqli_query($con,"SELECT harga FROM produk WHERE kd_barang='$kd_barang'");
		$hsl = mysqli_fetch_array($sql2);
		$harga = $hsl['harga'];
		$sql3 = mysqli_query($con,"INSERT INTO det_transaksi VALUES('$no_faktur','$kd_barang','$harga'*'$qty','$qty')");
		$update = mysqli_query($con,"UPDATE transaksi set total=total+('$harga'*'$qty') WHERE no_faktur='$no_faktur'");

	}else{
		$sql2 = mysqli_query($con,"SELECT harga FROM produk WHERE kd_barang='$kd_barang'");
		$hsl = mysqli_fetch_array($sql2);
		$harga = $hsl['harga'];
		$cek_brg = mysqli_query($con,"SELECT * FROM det_transaksi WHERE no_faktur='$no_faktur' AND kd_barang='$kd_barang'");

	if(mysqli_num_rows($cek_brg)>0){
		$tambah = mysqli_query($con,"UPDATE det_transaksi set qty=qty+'$qty', subtotal=subtotal+('$harga'*'$qty') WHERE no_faktur='$no_faktur' AND kd_barang='$kd_barang'");
		$update = mysqli_query($con,"UPDATE transaksi set total=total+('$harga'*'$qty') where no_faktur='$no_faktur'");
	}else{
		$sql2 = mysqli_query($con,"INSERT INTO det_transaksi VALUES('$no_faktur','$kd_barang','$harga'*'$qty','$qty')");
		$update = mysqli_query($con,"UPDATE transaksi set total=total+('$harga'*'$qty') where no_faktur='$no_faktur'");
	}
}
}
?>

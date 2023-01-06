<<?php 
include '../koneksi.php';
$nama  = $_POST['nama'];
$stok  = $_POST['stok'];
$harga  = $_POST['harga'];

$tambah = mysqli_query($koneksi,"insert into barang values (NULL,'$nama','$stok','$harga')");
if($tambah == true){
	header("location:stok_barang.php?alert=berhasil");
}else{
	header("location:stok_barang.php?alert=gagal");	
}



?>
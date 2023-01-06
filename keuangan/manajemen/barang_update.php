<<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama  = $_POST['nama'];
$stok  = $_POST['stok'];
$harga  = $_POST['harga'];

$update = mysqli_query($koneksi, "update barang set nama_barang='$nama',stok_barang='$stok',harga='$harga' where id_barang='$id'");
if($update == true){
	header("location:stok_barang.php?alert=berhasilupdate");
}else{
	header("location:stok_barang.php?alert=gagal");	
}
?>
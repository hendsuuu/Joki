<?php 
include '../koneksi.php';
$id  = $_GET['id'];

//mysqli_query($koneksi, "update barang set transaksi_kategori='1' where transaksi_kategori='$id'");

$hapus = mysqli_query($koneksi, "delete from barang where id_barang='$id'");

if($hapus == true){
	header("location:stok_barang.php?alert=berhasilhapus");
}else{
	header("location:stok_barang.php?alert=gagal");	
}
<?php 
include '../koneksi.php';
$id  = $_GET['id'];

//mysqli_query($koneksi, "update barang set transaksi_kategori='1' where transaksi_kategori='$id'");

$hapus = mysqli_query($koneksi, "delete from absensi where id_absen='$id'");

if($hapus == true){
	header("location:absensi.php?alert=berhasilhapus");
}else{
	header("location:absensi.php?alert=gagal");	
}
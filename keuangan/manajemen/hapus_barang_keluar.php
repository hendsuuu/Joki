<?php 
include '../koneksi.php';

$id  = $_GET['id'];
$cekmasuk = mysqli_query($koneksi,"select * from barang_keluar where id_keluar='$id'");
$ambilqty = mysqli_fetch_array($cekmasuk);
$nama = $ambilqty['id_barang'];
$cekstok = mysqli_query($koneksi,"select * from barang where id_barang='$nama'");
$ambil = mysqli_fetch_array($cekstok);

$qty1 = $ambilqty['qty'];
$stok = $ambil['stok_barang'];
$updatestok = $stok + $qty1;


$hapus = mysqli_query($koneksi, "delete from barang_keluar where id_keluar='$id'");
$update1 = mysqli_query($koneksi,"update barang set stok_barang = '$updatestok' where id_barang='$nama'");

if($hapus == true){
	header("location:barang_keluar.php?alert=berhasilhapus");
}else{
	header("location:barang_keluar.php?alert=gagal");	
}
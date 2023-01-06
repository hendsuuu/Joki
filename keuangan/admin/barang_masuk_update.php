<<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama  = $_POST['nama'];
$qty  = $_POST['qty'];
$ket  = $_POST['keterangan'];


$cekstok = mysqli_query($koneksi,"select * from barang where id_barang='$nama'");
$ambil = mysqli_fetch_array($cekstok);
$harga = $ambil['harga']*$qty;
$cekmasuk = mysqli_query($koneksi,"select * from barang_masuk where id_masuk='$id'");
$ambilqty = mysqli_fetch_array($cekmasuk);
$id_masuk=$ambil['id_masuk_transaksi'];

$qty1 = $ambilqty['qty'];
$stok = $ambil['stok_barang'];
$updatestok = $stok - $qty1;
$total = $updatestok + $qty;

$update = mysqli_query($koneksi, "update barang_masuk set id_barang='$nama',keterangan='$ket',qty='$qty' where id_masuk='$id'");
$update1 = mysqli_query($koneksi,"update barang set stok_barang = '$total' where id_barang='$nama'");


if($update1 == true){
	header("location:barang_masuk.php?alert=berhasilupdate");
}else{
	header("location:barang_masuk.php?alert=gagal");	
}
?>
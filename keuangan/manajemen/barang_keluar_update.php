<<?php 
include '../koneksi.php';
$id = $_POST['id'];
$nama  = $_POST['nama'];
$qty  = $_POST['qty'];
$ket  = $_POST['keterangan'];

$cekstok = mysqli_query($koneksi,"select * from barang where id_barang='$nama'");
$ambil = mysqli_fetch_array($cekstok);
$cekmasuk = mysqli_query($koneksi,"select * from barang_keluar where id_keluar='$id'");
$ambilqty = mysqli_fetch_array($cekmasuk);
$qty1 = $ambilqty['qty'];
$stok = $ambil['stok_barang'];
$updatestok = $stok + $qty1;
$total = $updatestok - $qty;

$update = mysqli_query($koneksi, "update barang_keluar set id_barang='$nama',keterangan='$ket',qty='$qty' where id_keluar='$id'");
$update1 = mysqli_query($koneksi,"update barang set stok_barang = '$total' where id_barang='$nama'");
if($update == true){
	header("location:barang_keluar.php?alert=berhasilupdate");
}else{
	header("location:barang_keluar.php?alert=gagal");	
}
?>
<<?php
    include '../koneksi.php';


        $nama  = $_POST['nama'];
        $qty  = $_POST['qty'];
        $ket  = $_POST['keterangan'];

        $cekstok = mysqli_query($koneksi,"select * from barang where id_barang='$nama'");
        $ambil = mysqli_fetch_array($cekstok);
        $stok = $ambil['stok_barang'];
        $harga = $ambil['harga'];
        $updatestok = $stok + $qty;
        $addmasuk = mysqli_query($koneksi, "insert into barang_masuk (id_barang,qty,keterangan)values('$nama','$qty','$ket')");
        $updateStok = mysqli_query($koneksi,"update barang set stok_barang = '$updatestok' where id_barang='$nama'");

     
    
        if ($addmasuk == true) {
            header("location:barang_masuk.php?alert=berhasil");
        } else {
            header("location:barang_masuk.php?alert=gagal");
        }

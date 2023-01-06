<<?php
    include '../koneksi.php';

        $nama  = $_POST['nama'];
        $status  = $_POST['status'];
        $absen  = $_POST['absen'];
        $ket  = $_POST['keterangan'];

        $addmasuk = mysqli_query($koneksi, "insert into absensi (id_user,status,keterangan,absen)values('$nama','$status','$ket','$absen')");

        if ($addmasuk == true) {
            header("location:absensi.php?alert=berhasil");
        } else {
            header("location:absensi.php?alert=gagal");
        }

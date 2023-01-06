<<?php
    include '../koneksi.php';
        $id  = $_POST['id'];
        $nama  = $_POST['nama'];
        $status  = $_POST['status'];
        $absen  = $_POST['absen'];
        $ket  = $_POST['keterangan'];

        $update = mysqli_query($koneksi, "update absensi set id_user ='$nama', status='$status',keterangan='$ket',absen='$absen' where id_absen='$id' ")or die(mysqli_error($koneksi));

        if ($update == true) {
            header("location:absensi.php?alert=berhasil");
        } else {
            header("location:absensi.php?alert=gagal");
        }

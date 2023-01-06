<?php include 'header.php'; ?>
<style>
    label{
        text-align: left;
    }
</style>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Absensi
            <small>Data Absensi</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info" style="border-top-color:#E38B29;">

                    <div class="box-header">
                        <h3 class="box-title">Absensi Karyawan</h3>
                        <div class="btn-group pull-right">

                            <button type="button" class="btn btn-inf btn-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> &nbsp Absen
                            </button>
                        </div>
                        <hr>
                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == 'gagal') {
                        ?>
                                <div class="alert alert-warning alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
                                    Ekstensi Tidak Diperbolehkan
                                </div>
                            <?php
                            } elseif ($_GET['alert'] == "berhasil") {
                            ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success</h4>
                                    Berhasil Disimpan
                                </div>
                            <?php
                            } elseif ($_GET['alert'] == "berhasilupdate") {
                            ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success</h4>
                                    Berhasil Update
                                </div>
                            <?php
                            } elseif ($_GET['alert'] == "berhasilhapus") {
                            ?>
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4><i class="icon fa fa-check"></i> Success</h4>
                                    Berhasil Hapus
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="box-body">

                        <!-- Modal -->
                        <form action="absen_add.php" method="post" enctype="multipart/form-data">
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Tambah Barang</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label>Nama</label>
                                                <select type="text" name="nama" required="required" class="form-control " placeholder="Masukkan Nama Barang ..">
                                                    <?php
                                                    $ambil = mysqli_query($koneksi, "select * from user");
                                                    while ($fetch = mysqli_fetch_array($ambil)) {
                                                        $nama = $fetch['user_username'];
                                                        $id = $fetch['user_id'];

                                                    ?>
                                                        <option value="<?= $id; ?>"><?= $nama; ?></option>

                                                        <<?php
                                                        }

                                                            ?> </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Absen</label>
                                                <select name="absen" required class="form-control">
                                                    <option value="masuk">Masuk</option>
                                                    <option value="pulang">Pulang</option>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status" required class="form-control">
                                                    <option value="Hadir">Hadir</option>
                                                    <option value="Sakit">Sakit</option>
                                                    <option value="Izin">Izin</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" name="keterangan" required="required" class="form-control" placeholder="Keterangan . .">
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%" rowspan="2">NO</th>
                                        <th rowspan="2" class="text-center">NAMA</th>
                                        <th rowspan="2" width="10%" class="text-center">ABSEN</th>
                                        <th rowspan="2" width="30%" class="text-center">STATUS</th>
                                        <th rowspan="2" width="10%" class="text-center">KETERANGAN</th>
                                        <th rowspan="2" width="10%" class="text-center">JAM</th>

                                        <th rowspan="2" width="10%" class="text-center">TANGGAL</th>
                                        <th rowspan="2" width="10%" class="text-center">OPSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM absensi,user where absensi.id_user = user.user_id ");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>

                                            <td class="text-center"><?php echo $d['user_username']; ?></td>
                                            <td class="text-center"><?php echo $d['absen']; ?></td>
                                            <td class="text-center"><?php echo $d['status']; ?></td>
                                            <td class="text-center"><?php echo $d['keterangan'] ?></td>
                                            <td class="text-center"><?php echo $d['waktu'] ?></td>
                                            <td class="text-center"><?php echo $d['tanggal'] ?></td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_absen_<?php echo $d['id_absen'] ?>">
                                                    <i class="fa fa-cog"></i>
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_absen_<?php echo $d['id_absen'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>





                                                <form action="absen_update.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal fade" id="edit_absen_<?php echo $d['id_absen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Absen</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="form-group">
                                                                        <label>Nama</label>
                                                                        <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Kategori .." value="<?php echo $d['id_absen']; ?>">
                                                                        <select type="text" name="nama" required="required" class="form-control " placeholder="Masukkan Nama Barang ..">
                                                                            <?php
                                                                            $ambil = mysqli_query($koneksi, "select * from user");
                                                                            while ($fetch = mysqli_fetch_array($ambil)) {
                                                                                $nama = $fetch['user_username'];
                                                                                $id = $fetch['user_id'];

                                                                            ?>
                                                                                <option value="<?= $id; ?>"><?= $nama; ?></option>

                                                                                <<?php
                                                                                }

                                                                                    ?> </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select name="status" required class="form-control">
                                                                            <option value="Hadir">Hadir</option>
                                                                            <option value="Sakit">Sakit</option>
                                                                            <option value="Izin">Izin</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Absen</label>
                                                                        <select name="absen" required class="form-control">
                                                                            <option value="masuk">Masuk</option>
                                                                            <option value="pulang">Pulang</option>

                                                                        </select>
                                                                    </div>
                                                                    

                                                                    <div class="form-group">
                                                                        <label>Keterangan</label>
                                                                        <input type="text" name="keterangan" required="required" class="form-control" placeholder="Keterangan . .">
                                                                    </div>


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>



                                                <!-- modal hapus -->
                                                <div class="modal fade" id="hapus_absen_<?php echo $d['id_absen'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="exampleModalLabel">Peringatan!</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <p>Yakin ingin menghapus data ini ?</p>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                <a href="absen_hapus.php?id=<?php echo $d['id_absen'] ?>" class="btn btn-primary">Hapus</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </section>

</div>
<?php include 'footer.php'; ?>
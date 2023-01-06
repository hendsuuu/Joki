<?php include 'header.php'; ?>

<div class="content-wrapper">

    <section class="content-header">
        <h1>
            Barang
            <small>Data Barang</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-12">
                <div class="box box-info"  style="border-top-color:#E38B29;">

                    <div class="box-header">
                        <h3 class="box-title">Stok Barang</h3>
                        <div class="btn-group pull-right">

                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus"></i> &nbsp Tambah Barang
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
                            }elseif ($_GET['alert'] == "berhasilhapus") {
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
                        <form action="barang_add.php" method="post" enctype="multipart/form-data">
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
                                                <input type="text" name="nama" required="required" class="form-control " placeholder="Masukkan Nama Barang ..">
                                            </div>
                                            <div class="form-group">
                                                <label>Stok</label>
                                                <input type="number" name="stok" required="required" class="form-control" placeholder="Jumlah Stok ..">
                                            </div>

                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="number" name="harga" required="required" class="form-control" placeholder="Harga ..">
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
                                        <th  rowspan="2" class="text-center">NAMA</th>
                                        <th rowspan="2" width="10%"class="text-center">STOK</th>
                                        <th rowspan="2" width="30%" class="text-center">HARGA (KG)</th>

                                        <th rowspan="2" width="10%" class="text-center">OPSI</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $no = 1;
                                    $data = mysqli_query($koneksi, "SELECT * FROM barang ");
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no++; ?></td>

                                            <td><?php echo $d['nama_barang']; ?></td>
                                            <td><?php echo $d['stok_barang']." Kg"; ?></td>
                                            <td><?php echo "Rp. " . number_format($d['harga']) . " ,-"; ?></td>

                                            <td class="text-center">
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_barang_<?php echo $d['id_barang'] ?>">
                                                    <i class="fa fa-pencil"></i>
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_barang_<?php echo $d['id_barang'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                                



                                                <form action="barang_update.php" method="post" enctype="multipart/form-data">
                                                    <div class="modal fade" id="edit_barang_<?php echo $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title" id="exampleModalLabel">Edit Barang</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Nama</label>
                                                                        <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Kategori .." value="<?php echo $d['id_barang']; ?>">
                                                                        <input type="text" style="width:100%" name="nama" required="required" class="form-control" placeholder="Masukkan Nama .." value="<?php echo $d['nama_barang'] ?>">
                                                                    </div>



                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Harga</label>
                                                                        <input type="number" style="width:100%" name="harga" required="required" class="form-control" placeholder="Masukkan Harga .." value="<?php echo $d['harga'] ?>">
                                                                    </div>

                                                                    <div class="form-group" style="width:100%;margin-bottom:20px">
                                                                        <label>Jumlah Stok</label>
                                                                        <textarea name="stok" type="number" style="width:100%" class="form-control" rows="4"><?php echo $d['stok_barang'] ?></textarea>
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
                                                <div class="modal fade" id="hapus_barang_<?php echo $d['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                                <a href="barang_hapus.php?id=<?php echo $d['id_barang'] ?>" class="btn btn-primary">Hapus</a>
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
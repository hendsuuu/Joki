<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="My-3">Form Tambah Data Komik</h2>

            <form action="/komik/save" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" name="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" id="judul" value="<?= old('judul'); ?>" name="judul" autofocus>
                        <div class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="penulis" name="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penulis" value="<?= old('penulis'); ?>" name="penulis">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" name="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" value="<?= old('penerbit'); ?>" name="penerbit">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" name="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/kirim.jpg" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group mb-3">
                            <input type="file" onchange="previewImg()" name="sampul" class="form-control <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>" id="sampul">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="input-group-text" for="sampul">Upload</label>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah data</button>
            </form>

        </div>

    </div>
</div>

<?= $this->endsection(); ?>
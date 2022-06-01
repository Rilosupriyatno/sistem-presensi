<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Data Staff</h2>
            <form action="/Admin/save_sis" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="ISN" class="col-sm-2 col-form-label">ISN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('ISN')) ? 'is-invalid' : ''; ?>" id="ISN" name="ISN" autofocus value="<?= old('ISN'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ISN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('keterangan')) ? 'is-invalid' : ''; ?>" id="keterangan" name="keterangan" autofocus value="<?= old('keterangan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('keterangan'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
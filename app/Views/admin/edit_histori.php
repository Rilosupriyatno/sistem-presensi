<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Posisi</h2>
            <form action="/Admin/updateMutasi/<?= $posisi['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NIP" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIP')) ? 'is-invalid' : ''; ?>" id="NIP" name="NIP" autofocus value="<?= (old('NIP')) ? old('NIP') : $posisi['NIP']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIP'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('id_posisi')) ? 'is-invalid' : ''; ?>" id="id_posisi" name="id_posisi" autofocus value="<?= (old('id_posisi')) ? old('id_posisi') : $posisi['id_posisi']; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tgl_berakhir" class="col-sm-2 col-form-label">Tanggal Berakhir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control datepicker <?= ($validation->hasError('tgl_berakhir')) ? 'is-invalid' : ''; ?>" id="tgl_berakhir" name="tgl_berakhir" placeholder="yyyy-mm-dd" value="<?= $posisi['tgl_berakhir']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_berakhir'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="updator" class="col-sm-2 col-form-label">Updator</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('updator')) ? 'is-invalid' : ''; ?>" id="updator" name="updator" autofocus value="<?= $posisi['updator']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('updator'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
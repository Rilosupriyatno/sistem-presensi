<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Posisi</h2>
            <form action="/Admin/mutate/<?= $stat['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NIP" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIP')) ? 'is-invalid' : ''; ?>" id="NIP" name="NIP" autofocus value="<?= (old('NIP')) ? old('NIP') : $stat['NIP']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIP'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_posisi" class="col-sm-2 col-form-label">Posisi</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control <?= ($validation->hasError('id_posisi')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="id_posisi" name="id_posisi" autofocus value="<?= old('id_posisi'); ?>">
                            <option selected>Pilih posisi</option>
                            <?php foreach ($posisi as $jb) : ?>
                                <option value="<?= $jb['id_posisi']; ?>"><?= $jb['posisi']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_posisi'); ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="no_sk" class="col-sm-2 col-form-label">NO.SK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <'?= ($validation->hasError('no_sk')) ? 'is-invalid' : ''; ?>" id="no_sk" name="no_sk" autofocus value="<'?= old('no_sk'); ?>">
                        <div class="invalid-feedback">
                            <'?= $validation->getError('no_sk'); ?>
                        </div>
                    </div>
                </div> -->
                <div class="row mb-3">
                    <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control datepicker <?= ($validation->hasError('tgl_mulai')) ? 'is-invalid' : ''; ?>" id="tgl_mulai" name="tgl_mulai" placeholder="yyyy-mm-dd" autofocus value="<?= old('tgl_mulai'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_mulai'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="creator" class="col-sm-2 col-form-label">Creator</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('creator')) ? 'is-invalid' : ''; ?>" id="creator" name="creator" autofocus value="<?= old('creator'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('creator'); ?>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
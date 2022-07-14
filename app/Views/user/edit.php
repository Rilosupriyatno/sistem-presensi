<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Profile</h2>
            <form action="/User/update/<?= $pegawai['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" autofocus value="<?= (old('username')) ? old('username') : $pegawai['username']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('username'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="fullname" class="col-sm-2 col-form-label">Fullname</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="fullname" name="fullname" autofocus value="<?= (old('fullname')) ? old('fullname') : $pegawai['fullname']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('fullname'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nomor_iden" class="col-sm-2 col-form-label">Nomor Identitas</label>
                    <div class="col-sm-10">
                        <?php if (isset($pegawai['NIP']) != null) : ?>
                            <input type="text" class="form-control <?= ($validation->hasError('nomor_iden')) ? 'is-invalid' : ''; ?>" id="nomor_iden" name="nomor_iden" readonly autofocus value="<?= (old('NIP')) ? old('NIP') : $pegawai['NIP']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nomor_iden'); ?>
                            </div>
                        <?php elseif (isset($pegawai['ISN']) != null) : ?>
                            <input type="text" class="form-control <?= ($validation->hasError('nomor_iden')) ? 'is-invalid' : ''; ?>" id="nomor_iden" name="nomor_iden" readonly autofocus value="<?= (old('ISN')) ? old('ISN') : $pegawai['ISN']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nomor_iden'); ?>
                            </div>
                        <?php else : ?>
                            <input type="text" class="form-control <?= ($validation->hasError('nomor_iden')) ? 'is-invalid' : ''; ?>" id="nomor_iden" name="nomor_iden">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nomor_iden'); ?>
                            </div>

                        <?php endif ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-2">
                        <img src="<?= base_url(); ?>/img/<?= $pegawai['user_image']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-8">
                        <div class="mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="prevImg()" value="<?= (old('foto')) ? old('foto') : $pegawai['user_image']; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('foto'); ?>
                                </div>
                                <label class="custom-file-label" for="foto">Pilih Foto</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
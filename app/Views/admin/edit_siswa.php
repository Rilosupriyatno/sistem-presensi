<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Ubah Data Staff</h2>
            <form action="/Admin/update_siswa/<?= $siswa['id']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="ISN" class="col-sm-2 col-form-label">ISN</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('ISN')) ? 'is-invalid' : ''; ?>" id="ISN" name="ISN" autofocus value="<?= (old('ISN')) ? old('ISN') : $siswa['ISN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ISN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= (old('nama')) ? old('nama') : $siswa['nama']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="jenis_kelamin">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control <?= ($validation->hasError('jenis_kelamin')) ? 'is-invalid' : ''; ?>" aria-label="Default select example" id="jenis_kelamin" name="jenis_kelamin" autofocus value="<?= old('jenis_kelamin'); ?>">
                            <option selected>Choose...</option>
                            <option value="Laki-Laki">L</option>
                            <option value="Perempuan">P</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_kelamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" id="kelas" name="kelas" autofocus value="<?= old('kelas'); ?>">
                            <option selected>Pilih Kelas</option>
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('kelas'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
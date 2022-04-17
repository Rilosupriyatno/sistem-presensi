<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Tambah Data Siswa</h2>
            <form action="/Admin/save_siswa" method="POST" enctype="multipart/form-data">
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
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
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
                    <label for="id_kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <select type="text" class="form-control <?= ($validation->hasError('id_kelas')) ? 'is-invalid' : ''; ?>" id="id_kelas" name="id_kelas" autofocus value="<?= old('id_kelas'); ?>">
                            <option selected>Pilih Status</option>
                            <?php foreach ($kelas as $kls) : ?>
                                <option value="<?= $kls['id_kelas']; ?>"><?= $kls['kelas']; ?></option>
                            <?php endforeach;  ?>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('id_kelas'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
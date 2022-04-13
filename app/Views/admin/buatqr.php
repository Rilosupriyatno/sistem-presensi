<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-8  p-3 shadow-lg">
            <div class="card text-center">
                <div class="card-header">
                    Buat QrCode
                </div>
                <div class="card-body">
                    <form action="/Admin/buatqr" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" autofocus value="<?= old('nama'); ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" autofocus value="<?= old('email'); ?>">
                            </div>
                        </div>
                        <?php if (isset($url)) : ?>
                            <div class="mb-3">
                                <img src="<?= $url; ?>" alt="QrCode" width="25%" height="25%">
                            </div>
                        <?php endif; ?>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
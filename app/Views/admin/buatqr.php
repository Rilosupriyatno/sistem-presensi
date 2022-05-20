<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Buat Qrcode</h2>
            <form action="/Admin/buatqr" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="ISN" class="col-sm-8 col-form-label">ISN</label>
                    <div class="col-sm-5 input-group flex-nowrap">
                        <input type="text" class="form-control" id="ISN" name="ISN" placeholder="ISN" autofocus>
                    </div>
                </div>
                <?php if (!empty($url)) : ?>
                    <div class="mb-3">
                        <img src="<?= $url; ?>" alt="QrCode" width="25%" height="25%" download>
                        <a class="btn btn-primary" href="<?php $url; ?>" download title="QrCode">Download</a>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-primary">Buat QrCode</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
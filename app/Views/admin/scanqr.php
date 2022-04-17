<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-8  p-3 shadow-lg">
            <div class="card text-center">
                <div class="card-header">
                    Scan QrCode
                </div>
                <div class="card-body">
                    <video class="card-img-top" id="preview" width="300" height="300"></video>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
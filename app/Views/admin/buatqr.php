<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Qrcode</h2>
            <form action="/Admin/buatqr" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <!-- <div class="row mb-3">
                    <label for="NI" class="col-sm-8 col-form-label">Nomor Identitas</label>
                    <div class="col-sm-5 input-group flex-nowrap">
                        <input type="text" class="form-control" id="NI" name="NI" placeholder="Nomor Identitas" autofocus>
                    </div>
                </div> -->
                <?php if (!empty($url)) : ?>
                    <div class="container" style="margin-right:100%;">
                        <div class="mb-3">
                            <img src="<?= $url; ?>" alt="QrCode" width="50%" height="50%" class="qrcode">
                        </div>
                    </div>
                <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
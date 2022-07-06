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

                <div class="container">
                    <img class="img-responsive" src="<?= $url; ?>" alt="Chania" width="200" height="200">
                </div>
                <!--<img src="" alt="QrCode" height="40%" width="40%"  class="img-fluid img-thumbnail">-->

            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
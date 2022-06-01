<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-8  p-3 shadow-lg">
            <div class="card text-center">
                <div class="card-header">
                    Scan QrCode
                </div>
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= session()->getFlashdata('pesan'); ?>
                    </div>
                <?php endif; ?>
                <div class="card-body">
                    <form action="/Admin/savescan" method="POST">
                        <input type="text" name="ISN" id="ISN" placeholder="ISN" hidden>
                    </form>
                    <video class="card-img-top" id="preview" width="300" height="300" onload="scan()"></video>
                    <!-- <button onclick="scanner.stop()">Matikan Camera</button> -->
                    <button onclick="scan()">nyalakan Camera</button>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row no-gutters m">
                    <!-- <div class="row g-0">  -->
                    <div class="col-md-4 d-flex justify-content-center">
                        <br>
                        <img src="<?= base_url('/img/' . $users->user_image); ?>" alt="<?= $users->username; ?>" class="foto-detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $users->username; ?></h4>
                                </li>
                                <?php if (isset($users->NIP) != null) : ?>
                                    <li class="list-group-item">
                                        <?= $users->NIP ?>
                                        <?php if (user()->fullname) : ?>
                                    <li class="list-group-item"><?= $users->fullname; ?></li>
                                <?php endif; ?>
                                <li class="list-group-item"><?= $users->email; ?></li>
                                <li class="list-group-item"><span class="badge badge-<?= ($users->name == 'admin') ? 'success' : 'warning'; ?>"><?= $users->name; ?></span>
                                </li>
                            <?php else : ?>
                                <li class="list-group-item">
                                    <?= $users->ISN ?>
                                    <?php if (user()->fullname) : ?>
                                <li class="list-group-item"><?= $users->fullname; ?></li>
                            <?php endif; ?>
                            <li class="list-group-item"><?= $users->email; ?></li>
                            <li class="list-group-item"><?= $users->kelas; ?></li>
                            <li class="list-group-item"><?= $users->wali_kelas; ?></li>
                            <li class="list-group-item"><span class="badge badge-<?= ($users->name == 'admin') ? 'success' : 'warning'; ?>"><?= $users->name; ?></span>
                            </li>
                        <?php endif ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
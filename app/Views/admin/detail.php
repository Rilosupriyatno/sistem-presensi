<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User Detail</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row no-gutters m">
                    <!-- <div class="row g-0">  -->
                    <div class="col-md-4">
                        <br>
                        <img src="<?= base_url('/img/' . $data_staff->foto); ?>" alt="<?= $data_staff->nama; ?>" class="foto-detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><?= $data_staff->nama; ?></h4>
                                </li>
                                <li class="list-group-item"><?= $data_staff->NIP; ?></li>
                                <li class="list-group-item"><?= $data_staff->jenkel; ?></li>
                                <li class="list-group-item"><?= $data_staff->posisi; ?></li>
                                <li class="list-group-item"></li>
                            </ul>
                            <a href="/admin/edit/<?= $data_staff->staffid; ?>" class="btn btn-warning">Edit</a>
                            <form action="/admin/delete/<?= $data_staff->staffid; ?>" method="post" class="d-inline" onclick="return confirm('Yakin mau menghapus?');">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_methode" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br><br>
                            <small><a href="<?= base_url('admin/daftar_staff'); ?>">&laquo; Kembali</a></small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
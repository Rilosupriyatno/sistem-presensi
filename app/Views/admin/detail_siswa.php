<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Detail Siswa</h1>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-secondary mb-3" style="max-width: 18rem;">
                <div class="card-header">
                    <h3> <?= $data_siswa->nama; ?></h3>
                </div>
                <div class="card-body text-secondary">
                    <h5 class="card-title">ISN/Induk : <?= $data_siswa->ISN; ?></h5>
                    <h5 class="card-title">L/P : <?= $data_siswa->jenis_kelamin; ?></h5>
                    <h5 class="card-title">Kelas : <?= $data_siswa->kelas; ?></h5>
                    <h5 class="card-title">Wali Kelas : <?= $data_siswa->wali_kelas; ?></h5>

                    <a href="/admin/edit_siswa/<?= $data_siswa->siswaid; ?>" class="btn btn-warning">Edit</a>
                    <form action="/admin/delete_siswa/<?= $data_siswa->siswaid; ?>" method="post" class="d-inline" onclick="return confirm('Yakin mau menghapus?');">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_methode" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <br><br>
                    <small><a href="<?= base_url('admin/daftar_siswa'); ?>">&laquo; Kembali</a></small>
                </div>
            </div>
        </div>
        <!-- <div class="card mb-3 shadow" style="max-width: 540px;">
                <div class="row no-gutters m">
                    <div class="row g-0"> 
                    <div class="col-md-4">
                        <br>
                        <img src="<'?= base_url('/img/' . $data_siswa->foto); ?>" alt="<'?= $data_staff->nama; ?>" class="foto-detail">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <h4><'?= $data_siswa->nama; ?></h4>
                                </li>
                                <li class="list-group-item"><'?= $data_siswa->ISN; ?></li>
                                <li class="list-group-item"><'?= $data_siswa->jenis_kelamin; ?></li>
                                <li class="list-group-item"><'?= $data_siswa->kelas; ?></li>
                                <li class="list-group-item"><'?= $data_siswa->wali_kelas; ?></li>
                                <li class="list-group-item"></li>
                            </ul>
                            <a href="/admin/edit/<'?= $data_siswa->siswaid; ?>" class="btn btn-warning">Edit</a>
                            <form action="/admin/delete/<'?= $data_siswa->siswaid; ?>" method="post" class="d-inline" onclick="return confirm('Yakin mau menghapus?');">
                                <'?= csrf_field(); ?>
                                <input type="hidden" name="_methode" value="DELETE">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br><br>
                            <small><a href="<'?= base_url('admin/daftar_siswa'); ?>">&laquo; Kembali</a></small>
                        </div>
                    </div>
                </div>
            </div> -->
    </div>
</div>
</div>
<?= $this->endSection(); ?>
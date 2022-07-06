<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <a href="/admin/create_siswa" class="btn btn-primary mt-3" style="float: right;">Tambah Siswa</a>
    <h1 class="h3 mb-4 text-gray-800">Daftar Siswa</h1>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-header-action" style="float: right;">
                    <a href="/admin/trash_siswa" class="btn btn-danger"><i class="fa fa-trash"></i> Trash</a>
                </div>
                <table class="table" id="table_id" width="100%" cellspacing="0">
                    <div class="col-6">
                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control cari" placeholder="Masukkan Nama" name="keyword">
                                <button class="btn btn-outline-secondary" type="submit" name="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ISN</th>
                            <th>Nama</th>
                            <th>L/P</th>
                            <th>Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                        <?php foreach ($data_siswa as $siswa) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $siswa['ISN']; ?></td>
                                <td><?= $siswa['nama']; ?></td>
                                <td><?= $siswa['jenis_kelamin']; ?></td>
                                <td><?= $siswa['kelas']; ?></td>
                                <td><?= $siswa['wali_kelas']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/detail_siswa' . $siswa['siswaid']); ?>" class="btn btn-info">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('data_siswa', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
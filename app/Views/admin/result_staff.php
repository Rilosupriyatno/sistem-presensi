<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <a href="/admin/create_siswa" class="btn btn-primary mt-3" style="float: right;">Tambah Siswa</a> -->
    <h1 class="h3 mb-4 text-gray-800">Presensi Staff</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
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
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Posisi</th>
                            <th>Tanggal</th>
                            <th>Waktu Datang</th>
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
                        <?php foreach ($resultstaff as $staff) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $staff['NIP']; ?></td>
                                <td><?= $staff['nama']; ?></td>
                                <td><?= $staff['posisi']; ?></td>
                                <td><?= $staff['tanggal']; ?></td>
                                <td><?= $staff['waktu_datang']; ?></td>
                                <!-- <td>
                                    <a href="</?= base_url('admin/detail_siswa' . $siswa'['siswaid']); ?>" class="btn btn-info">Detail</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('resultstaff', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
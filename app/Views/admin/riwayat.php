<?= $this->extend('templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <a href="/admin/create_siswa" class="btn btn-primary mt-3" style="float: right;">Tambah Siswa</a> -->
    <h1 class="h3 mb-4 text-gray-800">Riwayat Presensi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" id="table_id" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <?php if (isset($riwayat['NIP']) != null) : ?>
                                <th>NIP</th>
                            <?php else : ?>
                                <th>ISN</th>
                            <?php endif; ?>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Waktu Datang</th>
                            <th>Keterangan</th>
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
                        <?php foreach ($riwayat as $staff) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <?php if (isset($staff['NIP']) != null) : ?>
                                    <td><?= $staff['NIP']; ?></td>
                                <?php else : ?>
                                    <td><?= $staff['ISN']; ?></td>
                                <?php endif; ?>
                                <td><?= $staff['nama']; ?></td>
                                <td><?= $staff['tanggal']; ?></td>
                                <td><?= $staff['waktu_datang']; ?></td>
                                <td><?= $staff['keterangan']; ?></td>
                                <!-- <td>
                                    <a href="</?= base_url('admin/detail_siswa' . $siswa'['siswaid']); ?>" class="btn btn-info">Detail</a>
                                </td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('riwayat', 'data_paginate') ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
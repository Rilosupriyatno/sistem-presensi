<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="admin.css" />
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.1.0/css/buttons.bootstrap4.min.css" />

    <!-- libralis js  -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="admin.js"></script>

    <!-- datatable js -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.colVis.min.js"></script>
    <!-- end -->
    <title>Result Staff</title>
</head>

<body>

    <div class="mt-5 mb-5">
        <section class="section">
            <div class="mt-5">
                <div class="container">
                    <h4>Export Hasil Validasi..?</h4>
                    <div class="row">
                        <div class="col">
                            <table class="table table-striped table-bordered" id="example" style="width: 100%">
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
                            <script>
                                $(document).ready(function() {
                                    var table = $("#example").DataTable({
                                        lengthChange: false,
                                        buttons: ["print", "excel", "pdf"],
                                    });

                                    table
                                        .buttons()
                                        .container()
                                        .appendTo("#example_wrapper .col-md-6:eq(0)");
                                });
                            </script>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <a href="/admin/resultstaff" class="btn btn-danger shadow float-left"><i class="bi bi-arrow-left-circle"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
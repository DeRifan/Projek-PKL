<?php
$title = 'Data Laporan';
require 'koneksi.php';

$query = "SELECT * FROM profit";
$data = mysqli_query($conn, $query);

require 'header.php';
?>

<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">LAPORAN</h2>
            </div>
        </div>
        <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
            <div class="alert alert-success" role="alert" id="msg">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php }
        $_SESSION['msg'] = ''; ?>
    </div>
</div>
<div class="page-inner mt--5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title"><?= $title; ?></h4>
                        <a href="cetak.php" target="_blank" class="btn btn-dark btn-round ml-auto">
                            <i class="fas fa-print"></i>
                            Cetak Laporan
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatableshd" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 7%">Rating</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Profit</th>
                                    <th style="width: 5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                if (mysqli_num_rows($data) > 0) {
                                    while ($profit = mysqli_fetch_assoc($data)) {
                                ?>

                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $profit['nama_karyawan']; ?></td>
                                            <td><?= $profit['jml_profit']; ?></td>

                                            <td>
                                                <div class="form-button-action">
                                                    <a href="edit_laporan.php?id=<?= $profit['id_profit']; ?>" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-dark btn-lg" data-original-title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="hapus_laporan.php?id=<?= $profit['id_profit']; ?>" onclick="return confirm('Yakin hapus data?');" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Hapus">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</div>
</div>
<?php
require 'footer.php';
?>
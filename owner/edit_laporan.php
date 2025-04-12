<?php
$title = 'Edit Data Laporan';
require 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM profit WHERE id_profit = $id";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_karyawan'];
    $profit = $_POST['jml_profit'];
    $query = "UPDATE profit SET nama_karyawan = '$nama', jml_profit = '$profit' WHERE id_profit = $id";

    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil mengubah data';
        header('location: laporan.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location:laporan.php');
    }
}

require 'header.php';
?>
<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">EDIT LAPORAN</h2>
            </div>
        </div>
        <?php if (isset($_SESSION['msg']) && $_SESSION['msg'] <> '') { ?>
            <div class="alert alert-success" role="alert" id="msg">
                <?= $_SESSION['msg']; ?>
            </div>
        <?php }
        $_SESSION['msg'] = ''; ?>
        <div class="page-header">
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="index.php" style="color: white;">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator" style="color: white;">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="laporan.php" class="text-white">Laporan</a>
                </li>
                <li class="separator" style="color: white;">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-white">Edit Data Laporn</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><?= $title; ?></div>
                    </div>
                    <?php while ($edit = mysqli_fetch_array($queryedit)) {
                    ?>
                        <form action="" method="POST">
                            <div class="card-body" style="color:00FFFFFF">
                                <div class="form-group">
                                    <label for="largeInput">Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_karyawan']; ?>" placeholder="Nama...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Profit</label>
                                    <input type="text" name="jml_profit" class="form-control form-control" id="defaultInput" value="<?= $edit['jml_profit']; ?>" placeholder="profit...">
                                </div>
                                <div class="card-action">
                                    <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<?php 
require 'footer.php';
?>
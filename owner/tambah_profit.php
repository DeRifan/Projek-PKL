<?php
$title = 'Tambah Data Profit';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_karyawan'];
    $profit = $_POST['jml_profit'];
    $jml_order = $_POST['jml_order'];
    $jml_akun = $_POST['jml_akun'];
    $query = "INSERT INTO profit (nama_karyawan, jml_profit, jml_order, jml_akun) values ('$nama', '$profit', '$jml_order', '$jml_akun')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {
        $_SESSION['msg'] = 'Berhasil menambahkan data baru';
        header('location:profit.php?');
    } else {
        $_SESSION['msg'] = 'Gagal menambahkan data baru!!!';
        header('location: profit.php');
    }
}

require 'header.php';
?>
<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">TAMBAH DATA</h2>
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
                    <a href="profit.php" class="text-white">Profit</a>
                </li>
                <li class="separator" style="color: white;">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-white">Tambah Data Profit</a>
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
                    <form action="" method="POST">
                        <div class="card-body" style="color:00FFFFFF">
                            <div class="form-group">
                                <label for="largeInput">Nama Karyawan</label>
                                <input type="text" name="nama_karyawan" class="form-control form-control" id="defaultInput" placeholder="Nama...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Profit</label>
                                <input type="text" name="jml_profit" class="form-control form-control" id="defaultInput" placeholder="profit...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jumlah Order</label>
                                <input type="number" name="jml_order" class="form-control form-control" id="defaultInput" placeholder="Jumlah Order...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Jumlah Akun</label>
                                <input type="number" name="jml_akun" class="form-control form-control" id="defaultInput" placeholder="Jumlah Akun...">
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
<?php 
require 'footer.php'; 
?>
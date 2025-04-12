<?php
$title = 'Tambah Data Karyawan';
require 'koneksi.php';

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];
    $query = "INSERT INTO user (nama_user, username, password, role) values ('$nama', '$username', '$password', '$role')";

    $insert = mysqli_query($conn, $query);
    if ($insert == 1) {

        $_SESSION['msg'] = 'Berhasil menambahkan ' . $role . ' baru';
        header('location:karyawan.php');
    } else {
        $_SESSION['msg'] = 'Gagal mengubah data!!!';
        header('location: karyawan.php');
    }
}

require 'header.php';
?>
<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">TAMBAH DATA KARYAWAN</h2>
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
                    <a href="karyawan.php" class="text-white">Karyawan</a>
                </li>
                <li class="separator" style="color: white;">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-white">Tambah Data karyawan</a>
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
                                <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" placeholder="Nama...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Username</label>
                                <input type="text" name="username" class="form-control form-control" id="defaultInput" placeholder="Username...">
                            </div>
                            <div class="form-group">
                                <label for="largeInput">Password</label>
                                <input type="text" name="password" class="form-control form-control" id="defaultInput" placeholder="Pass...">
                            </div>
                            <div class="form-group">
                                <label for="defaultSelect">Role</label>
                                <select name="role" class="form-control form-control" id="defaultSelect">
                                    <option value="admin">Admin</option>
                                    <option value="kasir">Kasir</option>
                                    <option value="owner">Owner</option>
                                </select>
                            </div>
                            <div class="card-action">
                                <button type="submit" name="btn-simpan" class="btn btn-success">Submit</button>
                                <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger">Batal</a>
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
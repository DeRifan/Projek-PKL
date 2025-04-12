<?php
$title = 'Edit Data Karyawan';
require 'koneksi.php';

$role = [
    'admin',
    'owner',
    'kasir'
];
$id_user = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user = '$id_user'";
$queryedit = mysqli_query($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama = $_POST['nama_user'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    if ($_POST['password'] != null || $_POST['password'] == '') {
        $password = md5($_POST['password']);
        $query = "UPDATE user SET nama_user = '$nama', username = '$username', role = '$role', password = '$password' WHERE id_user = '$id_user'";
    } else {
        $query = "UPDATE user SET nama_user = '$nama', username = '$username', role = '$role' WHERE id_user = '$id_user'";
    }

    $update = mysqli_query($conn, $query);
    if ($update == 1) {
        $_SESSION['msg'] = 'Berhasil Update ' . $role;
        header('location:karyawan.php');
    } else {
        echo "<div class='alert alert-danger>Gagal Update Data!!!</div>";
        $_SESSION['msg'] = 'Gagal mengupdate data ' . $role . '!!!';
        header('location:karyawan.php');
    }
}

require 'header.php';
?>
<div class="panel-header bg-dark-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">EDIT KARYAWAN</h2>
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
                    <a href="karyawan.php" class="text-white">karyawan</a>
                </li>
                <li class="separator" style="color: white;">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#" class="text-white">Edit Data Karyawan</a>
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
                                    <input type="text" name="nama_user" class="form-control form-control" id="defaultInput" value="<?= $edit['nama_user']; ?>" placeholder="Nama...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Username</label>
                                    <input type="text" name="username" class="form-control form-control" id="defaultInput" value="<?= $edit['username']; ?>" placeholder="Username...">
                                </div>
                                <div class="form-group">
                                    <label for="largeInput">Password</label>
                                    <input type="text" name="password" class="form-control form-control" id="defaultInput">
                                    <small>Kosongkan jika tidak melakukan perubahan password</small>
                                </div>
                                <div class="form-group">
                                    <label for="defaultSelect" class="text-white">Role</label>
                                    <select name="role" class="form-control form-control" id="defaultSelect">
                                        <?php foreach ($role as $key) : ?>
                                            <?php if ($key == $edit['role']) : ?>
                                                <option value="<?= $key ?>" selected><?= $key ?></option>
                                            <?php endif ?>
                                            <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                        <?php endforeach ?>
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
<?php } ?>
<?php 
require 'footer.php';
?>
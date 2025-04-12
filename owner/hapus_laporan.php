<?php
require 'koneksi.php';

$query = "DELETE FROM profit WHERE id_profit = " . $_GET['id'];
$delete = mysqli_query($conn, $query);

if ($delete) {
    $_SESSION['msg'] = 'Berhasil menghapus data';
    header('location:laporan.php');
} else {
    $_SESSION['msg'] = 'Gagal Hapus Data!!!';
    header('location:laporan.php');
}

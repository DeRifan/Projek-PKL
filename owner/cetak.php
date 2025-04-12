<?php

require 'koneksi.php';
$query = "SELECT * FROM profit";
$data = mysqli_query($conn, $query);

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cetak Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>

    <center>

        <h2>DATA LAPORAN PROFIT</h2>
        <h6><?= strftime('%A %d %B %Y') ?></h6>
        <h6 class="mr-auto">Oleh : <?= $_SESSION['username']; ?></h6>
        <br>
    
        <table class="table table-bordered" style="width: 50%;">
            <thead>
                <tr>
                    <th style="width: 3%">Rating</th>
                    <th style="width: 20%">Nama karyawan</th>
                    <th style="width: 20%">Profit</th>
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
                        </tr>
                <?php }
                }
                ?>
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>
    
</body>

</html>
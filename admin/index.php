<?php
$title = 'Selamat Datang Kembali Administrator';
require 'koneksi.php';
require 'header.php';

setlocale(LC_ALL, 'id_id');
setlocale(LC_TIME, 'id_ID.utf8');

$query = mysqli_query($conn, "SELECT COUNT(id_profit) as rating FROM profit");
$rating = mysqli_fetch_assoc($query);

$query4 = mysqli_query($conn, "SELECT SUM(jml_profit) as penghasilan_profit FROM report");
$penghasilan_profit = mysqli_fetch_assoc($query4);

$query5 = mysqli_query($conn, "SELECT SUM(jml_order) as penghasilan_order FROM report WHERE jml_order");
$penghasilan_order = mysqli_fetch_assoc($query5);

$query6 = mysqli_query($conn, "SELECT SUM(jml_akun) as penghasilan_akun FROM report WHERE jml_akun");
$penghasilan_akun = mysqli_fetch_assoc($query6);

$spreadsheetId = ('12h-sded6jc96OZ83r6SJzBZcO3zOzffk5L5htQwHtJM');
$range = 'Sheet6!C15:E15';
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h1 class="text-white pb-2 fw-bold"><?= $title; ?></h1>
                <h2 class="text-white op-7 mb-2">Admin Dashboard</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row">
        <a href="report2.php">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-hand-holding-usd"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Profit</p>
                                <h4 class="card-title"><?= $rating['rating']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href="order.php">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-shopping-basket"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Order</p>
                                <h4 class="card-title"><?= $rating['rating']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href="akun.php">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-users"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Akun</p>
                                <h4 class="card-title"><?= $rating['rating']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <a href="report.php">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fa fa-money-bill-wave"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Profit Report</p>
                                <h4 class="card-title"><?= $rating['rating']; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <a href=""></a>
            <div class="card card-dark bg-dark-gradient">
                <div class="card-body skew-shadow">
                    <h1><?= 'Rp ' . number_format($penghasilan_profit['penghasilan_profit']); ?></h1>
                    <h2 class="op-8">Penghasilan Profit</h2>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">
                            <hr>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-dark-gradient">
                <div class="card-body bubble-shadow">
                    <h1><?= ' ' . number_format($penghasilan_order['penghasilan_order']); ?></h1>
                    <h2 class="op-8">Jumlah Order</h2>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">
                            <hr>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-dark bg-dark">
                <div class="card-body curves-shadow">
                    <h1><?= ' ' . number_format($penghasilan_akun['penghasilan_akun']); ?></h1>
                    <h2 class="op-8">Jumlah Akun</h2>
                    <div class="pull-right">
                        <h3 class="fw-bold op-8">
                            <hr>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<?php
require 'footer.php';
?>

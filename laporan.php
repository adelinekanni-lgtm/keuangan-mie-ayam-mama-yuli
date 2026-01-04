<?php
include 'config/koneksi.php';

$tgl = date('Y-m-d');

$in  = mysqli_fetch_assoc(
        mysqli_query($conn,
        "SELECT SUM(total) AS total_pemasukan 
         FROM pemasukan 
         WHERE tanggal='$tgl'")
      );

$out = mysqli_fetch_assoc(
        mysqli_query($conn,
        "SELECT SUM(total) AS total_pengeluaran 
         FROM pengeluaran 
         WHERE tanggal='$tgl'")
      );

$totalPemasukan  = $in['total_pemasukan'] ?? 0;
$totalPengeluaran = $out['total_pengeluaran'] ?? 0;
$untung = $totalPemasukan - $totalPengeluaran;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#eaeaea;
        }
        .container{
            width:450px;
            margin:40px auto;
            background:#ffffff;
            padding:25px;
            border:1px solid #ccc;
            text-align:center;
        }
        h3{
            font-size:26px;
            margin-bottom:5px;
            color:#000;
        }
        .tanggal{
            font-size:15px;
            margin-bottom:20px;
            color:#000;
        }
        .box{
            padding:15px;
            margin-bottom:15px;
            border:1px solid #ccc;
            font-size:16px;
            color:#000;
        }
        .untung{
            font-weight:bold;
            font-size:18px;
        }
        .back{
            display:inline-block;
            margin-top:15px;
            font-size:15px;
            color:#000;
            text-decoration:none;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Laporan Keuangan</h3>
    <div class="tanggal">Tanggal : <?= $tgl ?></div>

    <div class="box">
        Total Pemasukan<br>
        <b>Rp<?= number_format($totalPemasukan,0,',','.') ?></b>
    </div>

    <div class="box">
        Total Pengeluaran<br>
        <b>Rp<?= number_format($totalPengeluaran,0,',','.') ?></b>
    </div>

    <div class="box untung">
        Keuntungan Hari Ini<br>
        Rp<?= number_format($untung,0,',','.') ?>
    </div>

    <a href="dashboard.php" class="back">Kembali ke Dashboard</a>
</div>

</body>
</html>

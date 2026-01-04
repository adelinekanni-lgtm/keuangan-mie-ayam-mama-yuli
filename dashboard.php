<?php 
session_start(); 
if(!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard </title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#dfe6e9;
        }
        .container{
            width:600px;
            margin:40px auto;
            background:#ffffff;
            padding:30px;
            border-radius:8px;
            border:1px solid #bbb;
            text-align:center;
        }
        h2{
            font-size:26px;
            margin-bottom:25px;
            color:#2d3436;
        }
        .menu a{
            display:block;
            padding:15px;
            margin:12px 0;
            border-radius:6px;
            text-decoration:none;
            font-size:17px;
            color:#ffffff;
        }

        .pemasukan{ background:#27ae60; }
        .pengeluaran{ background:#e74c3c; }
        .laporan{ background:#2980b9; }
        .riwayat{ background:#8e44ad; }
        .logout{ background:#636e72; }

        .menu a:hover{
            opacity:0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Dashboard Pencatatan Keuangan Mie Ayam <br> Mama Yuli</h2>

    <div class="menu">
        <a href="pemasukan.php" class="pemasukan">Pemasukan</a>
        <a href="pengeluaran.php" class="pengeluaran">Pengeluaran</a>
        <a href="laporan.php" class="laporan">Laporan</a>
        <a href="riwayat.php" class="riwayat">Riwayat Keuangan</a>
        <a href="logout.php" class="logout">Logout</a>
    </div>
</div>

</body>
</html>

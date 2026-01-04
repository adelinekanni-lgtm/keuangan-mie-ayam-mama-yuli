<?php
include 'config/koneksi.php';

/* tanggal default hari ini */
$tgl = date('Y-m-d');

/* SIMPAN DATA */
if(isset($_POST['simpan'])){
    $tgl     = $_POST['tanggal'];
    $menu    = $_POST['menu'];
    $harga   = $_POST['harga'];
    $jumlah  = $_POST['jumlah'];
    $total   = $harga * $jumlah;

    mysqli_query($conn,
        "INSERT INTO pemasukan 
         VALUES(NULL,'$tgl','$menu','$harga','$jumlah','$total')"
    );
}

/* TOTAL PEMASUKAN HARIAN */
$qTotal = mysqli_query($conn,
    "SELECT SUM(total) AS total_harian 
     FROM pemasukan 
     WHERE tanggal='$tgl'"
);
$dTotal = mysqli_fetch_assoc($qTotal);
$totalHariIni = $dTotal['total_harian'] ?? 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pemasukan</title>
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
        }
        h3{
            text-align:center;
            font-size:26px;
            margin-bottom:5px;
        }
        .tanggal{
            text-align:center;
            font-size:15px;
            margin-bottom:10px;
        }
        .total{
            text-align:center;
            font-size:20px;
            font-weight:bold;
            color:green;
            margin-bottom:20px;
            padding:10px;
            background:#f5f5f5;
            border:1px solid #ccc;
        }
        label{
            font-size:15px;
        }
        input, select{
            width:100%;
            padding:10px;
            margin:6px 0 14px;
            font-size:15px;
        }
        button{
            width:100%;
            padding:12px;
            font-size:16px;
            background:green;
            color:white;
            border:none;
            cursor:pointer;
        }
        button:hover{
            opacity:0.9;
        }
        .back{
            display:block;
            text-align:center;
            margin-top:15px;
            font-size:15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Pemasukan</h3>
    <div class="tanggal">Tanggal : <?= $tgl ?></div>

    <div class="total">
        Total Hari Ini : Rp<?= number_format($totalHariIni,0,',','.') ?>
    </div>

    <form method="post">
        <label>Tanggal</label>
        <input type="date" name="tanggal" value="<?= $tgl ?>" required>

        <label>Menu</label>
        <select name="menu" required>
            <option value="">-- Pilih Menu --</option>
            <option>Mie ayam biasa tanpa bakso</option>
            <option>Mie ayam biasa pakai bakso</option>
            <option>Mie ayam jumbo tanpa bakso</option>
            <option>Mie ayam jumbo pakai bakso</option>
        </select>

        <label>Harga per Porsi</label>
        <input type="number" name="harga" required>

        <label>Jumlah Porsi</label>
        <input type="number" name="jumlah" required>

        <button type="submit" name="simpan">Simpan</button>
        <a href="dashboard.php" class="back">Kembali ke Dashboard</a>
    </form>
</div>

</body>
</html>

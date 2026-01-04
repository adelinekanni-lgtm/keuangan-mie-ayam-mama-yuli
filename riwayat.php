<?php
include 'config/koneksi.php';
$tgl = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Keuangan</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f2f2f2;
        }
        .container{
            width:700px;
            margin:40px auto;
            background:#ffffff;
            padding:25px;
        }
        h3{
            text-align:center;
            font-size:26px;
            margin-bottom:20px;
        }
        h4{
            font-size:20px;
            margin-top:30px;
        }
        .filter{
            text-align:center;
            margin-bottom:20px;
        }
        .filter input{
            padding:8px;
            font-size:15px;
        }
        .filter button{
            padding:8px 14px;
            font-size:15px;
            cursor:pointer;
        }
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
            font-size:15px;
        }
        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:left;
        }
        th{
            background:#f0f0f0;
        }
        .back{
            display:block;
            text-align:center;
            margin-top:25px;
            font-size:15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Riwayat Keuangan</h3>

    <!-- FILTER TANGGAL -->
    <div class="filter">
        <form method="get">
            <b>Pilih Tanggal :</b>
            <input type="date" name="tanggal" value="<?= $tgl ?>">
            <button type="submit">Tampilkan</button>
        </form>
    </div>

    <!-- PEMASUKAN -->
    <h4>Pemasukan</h4>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Menu</th>
            <th>Total</th>
        </tr>
        <?php
        $where = $tgl ? "WHERE tanggal='$tgl'" : "";
        $q = mysqli_query($conn,"SELECT * FROM pemasukan $where ORDER BY tanggal DESC");

        if(mysqli_num_rows($q)==0){
            echo "<tr><td colspan='3'>Data tidak ada</td></tr>";
        }

        while($d = mysqli_fetch_assoc($q)){
        ?>
        <tr>
            <td><?= $d['tanggal'] ?></td>
            <td><?= $d['menu'] ?></td>
            <td>Rp<?= number_format($d['total'],0,',','.') ?></td>
        </tr>
        <?php } ?>
    </table>

    <!-- PENGELUARAN -->
    <h4>Pengeluaran</h4>
    <table>
        <tr>
            <th>Tanggal</th>
            <th>Barang</th>
            <th>Total</th>
        </tr>
        <?php
        $q = mysqli_query($conn,"SELECT * FROM pengeluaran $where ORDER BY tanggal DESC");

        if(mysqli_num_rows($q)==0){
            echo "<tr><td colspan='3'>Data tidak ada</td></tr>";
        }

        while($d = mysqli_fetch_assoc($q)){
        ?>
        <tr>
            <td><?= $d['tanggal'] ?></td>
            <td><?= $d['barang'] ?></td>
            <td>Rp<?= number_format($d['total'],0,',','.') ?></td>
        </tr>
        <?php } ?>
    </table>

    <a href="dashboard.php" class="back">← Kembali ke Dashboard</a>
</div>

</body>
</html>

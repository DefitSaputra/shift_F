<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembelian Tiket Bus Riyan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        .title {
            font-size: 24px;
            font-weight: bold;
            color: #e63946;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .result {
            margin-top: 20px;
            background-color: #f1faee;
            padding: 15px;
            border-radius: 8px;
            color: #1d3557;
        }
        .btn {
            background-color: #457b9d;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            width: 100%;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #1d3557;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="title">Pembelian Tiket Bus Riyan</div>
    <form method="POST">
        <div class="form-group">
            <label>Nama Pemesan:</label>
            <input type="text" name="nama_pemesan" required>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Jadwal Berangkat:</label>
            <input type="datetime-local" name="jadwal_berangkat" required>
        </div>
        <div class="form-group">
            <label>Jadwal Pulang:</label>
            <input type="datetime-local" name="jadwal_pulang" required>
        </div>
        <div class="form-group">
            <label>Lokasi Tujuan:</label>
            <select name="lokasi_tujuan" required>
                <option value="Cilacap-Klaten">Cilacap - Klaten</option>
                <option value="Klaten-Cilacap">Klaten - Cilacap</option>
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah Penumpang:</label>
            <input type="number" name="jumlah_penumpang" min="1" required>
        </div>
        <div class="form-group">
            <label>Pilih Diskon:</label>
            <select name="diskon">
                <option value="0">Tanpa Diskon</option>
                <option value="10000">Diskon Website - Rp10,000</option>
                <option value="15000">Diskon Aplikasi - Rp15,000</option>
            </select>
        </div>
        <button type="submit" class="btn">Hitung Total</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hargaTiket = 100000;
        $jumlahPenumpang = $_POST['jumlah_penumpang'];
        $diskon = $_POST['diskon'];
        
        $totalHargaSebelumDiskon = $hargaTiket * $jumlahPenumpang;
        $totalHargaSetelahDiskon = $totalHargaSebelumDiskon - $diskon;

        echo "<div class='result'>";
        echo "<h3>Detail Pemesanan</h3>";
        echo "<p>Nama Pemesan: " . htmlspecialchars($_POST['nama_pemesan']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p>Jadwal Berangkat: " . htmlspecialchars($_POST['jadwal_berangkat']) . "</p>";
        echo "<p>Jadwal Pulang: " . htmlspecialchars($_POST['jadwal_pulang']) . "</p>";
        echo "<p>Lokasi Tujuan: " . htmlspecialchars($_POST['lokasi_tujuan']) . "</p>";
        echo "<p>Jumlah Penumpang: $jumlahPenumpang</p>";
        echo "<p>Harga Tiket per Penumpang: Rp" . number_format($hargaTiket, 0, ',', '.') . "</p>";
        echo "<p>Total Harga Sebelum Diskon: Rp" . number_format($totalHargaSebelumDiskon, 0, ',', '.') . "</p>";
        echo "<p>Diskon: Rp" . number_format($diskon, 0, ',', '.') . "</p>";
        echo "<p><strong>Total Harga Setelah Diskon: Rp" . number_format($totalHargaSetelahDiskon, 0, ',', '.') . "</strong></p>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>

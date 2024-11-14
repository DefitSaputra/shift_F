<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} else {
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Index</title>
    <script>
        // Fungsi untuk melakukan countdown dan pengalihan
        function countdown() {
            let seconds = 10;
            let countdownTimer = setInterval(function() {
                document.getElementById('countdown').textContent = seconds;
                seconds--;

                if (seconds < 0) {
                    clearInterval(countdownTimer);
                    window.location.href = 'logout.php';
                }
            }, 1000); // Set interval waktu ke 1 detik
        }
    </script>
</head>
<body onload="countdown()">
    <h1>Halaman Index</h1>
    <p>Selamat datang <b><?php echo $username; ?></b>, Anda berhasil login!</p>
    <p><span id="countdown">10</span></p>
</body>
</html>

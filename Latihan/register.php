<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert ke database
    $query = "INSERT INTO user (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($koneksi, $query)) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Register</title>
</head>
<body>
    <h1>Halaman Registrasi Akun Mahasiswa</h1>
    <form action="" method="POST">
        <ul type="circle">
            <li>Username</li>
            <input type="text" name="username" required>
            <li>Password</li>
            <input type="password" name="password" required> <br>
            <li>Konfirmasi Password</li>
            <input type="password" name="ConfirmPassword" required> <br>
            <li><button type="submit">Register!</button></li>
        </ul>
    </form>
    <a href="login.php">Sudah memiliki akun?</a>
</body>
</html>

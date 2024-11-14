<?php
session_start();
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Halaman Login User yang Terdaftar!</h1>
    <form action="" method="POST">
        <ul type="circle">
            <li>Username</li>
            <input type="text" name="username" required>
            <li>Password</li>
            <input type="password" name="password" required> <br>
            <li><button type="submit">Login!</button></li>
        </ul>
    </form>
    <a href="register.php">Buat akun baru!</a>
</body>
</html>

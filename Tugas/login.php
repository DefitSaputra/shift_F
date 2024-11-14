<?php
session_start();

// Array default username dan password yang disimpan di sesi jika belum ada
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        "user1" => "password1",
        "user2" => "password2",
        "admin" => "admin123"
    ];
}

// Menangani penambahan username baru
if (isset($_POST['add_username'])) {
    $new_username = $_POST['new_username'];
    $_SESSION['temp_username'] = $new_username;
    $username_message = "Username berhasil ditambahkan!";
}

// Menangani penambahan password baru
if (isset($_POST['add_password'])) {
    $new_password = $_POST['new_password'];
    $temp_username = $_SESSION['temp_username'] ?? null;

    if ($temp_username) {
        $_SESSION['users'][$temp_username] = $new_password;
        unset($_SESSION['temp_username']); // Hapus username sementara
        $password_message = "Password berhasil ditambahkan!";
    } else {
        $password_message = "Tambahkan username terlebih dahulu!";
    }
}

// Proses login
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username dan password sesuai
    if (isset($_SESSION['users'][$username]) && $_SESSION['users'][$username] === $password) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } else {
        $login_error = "Username atau Password salah!";
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
    <!-- Form untuk menambahkan username -->
    <form method="POST" action="">
        <h1>Tambahkan Username!</h1> 
        <input type="text" name="new_username" required>
        <button type="submit" name="add_username">Tambah Username</button>
        <?php if (isset($username_message)) echo "<p>$username_message</p>"; ?>
    </form>

    <!-- Form untuk menambahkan password -->
    <form method="POST" action="">
        <h1>Tambahkan Password!</h1>
        <input type="password" name="new_password" required>
        <button type="submit" name="add_password">Tambah Password</button>
        <?php if (isset($password_message)) echo "<p>$password_message</p>"; ?>
    </form>

    <!-- Form untuk login -->
    <form method="POST" action="">
        <h1>Silakan Login!</h1>
        <label>Username</label>
        <input type="text" name="username" required><br>
        <label>Password</label>
        <input type="password" name="password" required><br> &emsp; &emsp; &emsp; &nbsp;
        <button type="submit" name="login">Login</button>
        <?php if (isset($login_error)) echo "<p style='color:red;'>$login_error</p>"; ?>
    </form>
</body>
</html>

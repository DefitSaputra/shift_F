<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 3</title>
</head>
<body>
    <?php echo "<h1> Hallo " . $_SESSION["nama"] . ".</h1>";?>
    <h3>Selamat Datang Di Situs Kami</h3>

    <?php 
    echo"Umur : " . $_SESSION["umur"] . "tahun <br>";
    echo"Alamat email : " . $_SESSION["email"] . "<br>";
    ?>
</body>
</html>
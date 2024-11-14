<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Percobaan 2</title>
</head>
<body>
    <?php 
    echo "Username session: ";
    echo $_SESSION['username'];
    echo "<br> <br>";
    ?>
    <a href="set.php"><button>Set Session</button></a>
    <a href="destroy.php"><button>Destroy Session</button></a>
</body>
</html>
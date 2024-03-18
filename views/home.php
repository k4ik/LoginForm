<?php 
    session_start();
    include './includes/protect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
    <?php 
        if(isset($_SESSION["id"])){
            echo "Username: ".$_SESSION["name"]."<br>";
            echo "Email: ".$_SESSION["email"]."<br>";
        }
    ?>

    <p><a href="/logout">Logout</a></p>
</body>
</html>
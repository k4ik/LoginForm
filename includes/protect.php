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
        if(!isset($_SESSION)) {
            session_start();
        }

        if(!isset($_SESSION["id"])) {
            die("You need to be logged in to access this page.<p><a href=\"/\">Login</p>");
        }
    ?>
</body>
</html>
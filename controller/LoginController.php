<?php
include '../db/conn.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email) || empty($password)) {
        echo "Fill in the fields!";
        return;
    }

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password';";
    $check_result = pg_query($con, $query);

    if(pg_num_rows($check_result) == 1) {
        if(!isset($_SESSION)) {
            session_start();
        }

        $_SESSION["id"] = $row["id"];
        $_SESSION["name"] = $row["username"];
        $_SESSION["email"] = $row["email"];

        header("Location: /home");
        exit();
    } else {
        echo "Incorrect email or password! Please check the data!";
    }
}

pg_close($con);
?>

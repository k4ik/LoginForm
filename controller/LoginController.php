<?php
include '../includes/conn.php';
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

    if(!$check_result) {
        echo "An error has occurred! Try again!";
    } else {
        $row = pg_fetch_assoc($check_result);

        if($row["email"] != $email || $row["password"] != $password) {
            echo "Incorrect email or password! Please check the data!";
            return;
        } else {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            echo "success";
            exit();
        }
    }
}

pg_close($con);
?>

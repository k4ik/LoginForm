<?php 
    include '../db/conn.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if($password == $confirmPassword) {
            $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if(!pg_query($con, $query)) {
                die('Query failed: ' . pg_last_error());
            } else {
                echo "usuário criado com sucesso";
            }
        } else {
            echo "As senhas não combinam";
        }
    }

    pg_close($con);
?>

<?php 
    include '../db/conn.php';

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
?>

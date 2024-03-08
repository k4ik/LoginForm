<?php
include '../db/conn.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password';";
    $check_result = pg_query($con, $query);
    if (!$check_result) {
        die('Query failed: ' . pg_last_error());
    } else {
        $row = pg_fetch_assoc($check_result);
        if ($row) {
            echo "Usuário encontrado:<br>";
            echo "ID: " . $row["id"] . "<br>";
            echo "Nome: " . $row["username"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
        } else {
            echo "Usuário não encontrado";
        }
    }
    
}

pg_close($con);

<?php
include '../db/conn.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($email) || empty($password)) {
        echo "Preencha os campos!";
        return;
    }

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password';";
    $check_result = pg_query($con, $query);

    if(!$check_result) {
        echo "Erro ao executar a query.";
    } else {
        $row = pg_fetch_assoc($check_result);

        if($row["email"] != $email || $row["password"] != $password) {
            echo "Email ou senha incorretos! Por favor verifique os dados!";
            return;
        } else {
            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            header("Location: /home");
            exit();
        }
    }
}

pg_close($con);
?>

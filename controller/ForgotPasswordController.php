<?php 
    include '../db/conn.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_REQUEST["email"];
        $oldPassword = $_REQUEST["oldPassword"];
        $newPassword = $_REQUEST["newPassword"];
        $confirmNewPassword = $_REQUEST["confirmNewPassword"];

        if($oldPassword != "" && $newPassword == $confirmNewPassword) {
            $query = "SELECT * FROM users WHERE email='$email' AND password='$oldPassword';";
            $result = pg_query($con, $query);
            if (!$result) {
                die('Query failed: ' . pg_last_error());
            }

            if(pg_num_rows($result) > 0) {
                $updatePassword = "UPDATE users SET password='$newPassword' WHERE email='$email';";
                if(!pg_query($con, $updatePassword)) {
                    die('Error: ' . pg_last_error());
                } else {
                    echo "Senha atualizada com sucesso";
                }
            } else {
                echo "Senha antiga incorreta";
            }
        } else {
            echo "As senhas não coincidem ou a senha antiga está vazia";
        }
    }
?>

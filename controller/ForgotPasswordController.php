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

        if(empty($email) || empty($oldPassword) || empty($newPassword) || empty($confirmNewPassword)) {
            echo "Preencha os campos";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email' AND password='$oldPassword';";
        $check_result = pg_query($con, $query);

        if(!$check_result) {
            echo "Erro ao executar a query";
        } else {
            if(pg_num_rows($check_result) == 1) {
                if($oldPassword == $newPassword) {
                    echo "A nova senha precisa ser diferente da atual";
                    return;
                }

                if($newPassword != $confirmNewPassword) {
                    echo "As senhas não coincidem";
                    return;
                } 

                $query2 = "UPDATE users SET password='$newPassword' WHERE email='$email';";
                $check_result2 = pg_query($con, $query2);
                if(!$check_result2) {
                    echo "Erro ao executar a query!";
                } else {
                    echo "Senha alterada com sucesso";
                }
            } else {
                echo "Usuário não encontrado";
            }
        }
    
    }
?>

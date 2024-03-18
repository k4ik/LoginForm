<?php 
    include '../db/conn.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if(empty($username)||empty($email) || empty($password) || empty($confirmPassword)) {
            echo "Preencha os campos";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email';";
        $check_result = pg_query($con, $query);

        if(!$check_result) {
            echo "Erro ao executar a query!";
            return;
        } else {
            $row = pg_fetch_assoc($check_result);

            if($row["email"] == $email) {
                echo "Esse email já foi cadastrado";
                return;
            }

            if($password == $confirmPassword) {
                $query2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password') RETURNING id;";
                $check_result2 = pg_query($con, $query2);
                if(!$check_result2) {
                    echo "Erro ao executar a query!";
                } else {
                    $row2 = pg_fetch_assoc($check_result2);
    
                    session_start();
                    $_SESSION["id"] = $row2["id"];
                    $_SESSION["name"] = $username;
                    $_SESSION["email"] = $email;
    
                    header("Location: /home");
                    exit();
                }
            } else {
                echo "As senhas não combinam";
            }
        }
    }

    pg_close($con);
?>

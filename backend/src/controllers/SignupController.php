<?php
use Respect\Validation\Validator as v;

class UserRegistration
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function register($username, $email, $password, $confirmPassword)
    {
        if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
            echo "Preencha os campos!";
            return;
        }

        if (!v::email()->validate($email)) {
            echo "Email inválido!";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email';";
        $check_result = pg_query($this->con, $query);

        if (!$check_result) {
            echo "Ocorreu um erro! Tente novamente!";
            return;
        } else {
            if (pg_num_rows($check_result) == 1) {
                echo "Esse email já foi cadastrado!";
                return;
            }

            if ($password == $confirmPassword) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $query2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash') RETURNING id;";
                $check_result2 = pg_query($this->con, $query2);
                if (!$check_result2) {
                    echo "Ocorreu um erro! Tente novamente!";
                } else {
                    echo "success";
                }
            } else {
                echo "As senhas não combinam!";
            }
        }
    }
}

$userRegistration = new UserRegistration($con);

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];

$userRegistration->register($username, $email, $password, $confirmPassword);

pg_close($con);

<?php
use Respect\Validation\Validator as v;

class Auth
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function login($email, $password)
    {
        if (empty($email) || empty($password)) {
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
        } else {
            $row = pg_fetch_assoc($check_result);

            $password_verify = password_verify($password, $row["password"]);

            if ($row["email"] != $email || !$password_verify) {
                echo "Email ou senha incorretos!";
                return;
            }

            echo "success";
        }
    }
}

$auth = new Auth($con);
$email = $_POST["email"];
$password = $_POST["password"];
$auth->login($email, $password);

pg_close($con);

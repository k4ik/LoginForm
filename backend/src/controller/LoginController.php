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
            echo "Fill in the fields!";
            return;
        }

        if (!v::email()->validate($email)) {
            echo "Invalid email!";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email';";
        $check_result = pg_query($this->con, $query);

        if (!$check_result) {
            echo "An error has occurred! Try again!";
        } else {
            $row = pg_fetch_assoc($check_result);

            $password_verify = password_verify($password, $row["password"]);

            if ($row["email"] != $email || !$password_verify) {
                echo "Incorrect email or password! Please check the data!";
                return;
            }

            session_start();
            $_SESSION["id"] = $row["id"];
            $_SESSION["name"] = $row["username"];
            $_SESSION["email"] = $row["email"];

            echo "success";
            exit();
        }
    }
}

$auth = new Auth($con);
$email = $_POST["email"];
$password = $_POST["password"];
$auth->login($email, $password);

pg_close($con);

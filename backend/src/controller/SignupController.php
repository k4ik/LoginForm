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
            return;
        } else {
            if (pg_num_rows($check_result) == 1) {
                echo "This email has already been registered!";
                return;
            }

            if ($password == $confirmPassword) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $query2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash') RETURNING id;";
                $check_result2 = pg_query($this->con, $query2);
                if (!$check_result2) {
                    echo "An error has occurred! Try again!";
                } else {
                    $row2 = pg_fetch_assoc($check_result2);

                    session_start();
                    $_SESSION["id"] = $row2["id"];
                    $_SESSION["name"] = $username;
                    $_SESSION["email"] = $email;

                    echo "success";
                    exit();
                }
            } else {
                echo "The passwords do not match";
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

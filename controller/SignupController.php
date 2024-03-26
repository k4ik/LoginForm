<?php 
    include '../includes/conn.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];

        if(empty($username)||empty($email) || empty($password) || empty($confirmPassword)) {
            echo "Fill in the fields!";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email';";
        $check_result = pg_query($con, $query);

        if(!$check_result) {
            echo "An error has occurred! Try again!";
            return;
        } else {
            $row = pg_fetch_assoc($check_result);

            if($row["email"] == $email) {
                echo "This email has already been registered!";
                return;
            }

            if($password == $confirmPassword) {
                $query2 = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password') RETURNING id;";
                $check_result2 = pg_query($con, $query2);
                if(!$check_result2) {
                    echo "An error has occurred! Try again!";
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
                echo "The passwords do not match";
            }
        }
    }

    pg_close($con);
?>

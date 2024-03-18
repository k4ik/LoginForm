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
            echo "Fill in the fields!";
            return;
        }

        $query = "SELECT * FROM users WHERE email='$email' AND password='$oldPassword';";
        $check_result = pg_query($con, $query);

        if(!$check_result) {
            echo "An error has occurred! Try again!";
        } else {
            if(pg_num_rows($check_result) == 1) {
                if($oldPassword == $newPassword) {
                    echo "The new password must be different from the current one";
                    return;
                }

                if($newPassword != $confirmNewPassword) {
                    echo "Passwords do not match";
                    return;
                } 

                $query2 = "UPDATE users SET password='$newPassword' WHERE email='$email';";
                $check_result2 = pg_query($con, $query2);
                if(!$check_result2) {
                    echo "An error has occurred! Try again!";
                } else {
                    echo "Password changed successfully";
                }
            } else {
                echo "User not found";
            }
        }
    
    }
?>

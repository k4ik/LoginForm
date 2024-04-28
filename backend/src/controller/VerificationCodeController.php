<?php 
class Code {
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function reset($code, $newPassword, $confirmedPassword)
    {
        if(empty($code) || empty($newPassword) || empty($confirmedPassword)){
            echo "Fill in the fields!";
            return;
        }

        if($newPassword != $confirmedPassword) {
            echo "The passwords do not match";
            return;
        }

        $query = "SELECT * FROM users WHERE verification_code='$code';";
        $check_result = pg_query($this->con, $query);

        if(pg_num_rows($check_result) == 1) {
            $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

            $query2 = "UPDATE users SET password='$password_hash' WHERE verification_code='$code';";
            $check_result2 = pg_query($this->con, $query2);

            if(!$check_result2){
                echo "An error has occurred! Try again!";
                return;
            } else {
                echo "Password updated successfully!";
                $query3 = "UPDATE users SET verification_code = NULL WHERE verification_code='$code';";
                pg_query($this->con, $query3);

                header("Location: /");
                exit();
            }
        } else {
            echo "User not found! Check if you entered the code correctly and try again!";
        }
    }
}
    
$verification = new Code($con); 
$code = $_POST["code"];
$newPassword = $_POST["newPassword"];
$confirmedPassword = $_POST["confirmedPassword"];
$verification->reset($code, $newPassword, $confirmedPassword);

pg_close();
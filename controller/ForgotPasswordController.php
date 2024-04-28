<?php
include '../includes/conn.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

require '../vendor/includes/config.php';
require '../vendor/autoload.php';

use Respect\Validation\Validator as v;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];

    if (empty($email)) {
        echo "Fill in the fields!";
        return;
    }

    if(!v::email()->validate($email)) {
        echo "Invalid email!";
        return;
    }
 
    $query = "SELECT * FROM users WHERE email='$email';";
    $check_result = pg_query($con, $query);

    if (pg_num_rows($check_result) == 1) {
        $mail = new PHPMailer(true);
        $verificationCode = rand();

        $query2 = "UPDATE users SET verification_code='$verificationCode' WHERE email='$email';";
        pg_query($con, $query2);

        try {
            $mail->isSMTP();
            $mail->Host       = SMTP_HOST;
            $mail->SMTPAuth   = true;
            $mail->Username   = SMTP_USERNAME;
            $mail->Password   = SMTP_PASSWORD;
            $mail->SMTPSecure = 'ssl';
            $mail->Port       = SMTP_PORT;

            $mail->setFrom("ajsjhsagwha@gmail.com", "Support Team");
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "=?UTF-8?B?" . base64_encode("Password Reset - Verification Code: $verificationCode") . "?=";
            $mail->Body = "<p>To reset your password, please follow the link below and enter the provided verification code:</p>";
            $mail->Body .= "<p>Link: http://localhost:8000/verification-code</p>";
            $mail->Body .= "<p>Verification code: $verificationCode</p><br>";
            $mail->Body .= "<p>Best regards,<br>Support Team.</p>";

            $mail->send();
            echo "check your email inbox";
        } catch (Exception $e) {
            die("Error when trying to send email");
        }
    } else {
        echo "User not found! Try Again.";
    }
}

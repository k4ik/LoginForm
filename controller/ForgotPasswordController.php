<?php
include '../includes/conn.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

require '../includes/config.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_REQUEST["email"];

    if (empty($email)) {
        echo "Fill in the fields!";
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

            $mail->setFrom("kaik.e.l.couto@gmail.com", "Equipe de Suporte");
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = "=?UTF-8?B?" . base64_encode("Redefinição de Senha - Código de Verificação: $verificationCode") . "?=";
            $mail->Body = "<p>Para redefinir sua senha, acesse o link abaixo e insira o código de verificação fornecido:</p>";
            $mail->Body .= "<p>Link: http://localhost:8000/verification-code</p>";
            $mail->Body .= "<p>Código de verificação: $verificationCode</p><br>";
            $mail->Body .= "<p>Atenciosamente,<br>Equipe de Suporte.</p>";

            $mail->send();
        } catch (Exception $e) {
            die("Error when trying to send email");
        }
    } else {
        echo "User not found! Try Again.";
    }
}

<?php
use Respect\Validation\Validator as v;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ForgotPassword
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getCode($email)
    {
        if (empty($email)) {
            echo "Preencha os campos!";
            return;
        }
    
        if(!v::email()->validate($email)) {
            echo "Email inválido!";
            return;
        }
     
        $query = "SELECT * FROM users WHERE email='$email';";
        $check_result = pg_query($this->con, $query);
    
        if (pg_num_rows($check_result) == 1) {
            $mail = new PHPMailer(true);
            $verificationCode = rand();
    
            $query2 = "UPDATE users SET verification_code='$verificationCode' WHERE email='$email';";
            pg_query($this->con, $query2);
    
            try {
                $mail->isSMTP();
                $mail->Host       = SMTP_HOST;
                $mail->SMTPAuth   = true;
                $mail->Username   = SMTP_USERNAME;
                $mail->Password   = SMTP_PASSWORD;
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = SMTP_PORT;
    
                $mail->setFrom("ajsjhsagwha@gmail.com", "Equipe de Suporte");
                $mail->addAddress($email);
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';
                $mail->Subject = "=?UTF-8?B?" . base64_encode("Redefinição de senha - Código de verificação: $verificationCode") . "?=";
                $mail->Body = "<p>Para redefinir sua senha, por favor, siga o link abaixo e insira o código de verificação fornecido:</p>";
                $mail->Body .= "<p>Link: http://localhost:8000/code</p>";
                $mail->Body .= "<p>Código de verificação: $verificationCode</p><br>";
                $mail->Body .= "<p>Atenciosamente,<br>Equipe de Suporte.</p>";                
    
                $mail->send();
                echo "Olhe sua caixa de email!";
            } catch (Exception $e) {
                die("Erro ao tentar enviar e-mail!");
            }
        } else {
            echo "Usuário não encontrado! Verifique os dados!";
        }
    }
}

$forgot = new ForgotPassword($con);
$email = $_REQUEST["email"];
$forgot->getCode($email);

pg_close();
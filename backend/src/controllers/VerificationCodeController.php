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
            echo "Preencha os campos!";
            return;
        }

        if($newPassword != $confirmedPassword) {
            echo "As senhas não combinam";
            return;
        }

        $query = "SELECT * FROM users WHERE verification_code='$code';";
        $check_result = pg_query($this->con, $query);

        if(pg_num_rows($check_result) == 1) {
            $password_hash = password_hash($newPassword, PASSWORD_DEFAULT);

            $query2 = "UPDATE users SET password='$password_hash' WHERE verification_code='$code';";
            $check_result2 = pg_query($this->con, $query2);

            if(!$check_result2){
                echo "Ocorreu um erro! Tente Novamente";
                return;
            } else {
                echo "Senha atualizada com sucesso!";
                $query3 = "UPDATE users SET verification_code = NULL WHERE verification_code='$code';";
                pg_query($this->con, $query3);
            }
        } else {
            echo "Usuário não encontrado! Verifique os dados!";
        }
    }
}
    
$verification = new Code($con); 
$code = $_POST["code"];
$newPassword = $_POST["newPassword"];
$confirmedPassword = $_POST["confirmedPassword"];
$verification->reset($code, $newPassword, $confirmedPassword);

pg_close();
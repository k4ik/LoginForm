<?php 
    include '../db/conn.php';
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

    if($_SERVER["REQUEST_METHOD"] == "PUT") {
        $email = $_REQUEST["email"];
        $oldPassword = $_REQUEST["oldPassword"];
        $newPassword = $_REQUEST["newPassword"];
        $confirmNewPassword = $_REQUEST["confirmNewPassword"];

    }
?>
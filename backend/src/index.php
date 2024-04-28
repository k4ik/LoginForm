<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

include './vendor/includes/conn.php';
require './vendor/includes/config.php';
require './vendor/autoload.php';

$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["REQUEST_URI"];

if($method == "POST" && $path == "/register") {
    include "./controllers/SignupController.php";
} elseif($method == "POST" && $path == "/login") {
    include "./controllers/LoginController.php";
} elseif($method == "POST" && $path == "/forgot") {
    include "./controllers/ForgotPasswordController.php";
} elseif($method == "POST" && $path == "/verification") {
    include "./controllers/VerificationCodeController.php";
}
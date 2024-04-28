<?php
include './vendor/includes/conn.php';
require './vendor/includes/config.php';
require './vendor/autoload.php';
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type");

$method = $_SERVER["REQUEST_METHOD"];
$path = $_SERVER["REQUEST_URI"];

if($method == "POST" && $path == "/register") {
    include "./controller/SignupController.php";
} elseif($method == "POST" && $path == "/login") {
    include "./controller/LoginController.php";
} elseif($method == "POST" && $path == "/forgot") {
    include "./controller/ForgotPasswordController.php";
} elseif($method == "POST" && $path == "/verification") {
    include "./controller/VerificationCodeController.php";
}
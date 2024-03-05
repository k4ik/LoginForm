<?php 
    $host = "localhost";
    $username = "root";
    $password = "admin";
    $db = "login";

    $conn = new mysqli($host, $username, $password, $db);

    if($conn->connect_error) {
        die("Error" . $conn->connect_error);
    }

    $conn->close();
?>
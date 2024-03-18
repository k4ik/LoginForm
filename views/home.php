<?php 
    session_start();
    echo "ID: ".$_SESSION["id"]."<br>";
    echo "Username: ".$_SESSION["name"]."<br>";
    echo "Email: ".$_SESSION["email"]."<br>";
?>
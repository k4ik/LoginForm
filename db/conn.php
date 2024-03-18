<?php 
    $host = "flora.db.elephantsql.com";
    $user = "yxrzeear";
    $pass = "8oaJBR980pz5jOiSxg9zgL7_ViV9wfN1";
    $db = "yxrzeear";

    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");
?>
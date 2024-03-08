<?php 
    $host = "flora.db.elephantsql.com";
    $user = "yxrzeear";
    $pass = "8oaJBR980pz5jOiSxg9zgL7_ViV9wfN1";
    $db = "yxrzeear";

    // Open a PostgreSQL connection
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
    or die ("Could not connect to server\n");

    $query = "SELECT * FROM users";
    $results = pg_query($con, $query) or die('Query failed: ' . pg_last_error());

    //$row = pg_fetch_row($results);
    //echo $row[0] . "\n";
    // Closing connection
?>
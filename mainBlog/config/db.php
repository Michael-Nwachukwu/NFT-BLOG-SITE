<?php

    ob_start();

    if(!isset($_SESSION)) {
        // start session
        session_start();
    }

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "newblogdb"; 

    $connection = mysqli_connect( $hostname, $username, $password, $dbname ) or die ( "Database connection not established" );

?>
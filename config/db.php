<?php

    ob_start();

    if(!isset($_SESSION)) {
        // start session
        session_start();
    }

    $hostname = "localhost";
    $username = "root"; //default db username for phpmyadmin
    $password = "";
    $dbname = "newblogdb"; //ie the database we already cresated in the phpmyadmin


    $connection = mysqli_connect( $hostname, $username, $password, $dbname ) or die ( "Database connection not established" );

?>
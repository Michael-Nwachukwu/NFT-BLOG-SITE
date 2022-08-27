<?php

// for un-authenticated users

session_start();

$_loggedin = false;

if( isset($_SESSION['id']) ){
    
    $_loggedin = true;
}

?>
<?php

// session_start();

if( !$_SESSION['id'] ){
    // user not authenticated

    // destroy session
    session_destroy();
    
    // redirect user
    header("Location: /mainBlog/views/login.php");
    die;
}

?>
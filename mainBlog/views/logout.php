<?php

// we dont add abort cos then youll be aborting the session that just started before it can be destroyed
session_start();

// abort and destroy session
session_destroy();

// redirect user
header("Location: /mainBlog/views/login.php");

?>
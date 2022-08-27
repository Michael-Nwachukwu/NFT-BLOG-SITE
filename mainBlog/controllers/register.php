<?php

    //connect to database
    include_once('../config/db.php');

    // handling errors
    $general_error;
    $fullname_error;
    $email_error;
    $password_error;
    $phone_error;

    $register_page = strtok( $_SERVER[ 'HTTP_REFERER' ], '?' );
    $login_page = '/mainBlog/views/login.php';


    if( ( $_POST['fullname'] != "") ) {
        
        // run code if form was submitted
        // capture values 
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $phone = $_POST['phone'];


        // validate First Name 
        if($fullname == "" || strlen($fullname) < 6 ){

            $fullname_error = "Full Name is required and must be greater than 6 characters";

            // redirect user back to register page with error
            header( "Location: $register_page?error=$fullname_error" );
            die;
        }

         // validate last Name 
         if($username == "" || strlen($username) < 5 ){

            $username_error = "User Name is required and must be greater than 5 characters";

            // redirect user back to register page with error
            header( "Location: $register_page?error=$username_error" );
            die;
        }

         // validate email 
         if($email == "" || strlen($email) < 6 ){

            $email_error = "Email is required, must be valid and must be greater than 6 characters";

            // redirect user back to register page with error
            header( "Location: $register_page?error=$email_error" );
            die;
        }

         // validate password 
         if($password == "" || $confirm_password == "" || $password !== $confirm_password || strlen($password) < 5 ){

            $password_error = "password is required, must be greater than 5 and must match confirm password";

            // redirect user back to register page with error
            header( "Location: $register_page?error=$password_error" );
            die;
        }

        if($phone == "" || strlen($phone) < 8 ){

            $phone_error = "phone is required and must be greater than 8 digits";

            // redirect user back to register page with error
            header( "Location: $register_page?error=$phone_error" );
            die;
        }        

        // sanitize input for storing. 
        $_fullname = mysqli_real_escape_string($connection, $fullname);
        $_username = mysqli_real_escape_string($connection, $username);
        $_email = mysqli_real_escape_string($connection, $email);
        $_phone = mysqli_real_escape_string($connection, $phone);

        // hash password 
        $_password = password_hash($password, PASSWORD_DEFAULT);

        // mysql query to inser data into db
        $query = "INSERT INTO users (fullname, username, phone, email, password, token, is_active)
        VALUES ('$_fullname', '$_username', '$_phone', '$_email',  '$_password',  'jfedhgjgklkhtjgi', '0')
        ";

        // run query against db connection. runs our query in the db
        $insert = mysqli_query($connection, $query);

        // check if data saved
        if($insert){
            header( "Location: $login_page?success=Account Created Please Login" );
        }else{
            echo('Error Saving Data');
        }

    }else{
        // returning error message
        $general_error = "please fill the form correctly";

        // redirect user to register page
        header( "Location: $register_page?error=$general_error" );
    }


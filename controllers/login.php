<?php
    //connect to database
    include_once('../config/db.php');

    // login page
    $login_page = '/mainBlog/views/login.php';
    $dashboard = '/mainBlog/views/dashboard.php';
    $admin_dashboard = '/mainBlog/views/admin_dash.php';


    // check if form was submitted
    if(  $_POST['email'] != "" )  {

        $email = $_POST['email'];
        $password = $_POST['password'];

        // filter email and password
        $_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $_password = mysqli_real_escape_string($connection, $password);

        // query to find user
        $query = " SELECT * From users WHERE email ='$_email' LIMIT 1 ";

        // fetch users
        $users = mysqli_query($connection, $query);

        // check if user exists
        if( $users->num_rows > 0 ){
            // get actual user data
            // this fetches everything as an array
            $user = mysqli_fetch_assoc($users);

            // get user data
            $id = $user['id'];
            $fullname = $user['fullname'];
            $username = $user['username'];
            $email = $user['email'];
            $password = $user['password'];
            $token = $user['token'];
            $is_active = $user['is_active'];
            $phone = $user['phone'];
            $type = $user['usertype'];

            // verify password - pword_verify = inbuilt funct to compare if passwords match. takes parameters of hashed and unhashed paswords
            $password_verify = password_verify($_password, $password);

            // var_dump($password_verify);

            if( !$password_verify ){
                // send user back to login with error message
                header("Location: $login_page?error=Wrong Password");
                die;
            }

            // log user in to dashboard and save session data
            // start a session
            session_start();

            // we can now access the global variable $_session
            $_SESSION['id'] = $id;
            $_SESSION['fullname'] = $fullname;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['token'] = $token;
            $_SESSION['type'] = $type;

            // redirect user to dashboard

            if($type == "admin"){
                // log user in to dashboard and save session data
                // start a session
                session_start();

                // we can now access the global variable $_session
                $_SESSION['id'] = $id;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['token'] = $token;
                $_SESSION['type'] = $type;

                header("Location: $admin_dashboard?success=Login Successful");
                die;

            }
            
            if($type == "user"){
                // log user in to dashboard and save session data
                // start a session
                session_start();

                // we can now access the global variable $_session
                $_SESSION['id'] = $id;
                $_SESSION['fullname'] = $fullname;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['phone'] = $phone;
                $_SESSION['token'] = $token;
                $_SESSION['type'] = $type;

                header("Location: $dashboard?success=Login Successful");
                
                die;

            }
            

        }else{

            header("Location: $login_page?error=User Does Not Exist");
            die;
        }

    }
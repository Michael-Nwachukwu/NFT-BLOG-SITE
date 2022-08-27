<?php
// after creating database import the db connection
include_once('../config/db.php');

$dash_page = "/mainBlog/views/dashboard.php";


// check if form is submitted
if($_POST['new_name'] != ""){

    // grab detail
    $new_name = $_POST['new_name'];
   
    // validate data
    if($new_name == "" || strlen($new_name) < 6 ){
        // throw error
        // redirect user back to register page with error
        header( "Location: $dash_page?error=Full Name is required and must be more than 8 character long" );
        die;
    }

    // sanitize data for storage
    $_new_name = mysqli_real_escape_string($connection, $new_name);


    // msqli query to update data in db where id == sessions id
    $query = "UPDATE users SET  
    fullname ='$_new_name' WHERE id=".$_SESSION['id'];

    // msqli query to update name in posts db where userid == sessions id
    $query_two = "UPDATE posts SET  
    name ='$_new_name' WHERE user_id=".$_SESSION['id'];

    // run query in db
    $Insert = mysqli_query($connection, $query);
    mysqli_query($connection, $query_two);

    // check if data has been stored
    if($Insert){

        header("Location: $dash_page?success=Full Name Updated Successfully");
        die;

    }else{
        header( "Location: $dash_page?error=Failed to Update Profile" );
    }
    
    die;

}else{
    header( "Location: $dash_page?error=Full Name is required and must be more than 8 character long" );
}

if($_POST['new_password'] != ""){

    // grab details
    $new_password = $_POST['new_password'];
    $old_password = $_POST['old_password'];

    $query_one = " SELECT * From users WHERE id =". $_SESSION['id'];

    $users = mysqli_query($connection, $query_one);

    $user = mysqli_fetch_assoc($users);

    // sanitise old pword input
    $_old_password = mysqli_real_escape_string($connection, $old_password);
    $password = $user['password'];

    // match old password with current hashed password
    $password_verify = password_verify($_old_password, $password);
   
    // validate data
    if($new_password == "" || strlen($new_password) < 5 || !$password_verify ){
        // throw error
        // redirect user back to register page with error
        header( "Location: $dash_page?error=Password is required and must be more than 5 character long and must match old password" );
      
        die;
    }

    $_password = password_hash($new_password, PASSWORD_DEFAULT);

    // msqli query to insert data to db
    $query = "UPDATE users SET  
    password ='$_password' WHERE id=".$_SESSION['id'];

    // run query in db
    $Insert = mysqli_query($connection, $query);

    // check if data has been stored
    if($Insert){

        header("Location: $dash_page?success=Password Updated Successfully");
        die;

    }else{
        header( "Location: $dash_page?error=Failed to Update Profile" );
    }

    die;

}else{
    header( "Location: $dash_page?error=Password is required and must be more than 5 character long and must match old password" );
}

if($_POST['new_email'] != ""){

    // grab detail
    $new_email = $_POST['new_email'];
   
    // validate data
    if($new_email == "" || strlen($new_email) < 6 ){
        // throw error
        // redirect user back to register page with error
        header( "Location: $dash_page?error=Email is required and must be more than 6 character long" );
        die;
    }

    // sanitize data for storage
    $_new_email = mysqli_real_escape_string($connection, $new_email);


    // msqli query to update users table
    $query = "UPDATE users SET  
    email ='$_new_email' WHERE id=".$_SESSION['id'];

    // run query in db
    $Insert = mysqli_query($connection, $query);

    // check if data has been stored
    if($Insert){

        header("Location: $dash_page?success=Email Name Updated Successfully");
        die;

    }else{
        header( "Location: $dash_page?error=Failed to Update Profile" );
    }

    die;

}else{
    header( "Location: $dash_page?error=Email is required and must be more than 6 character long" );
}

if($_POST['new_phone'] != ""){

    // grab detail
    $new_phone = $_POST['new_phone'];
   
    // validate data
    if($new_phone == "" || strlen($new_phone) < 8 ){
        // throw error
        // redirect user back to register page with error
        header( "Location: $dash_page?error=Phone is required and must be more than 8 character long" );
        die;
    }

    // sanitize data for storage
    $_new_phone = mysqli_real_escape_string($connection, $new_phone);


    // msqli query to update
    $query = "UPDATE users SET  
    phone ='$_new_phone' WHERE id=".$_SESSION['id'];

    // run query in db
    $Insert = mysqli_query($connection, $query);

    // check if data has been stored
    if($Insert){

        header("Location: $dash_page?success=Phone Number Updated Successfully");
        die;

    }else{
        header( "Location: $dash_page?error=Failed to Update Profile" );
    }

    die;

}else{
    header( "Location: $dash_page?error=Phone is required and must be more than 8 character long" );
}

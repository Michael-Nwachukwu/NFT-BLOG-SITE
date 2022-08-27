<?php
// after creating database import the db connection
include_once('../config/db.php');

// defining dashboard page
$dash_page = "/mainBlog/views/dashboard.php";

// check if form is submitted
if($_POST['title'] != ""){

    // grab title, body and desc
    $user_id=trim($_SESSION['id']); //trim to get rid of white spaces
    $title = $_POST['title'];
    $body = strip_tags($_POST['body']); //striptags to strip any html tags that may be injected
    $description = $_POST['description'];
    $name = trim($_SESSION['fullname']);
    $username = trim($_SESSION['username']);
    $post_type = $_POST['post_type'];
    $link = $_POST['link'];


    // validate data
    if($title == "" || strlen($title) < 8 ){
        // throw error
        // redirect user back to register page with error
        header( "Location: $dash_page?error=Title is required and must be more than 8 character long" );
    }

    if($description == "" || strlen($description) < 70 ){
        // throw errpr
        header( "Location: $dash_page?error=description is required and must be more than 15 character long" );
    }

    if($body == "" || strlen($body) < 20 ){
        // throw errpr
        header( "Location: $dash_page?error=Body is required and must be more than 20 character long" );
    }

    if($link == ""){
        // throw errpr
        header( "Location: $dash_page?error=Body is required and must be more than 20 character long" );
    }

    // handle image upload
    // chdir is change directory to be able to change the file path/directory
    $upload_path = chdir('../public/');

    // allowed fiiles
    $allowedFileTypes = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'jfif'];

    // capture file data
    $fileName = $_FILES['image']['name'];//returns file name
    $fileType = $_FILES['image']['type'];//returns file type
    $fileSize = $_FILES['image']['size'];//returns sile size in bytes
    $fileTemp = $_FILES['image']['tmp_name'];//returns temporal file in server

    // get file name extension
    $filter = explode('.', $fileName);
    $str = end($filter);
    $fileExtension = strtolower($str);

    // check if file extension is allowed 
    if( in_array($fileExtension, $allowedFileTypes) ){

        // upload file
        move_uploaded_file($fileTemp,$fileName);
        
    }else{

        // throw errpr
        header("Location: $dash_page?error=Valid Image is required" );
        die;
    }


    // sanitize data for storage
    $_title = mysqli_real_escape_string($connection, $title);
    $_description = mysqli_real_escape_string($connection, $description);
    $_body = mysqli_real_escape_string($connection, $body);
    $_image = mysqli_real_escape_string($connection, $fileName);
    $_name = mysqli_real_escape_string($connection, $name);
    $_username = mysqli_real_escape_string($connection, $username);
    $_link = mysqli_real_escape_string($connection, $link);


    // msqli query to insert data to db
    $query = "INSERT INTO posts 
    (title, description, body, image, user_id, name, username, type, link)
    VALUES 
    ('$_title', '$_description', '$_body', '$_image', '".$user_id."', '$_name', '$_username', '$post_type', '$_link')";

    // run query in db
    $Insert = mysqli_query($connection, $query);

    // check if data has been stored
    if($Insert){
        header( "Location: $dash_page?success=Post has been created" );
    }else{
        header( "Location: $dash_page?error=Failed to Create Post" );
    }


}

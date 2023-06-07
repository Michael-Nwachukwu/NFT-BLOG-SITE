<?php
// after creating database import the db connection
include_once('../config/db.php');

$dash_page = "/mainBlog/views/dashboard.php";
$admin_dash_page = "/mainBlog/views/admin_dash.php";


// check if form is submitted
if($_POST['title'] != ""){

    // grab title, body and image
    $title = $_POST['title'];
    $description = $_POST['description'];
    $body = strip_tags($_POST['body']);
    $link = $_POST['link'];
    $oldImage = $_POST['old_image'];
    $id = $_POST['id'];

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


    if( $_FILES['image']['name'] != "" ){//if a new image file exists

        // handle image upload
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

        $_image = mysqli_real_escape_string($connection, $fileName);

    }else{
        // if there is no new image then just use the old image
        $_image = mysqli_real_escape_string($connection, $oldImage);
    }

   
    // sanitize data for storage
    $_title = mysqli_real_escape_string($connection, $title);
    $_body = mysqli_real_escape_string($connection, $body);
    $_description = mysqli_real_escape_string($connection, $description);
    $_link = mysqli_real_escape_string($connection, $link);


    // msqli query to update data in db
    $query = "UPDATE posts SET  
    title ='$_title', body='$_body', image='$_image', description='$_description', link='$_link' WHERE id=$id";

    // run query in db
    $Insert = mysqli_query($connection, $query);

    // check if data has been stored
    if($Insert){

        if ($_SESSION['type'] == "admin") {

            header("Location: $admin_dash_page?success=Post has been Updated");
            die;
        }

        if ($_SESSION['type'] == "user") {

            header("Location: $dash_page?success=Post has been Updated");
            die;
        }

    }else{

        if ($_SESSION['type'] == "admin") {

            header("Location: $admin_dash_page?success=Failed to Update Post");
            die;
        }

        if ($_SESSION['type'] == "user") {

            header("Location: $dash_page?success=Failed to Update Post");
            die;
        }

    }


}

<?php
include_once('../config/db.php');

$dash_page = "/mainBlog/views/dashboard.php";


// check to see if an id was passed
if(isset($_GET['id'])) {
    // store id 
    $id = $_GET['id'];

    // send request to db and remove the data
    $query = "SELECT * From posts WHERE id=$id";

    // fetch post 
    $post = mysqli_query($connection, $query);

    // check to make sure post exists
    if( $post->num_rows > 0 ){
        // delete post
        $deleteQuery = "DELETE From posts WHERE id=$id";

        $delete = mysqli_query($connection, $deleteQuery);

        header( "Location: $dash_page?success=Post has been deleted" );
        die;

    }else{
        header( "Location: $dash_page?error=Post does not exist" );
        die;

    }
}
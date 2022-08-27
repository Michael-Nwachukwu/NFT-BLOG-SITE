<?php

include_once('../partials/header.php');
include_once('../config/db.php');


// check for error message
// if the var error isset in the get url then set a variable message to be the get error from the site url 
if (isset($_GET['error'])) {
    // grab error message
    $error = $_GET['error'];
}

//   check for success message
if (isset($_GET['success'])) {
    // grab success message
    $success = $_GET['success'];
}


$dash_page = "/mainBlog/views/dashboard.php";
$admin_dash_page = "/mainBlog/views/dashboard.php";


// get post data from db
if (isset($_GET['id'])) {
    // 
    // store id 
    $id = $_GET['id'];

    // send request to db and edit the data
    $query = "SELECT * From posts WHERE id=$id";

    // fetch post 
    $post = mysqli_query($connection, $query);

    // check to make sure post exists
    if ($post->num_rows < 0) {

        if ($_SESSION['type'] == "admin") {

            header("Location: $admin_dash_page?error=Post does not exist");
            die;
        }


        if ($_SESSION['type'] == "user") {

            header("Location: $dash_page?error=Post does not exist");
            die;
        }
    }

    // fetch post
    $data = mysqli_fetch_assoc($post);
}


?>

<head>
    <!-- froala text editor css -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />
</head>

<div class="max-w-7xl mx-auto px-6">
    <!-- create post -->
    <div class="">

        <?php

        // if the var message exists the echo the error html
        if (isset($error)) {

            echo ("
                <div class='flex rounded-lg p-4 mb-4 text-sm bg-red-100 text-red-700' role='alert'>
                <svg class='w-5 h-5 inline mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                  <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'>
                  </path>
                </svg>
                <div>
                    <span class='font-medium'>$error</span>
                </div>
            </div>
                ");
        }

        if (isset($success)) {

            echo ("
                <div class='flex rounded-lg p-4 mb-4 text-sm bg-green-100 text-green-700' role='alert'>
                <svg class='w-5 h-5 inline mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                  <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'>
                  </path>
                </svg>
                <div>
                    <span class='font-medium'>$success</span>
                </div>
            </div>
                ");
        }
        ?>

        <h1 class="text-4xl font-bold uppercase text-right pb-2 border-b border-b-indigo-500" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Edit Post</h1>

        <form method="post" action="../controllers/edit_post.php" class="w-full space-y-4 mt-8 text-slate-500" enctype="multipart/form-data">

            <div class="mb-3">
                <img width="200px" src="../public/<?php echo ($data['image']) ?>">
            </div>

            <div class="mb-3 ">
                <label for="title" class="form-label">Title</label><br>
                <input type="text" value="<?php echo ($data['title']) ?>" name="title" class="w-full bg-neutral-800 p-3 rounded-lg" id="title" required>
            </div>

            <div class="mb-3 ">
                <label for="title" class="form-label">Description</label><br>
                <input type="text" value="<?php echo ($data['description']) ?>" name="description" class="w-full bg-neutral-800 px-3 rounded-lg h-20" id="title" required>
            </div>

            <!-- <div class=" mb-3">
                <label for="title" class="form-label pb-2">Body</label><br>
                <textarea name="body" id="myEditor"></textarea>
            </div> -->

            <?php
            
                if( $data['type'] == "nfts" ){
                    echo "
                        <div class='mb-3 '>
                            <label for='link' class='form-label'>Nft Link</label><br>
                            <input type='text' value='$data[link]' name='link' class='w-full bg-neutral-800 p-3 rounded-lg' id='link' required>
                        </div>
                    ";
                }

                if( $data['type'] == "reads" ){
                    echo "
                    <div class=' mb-3'>
                    <label for='title' class='form-label pb-2'>Body</label><br>
                    <textarea name='body' id='myEditor'> $data[body] </textarea>
                    </div>

                    ";
                }

            ?>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label><br>
                <input type="file" name="image" class="w-full bg-neutral-800 p-3 rounded-lg">
                <!-- old image but will be hidden -->
                <input type="hidden" name="old_image" class="" value="<?php echo ($data['image']) ?>">
                <!-- another hidden input for the id -->
                <input type="hidden" name="id" class="" value="<?php echo ($data['id']) ?>">
            </div>

           
            <button href="\mainBlog\views\login.php" class="p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                Update
            </button>

        </form>
    </div>
</div>

<?php
include_once('../partials/footer.php');
?>

<!-- froala text editor script -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>

<script>
    new FroalaEditor('#myEditor', {
        toolbarInline: false
    })
</script>
<?php
    include_once('../partials/header.php');

    // include db connection
    include_once('../config/db.php');

    // get post data from db
    if (isset($_GET['id'])) {

        // store id 
        $id = $_GET['id'];

        // send request to db and edit the data
        $query = "SELECT * From posts WHERE id=$id";

        // fetch post 
        $post = mysqli_query($connection, $query);

        // check to make sure post exists
        if ($post->num_rows < 0) {

            header("Location: $dash_page?error=Post does not exist");
            die;
        }

        // fetch post
        $data = mysqli_fetch_assoc($post);
    }

?>

<section class="mt-8 max-w-5xl mx-auto bg-neutral-800 rounded-3xl">
    <div class=" space-y-8  ">
        <!-- summary and title -->
        <div class="grid grid-cols-1 justify-items-center mt-3 px-6">
            <h1 class="text-slate-400 text-4xl font-bold pt-5">
                <!-- The Secret to Creating a Successfull NFT Collection -->
                <?php echo $data['title'] ?>
            </h1>
            <div class="flex flex-row items-center text-xs space-x-4 text-slate-400 p-5">
                <span class="text-slate-600 font-bold text-sm">BY</span>
                <span class="border-r border-r-slate-300 pr-3"><?php echo $data['name'] ?></span>
                <span class="border-r border-r-slate-300 pr-3"><?php echo $data['date_time'] ?></span>
                <span>2 MIN READ</span>
            </div>
            
            <div class="md:px-20">
                <p class="text-sm text-slate-300 tracking-wider p-5 leading-loose">
                    <?php echo $data['description'] ?>
                </p>
            </div>

            <!-- image -->
            <div class="flex justify-center">
                <img src="../public/<?php echo($data['image']) ?>" class="w-64 h-72" alt="">
            </div>
        </div>


        <!-- body -->
        <div class="flex justify-center md:px-20 pb-12 px-6">
            <p class="text-md text-gray-200 font-light tracking-widest leading-loose">
                <?php echo $data['body'] ?>
            </p>
        </div>
    </div>
   
</section>

<?php
    include_once('../partials/footer.php');
?>
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

<style>
    /* From uiverse.io by @barisdogansutcu */
.love-heart:before,#switch {
 display: none;
}

.love-heart, .love-heart::after {
 border-color: hsl(231deg 28% 86%);
 border: 1px solid;
 border-top-left-radius: 100px;
 border-top-right-radius: 100px;
 width: 10px;
 height: 8px;
 border-bottom: 0
}

.round {
 position: absolute;
 z-index: 1;
 width: 8px;
 height: 8px;
 background: hsl(0deg 0% 100%);
 box-shadow: rgb(0 0 0 / 24%) 0px 0px 4px 0px;
 border-radius: 100%;
 left: 0px;
 bottom: -1px;
 transition: all .5s ease;
 animation: check-animation2 .5s forwards;
}

input:checked + label .round {
 transform: translate(0px, 0px);
 animation: check-animation .5s forwards;
 background-color: hsl(0deg 0% 100%);
}

@keyframes check-animation {
 0% {
  transform: translate(0px, 0px);
 }

 50% {
  transform: translate(0px, 7px);
 }

 100% {
  transform: translate(7px, 7px);
 }
}

@keyframes check-animation2 {
 0% {
  transform: translate(7px, 7px);
 }

 50% {
  transform: translate(0px, 7px);
 }

 100% {
  transform: translate(0px, 0px);
 }
}

.love-heart {
 box-sizing: border-box;
 position: relative;
 transform: rotate(-45deg) translate(-50%, -33px) scale(4);
 display: block;
 border-color: hsl(231deg 28% 86%);
 cursor: pointer;
 top: 0;
}

input:checked + .love-heart, input:checked + .love-heart::after, input:checked + .love-heart .bottom {
 border-color: hsl(347deg 81% 61%);
 box-shadow: inset 6px -5px 0px 2px hsl(347deg 99% 72%);
}

.love-heart::after, .love-heart .bottom {
 content: "";
 display: block;
 box-sizing: border-box;
 position: absolute;
 border-color: hsl(231deg 28% 86%);
}

.love-heart::after {
 right: -9px;
 transform: rotate(90deg);
 top: 7px;
}

.love-heart .bottom {
 width: 11px;
 height: 11px;
 border-left: 1px solid;
 border-bottom: 1px solid;
 border-color: hsl(231deg 28% 86%);
 left: -1px;
 top: 5px;
 border-radius: 0px 0px 0px 5px;
}

</style>

<section class="mt-8 max-w-5xl mx-auto bg-neutral-800 rounded-3xl">
    <div class=" space-y-8  ">
        <!-- summary and title -->
        <div class="grid grid-cols-1 justify-items-center mt-3 px-6">

            <h1 class="text-slate-400 text-4xl font-bold pt-5">
                <!-- The Secret to Creating a Successfull NFT Collection -->
                <?php echo $data['title'] ?>
            </h1>

            <div class="flex flex-row items-center text-xs space-x-4 text-slate-400 py-5 mt-8">

                <span class="text-slate-600 font-bold text-sm">BY</span>
                <span class="border-r border-r-slate-300 pr-3"><?php echo $data['name'] ?></span>
                <span class="border-r border-r-slate-300 pr-3"><?php echo $data['date_time'] ?></span>
                <span>2 MIN READ</span>

            </div>

            <div class="md:px-20 mt-8">
                <p class="text-sm text-slate-300 tracking-wider p-5 leading-loose">
                    <?php echo $data['description'] ?>
                </p>
            </div>

            <!-- image -->
            <div class="flex justify-center">
                <img src="../public/<?php echo ($data['image']) ?>" class="w-64 h-72" alt="">
            </div>
        </div>


        <!-- body -->
        <div class="flex justify-center md:px-20 px-6">
            <p class="text-md text-gray-200 font-light tracking-widest leading-loose">
                <?php echo $data['body'] ?>
            </p>
        </div>

        <?php

            if ($_loggedin) {
                echo ("
                    <div class='flex justify-center py-12'>
                        <div class='love'>
                            <input id='switch' type='checkbox'>
                            <label class='love-heart' for='switch'>
                                <i class='left'></i>
                                <i class='right'></i>
                                <i class='bottom'></i>
                                <div class='round'></div>
                            </label>
                        </div>
                    </div>
                ");
            }

        ?>

        

    </div>

</section>

<?php
include_once('../partials/footer.php');
?>
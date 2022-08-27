<?php
    // including header
    include_once('../partials/header.php');
    // including database connection
    include_once('../config/db.php');

?>

<!-- hero section -->
<div class="mt-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col-reverse px-6 md:flex-row md:space-x-16">

            <!-- discover, notes and button -->
            <div class="pt-14 mt-10 md:mt-0">

                <h1 class="myfont block-effect text-white mb-5 font-bold border-r-4 border-indigo-500 " style="--td: 1.2s;">
                    <div class="block-reveal text-indigo-500 text-7xl" style="--bc: #4040bf; --d: .1s">Discover,</div>
                    <div class="block-reveal text-red-300 text-5xl pt-3" style="--bc: #bf4060; --d: .5s">The beauty in Bldn.</div>
                </h1>

                <small class="text-slate-600 pt-10 text-sm">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur, est assumenda sunt, totam atque laborum doloribus neque tempore ut, animi quas labore voluptatem libero magnam illo iusto cum? Possimus, impedit!</small>

                <!-- button -->
                <div class="mt-8">
                    <?php
                        // if user is logged in show dashboard button
                        if ($_loggedin) {
                            echo ("
                                    <a class='p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900' href='/mainBlog/views/dashboard.php'>
                                        Dashboard
                                    </a>
                                ");
                        } else {
                            echo ("
                                    <a href='/mainBlog/views/login.php' class='p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900'>
                                        Get started
                                    </a>
                                ");
                        }

                    ?>
                </div>
            </div>

            <!-- animated card -->
            <div class="wrap wrap--1 w-full h-96">
                <div class="container container--1 ">
                    <p class="font-bold"> <span class="text-red-300 font-extabold">Bldn,</span> <span class="text-indigo-200">grow with your favorite projects</span> </p>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- blog post section -->
<section class="mt-20">
    <div class="max-w-7xl mx-auto px-6 ">
        
        <!-- heading -->
        <h1 class="myfont text-4xl text-slate-600 text-left font-extrabold mt-4 mb-8 border-l-4 border-indigo-500 pl-10">RECENT POSTS</h1>

        <!-- Swiper js component-->
        <div class="swiper mySwiper">

            <div class="swiper-wrapper">

                <?php

                    // query to find post
                    $query = " SELECT * From posts where type = '' ";
                    // fetch post
                    $posts = mysqli_query($connection, $query);

                    // check if post exists
                    if ($posts->num_rows > 0) {

                        $data = mysqli_fetch_all($posts, MYSQLI_ASSOC); //mysqli_assoc this parameter specifies the data type that will be returned

                        foreach ($data as $key => $value) {

                            $title = substr( $value['title'], 0, 24 );
                            $description = substr( $value['description'], 0, 90 );

                            // individual swiper slider
                            echo ("
                                
                                <div class='swiper-slide'>

                                    <div class='card' style='height: 550px;'>
                                        <div class='lg:w-96'>
                                            <!-- img -->
                                            <div class=''>
                                                <img src='../public/$value[image]' class='h-52 w-full rounded-t-lg' style='object-fit:cover; '>
                                            </div>
                                            <!-- content -->
                                            <div class='bg-neutral-700 flex flex-col justify-start p-4 space-y-5 rounded-b-lg'>
                                                <!-- header and description -->
                                                <div class=''>
                                                    <h1 class='myfontii text-indigo-300 text-2xl font-bold uppercase'>$title</h1>
                                                </div>
                
                                                <div>
                                                    <p class='text-indigo-100 text-sm'>$description</p>
                
                                                    <div class='group flex items-center mt-4'>
                                                        <div>
                                                            <button type='button' class='bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white' id='user-menu-button' aria-expanded='false' aria-haspopup='true'>
                                                                <img class='shrink-0 h-14 w-13 rounded-full' src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/751678/skytsunami.png' alt=''>
                                                            </button>
                                                        </div>
                                                        <div class='ml-3'>
                
                                                            <p class='text-sm font-medium text-slate-300 group-hover:text-white'>$value[name]</p>
                                                            <a href=''>
                                                                <p class='text-sm font-medium text-slate-500 group-hover:text-slate-300'>@<span>$value[username]</span></p>
                                                            </a>
                                                        </div>
                                                    </div>
                
                                                </div>
                
                                                <!-- button -->
                                                <div class='flex flex-row justify-between items-center pt-3'>
                                                    <a class='fancy' href='/mainBlog/views/readmore.php?id=$value[id]'>
                                                        <span class='top-key'></span>
                                                        <span class='text'>Read More</span>
                                                        <span class='bottom-key-1'></span>
                                                        <span class='bottom-key-2'></span>
                                                    </a>
                                                    <div class=''>
                                                        <p class='text-sm font-medium text-slate-300 group-hover:text-white'>$value[date_time]</p>
                                                    </div>
                                                </div>
                
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                                    
                            ");
                        }
                    }
                ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>

        </div>

    </div>
</section>

<!-- popular nfts -->
<section class="mt-10">

    <div class="max-w-7xl mx-auto px-6 ">
        <!-- heading -->
        <h1 class="myfont text-4xl text-slate-600 text-right pr-10 font-extrabold mt-4 mb-8 border-r-4 border-indigo-500">TOP BLDERS</h1>

        <!-- Swiper -->
        <div class="swiper mySwiperr" style="border-radius: 40px;">
            <div class="swiper-wrapper">

                <?php
                    // query to find post
                    $query = " SELECT * From posts where type = 'nfts' ";
                    // fetch post
                    $posts = mysqli_query($connection, $query);

                    // check if post exists
                    if ($posts->num_rows > 0) {

                        $data = mysqli_fetch_all($posts, MYSQLI_ASSOC); //mysqli_assoc this parameter specifies the data type that will be returned

                        foreach ($data as $key => $value) {

                            // individual swiper slider
                            echo ("
                                
                                <div class='swiper-slide bg-black'>

                                    <div class='flex flex-col items-center justify-around md:flex-row'>
                                        <div class='md:ml-20 w-1/2 '>
                                            <img src='../public/$value[image]' style='border-radius: 40px;' alt='' class='w-full '>
                                        </div>
                
                                        <div class='w-1/2 sm:mx-20 text-center sm:text-right'>
                                            <h1 class='myfontii text-5xl text-indigo-300 py-10'>$value[title]</h1>

                                            <p class='text-md text-indigo-100'>$value[description]</p>
                                            
                                            <button class='myfontii mt-5 px-5 py-2 bg-transparent text-indigo-300 border border-indigo-500 uppercase font-bold hover:bg-indigo-300 hover:text-black'> 
                                                <a href='$value[link]' target='_blank'>
                                                    <div class='flex items-center'>
                                                        <span>buy on</span>
                                                        <img class='h-9 w-10 mb-1' src='/mainBlog/img/Magic_Eden_Logo-removebg-preview.png' alt='Magic eden'>
                                                    </div>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                
                                </div>
                                    
                            ");
                        }
                    }
                ?>

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div> <button></button>
        </div>
    </div>
</section>

<!-- decentra reads -->
<section class="mt-14">
    <div class="max-w-7xl mx-auto px-6">

        <h1 class="myfont text-4xl text-slate-600 text-left pr-10 font-extrabold mt-4 mb-8 border-r-4 border-indigo-500 uppercase">Decentra reads</h1>

        <div class="blog-slider bg-neutral-500 text-white">
            <div class="blog-slider__wrp swiper-wrapper">

                <?php
                    // query to find post
                    $query = " SELECT * From posts where type = 'reads' ";
                    // fetch post
                    $posts = mysqli_query($connection, $query);

                    // check if post exists
                    if ($posts->num_rows > 0) {

                        $data = mysqli_fetch_all($posts, MYSQLI_ASSOC); //mysqli_assoc this parameter specifies the data type that will be returned

                        foreach ($data as $key => $value) {

                            echo ("
                                
                                <div class='blog-slider__item swiper-slide'>

                                    <div class='blog-slider__img'>
                                        <img src='../public/$value[image]' alt=''>
                                    </div>

                                    <div class='blog-slider__content'>
                                        <span class='blog-slider__code'>$value[date_time]</span>
                                        <div class='blog-slider__title'>$value[title]</div>
                                        <div class='blog-slider__text'>$value[description] </div>
                                        <a href='/mainBlog/views/readmore.php?id=$value[id]'' class='blog-slider__button'>READ MORE</a>
                                    </div>
                                </div>
                                    
                            ");
                        }
                    }
                ?>
                
            </div>
            <div class="blog-slider__pagination"></div>
        </div>

    </div>
</section>

<?php
    include_once('../partials/footer.php');
?> 
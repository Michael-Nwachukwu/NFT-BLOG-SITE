<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- swiper cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- tail wind compiled css -->
    <link rel="stylesheet" href="\mainBlog\css\main.css">

    <!-- froala text editor css -->
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Concert+One&family=Pacifico&family=Righteous&family=Rubik+Moonrocks&display=swap" rel="stylesheet">
    
    <title>Document</title>

    <style>
        input:focus {
            outline: none !important;
        }

        textarea:focus {
            outline: none !important;
        }

        @-webkit-keyframes float {
            0% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }

            50% {
                box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
                transform: translatey(-20px);
            }

            100% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }
        }

        @keyframes float {
            0% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }

            50% {
                box-shadow: 0 25px 15px 0px rgba(0, 0, 0, 0.2);
                transform: translatey(-20px);
            }

            100% {
                box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
                transform: translatey(0px);
            }
        }

        .avatar {
            width: 150px;
            height: 150px;
            box-sizing: border-box;
            border: 5px white solid;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 5px 15px 0px rgba(0, 0, 0, 0.6);
            transform: translatey(0px);
            -webkit-animation: float 6s ease-in-out infinite;
            animation: float 6s ease-in-out infinite;
        }

        .avatar img {
            width: 100%;
            height: auto;
        }
    </style>

</head>

<?php

    // include db connection
    include_once('../config/db.php');

    // auth
    include_once('../middlewares/admin.php');

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


?>

<body class="bg-black">

    <!-- component -->
    <aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen  bg-neutral-800 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
        <div>
            <div class=" pr-6 pl-14 pb-4 pt-6">
                <h5 hidden class="text-2xl text-gradient-to-r font-medium lg:block bg-neutral-800" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Dashboard</h5>
            </div>

            <div class="mt-3">
                <div class="avatar mx-auto">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/751678/skytsunami.png" alt="Skytsunami" />
                </div>
                <!-- <div class="grid justify-items-center p-0 m-0"> -->
                <h5 class="flex flex-col items-center justify-center mt-4 text-lg font-semibold text-gray-600 ">
                   Administrator
                </h5>
                <!-- </div> -->
            </div>

            <ul class="space-y-2 tracking-wide mt-3">
                <li>
                    <a href="#" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-indigo-500 to-red-300">
                        <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                            <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                            <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                            <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-sky-300"></path>
                        </svg>
                        <span class="-mr-1 font-medium">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/mainBlog/views/index.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-200 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                        </svg>
                        <span class="group-hover:text-gray-200">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-200 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                            <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                        </svg>
                        <span class="group-hover:text-gray-200">Our Story</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                            <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                        </svg>
                        <span class="group-hover:text-gray-200">Team</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t-2 border-t-black">
            <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span class="group-hover:text-gray-200">
                    <a href="/mainBlog/views/logout.php">Logout</a>
                </span>
            </button>
        </div>
    </aside>
    
    <!-- body -->
    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <div class="sticky z-10 top-0 mb-3 h-16 bg-black lg:py-2.5">
            <div class="px-6 pt-2 flex items-center justify-between space-x-4 2xl:container">

                <button class="w-12 h-16 -mr-2 lg:hidden text-white" id="menu-btn">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- hambugger menu -->

                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                </div>

                <div class="flex space-x-4">
                    <!--search bar -->

                    <!--/search bar -->

                    <button aria-label="chat" class="w-10 h-10 rounded-xl bg-neutral-800 focus:bg-neutral-800 active:bg-neutral-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </button>
                    <button aria-label="notification" class="w-10 h-10 rounded-xl bg-neutral-800 focus:bg-neutral-800 active:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 m-auto text-gray-200" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                        </svg>
                    </button>



                </div>

            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="hidden bg-black" id="menu">

                <div class="flex flex-col justify-center w-full mx-5 sm:mx-20 pb-8">
                    <div class=" pr-6 pl-14 pb-4 pt-6">
                        <h5 hidden class="text-2xl text-gradient-to-r font-medium lg:block bg-neutral-800" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Dashboard</h5>
                    </div>

                    <div class="mt-3">
                        <div class="avatar mx-auto">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/751678/skytsunami.png" alt="Skytsunami" />
                        </div>
                        <div class="grid justify-items-center ">
                            <h5 class=" mt-4 text-xl font-semibold text-gray-600">Administrator</h5>
                        </div>
                    </div>

                    <ul class="space-y-2 tracking-wide mt-3">
                        <li>
                            <a href="#" aria-label="dashboard" class="relative px-4 py-3 flex items-center space-x-4 rounded-xl text-white bg-gradient-to-r from-indigo-500 to-red-300">
                                <svg class="-ml-1 h-6 w-6" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2V8ZM6 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2v-1Z" class="fill-current text-cyan-400 dark:fill-slate-600"></path>
                                    <path d="M13 8a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2V8Z" class="fill-current text-cyan-200 group-hover:text-cyan-300"></path>
                                    <path d="M13 15a2 2 0 0 1 2-2h1a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-1Z" class="fill-current group-hover:text-sky-300"></path>
                                </svg>
                                <span class="-mr-1 font-medium">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/mainBlog/views/index.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Our Story</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Team</span>
                            </a>
                        </li>
                        
                    </ul>

                    <div class="px-6 -mx-6 pt-4 flex justify-between items-center border-t-2 border-t-black">
                        <button class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span class="group-hover:text-gray-200">
                                <a href="/mainBlog/views/logout.php">Logout</a>
                            </span>
                        </button>
                    </div>

                </div>

                <!-- </aside> -->
            </div>

        </div>

        <div class="px-6 pt-6 2xl:container">

            <h1 class="text-3xl font-bold uppercase text-right pb-2 border-b border-b-indigo-500" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Create Post</h1>

            <?php

                // if the var message exists then echo the error html
                if (isset($error)) {

                    echo ("
                        <div class='flex rounded-lg p-4 mt-4 text-sm bg-red-100 text-red-700' role='alert'>
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
                        <div class='flex rounded-lg p-4 mt-4 text-sm bg-green-100 text-green-700' role='alert'>
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

            <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">

                <div class="">

                    <div class="h-full py-8 space-y-6 text-gray-200">

                        <div class="">

                            <h1>popular nfts</h1>

                            <form class="w-full space-y-4 mt-8 text-slate-500" method="post" action="../controllers/create_post.php" enctype="multipart/form-data">
                                <div class="mb-3 ">
                                    <label for="title" class="form-label">Title</label><br>
                                    <input type="text" name="title" class="w-full bg-neutral-800 p-3 rounded-lg" id="title" required>
                                </div>

                                <div class="mb-3 ">
                                    <label for="title" class="form-label">Description</label><br>
                                    <input type="text" name="description" class="w-full bg-neutral-800 px-3 rounded-lg h-20" id="title" required>
                                </div>

                                <div class="mb-3 ">
                                    <label for="image" class="form-label">Image</label><br>
                                    <input type="file" name="image" class="w-full bg-neutral-800 p-3 rounded-lg" required>
                                </div>

                                <div class="mb-3 ">
                                    <label for="link" class="form-label">Nft Link</label><br>
                                    <input type="text" name="link" class="w-full bg-neutral-800 p-3 rounded-lg" id="link" required>
                                </div>

                                <div>
                                    <!-- hidden input-->
                                    <input type="hidden" name="post_type" class="form-control" value="nfts">
                                </div>

                                <button href="\mainBlog\views\login.php" class="p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    Create Post
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

                <div class="">
                    
                    <div class="h-full py-8 space-y-6 text-gray-200">

                        <div class="">

                            
                            <h1>Decentra Reads</h1>
                            <form class="w-full space-y-4 mt-8 text-slate-500" method="post" action="../controllers/create_post.php" enctype="multipart/form-data">
                                <div class="mb-3 ">
                                    <label for="title" class="form-label">Title</label><br>
                                    <input type="text" name="title" class="w-full bg-neutral-800 p-3 rounded-lg" id="title" required>
                                </div>

                                <div class="mb-3 ">
                                    <label for="title" class="form-label">Description</label><br>
                                    <input type="text" name="description" class="w-full bg-neutral-800 px-3 rounded-lg h-20" id="title" required>
                                </div>

                                <div class=" mb-3">
                                    <label for="title" class="form-label pb-2">Body</label><br>
                                    <textarea name="body" id="myEditor"></textarea>
                                </div>

                                <div class="mb-3 ">
                                    <label for="image" class="form-label">Image</label><br>
                                    <input type="file" name="image" class="w-full bg-neutral-800 p-3 rounded-lg" required>
                                </div>

                                <div>
                                    <!-- hidden input-->
                                    <input type="hidden" name="post_type" class="form-control" value="reads">
                                </div>

                                <button href="\mainBlog\views\login.php" class="p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    Create Post
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

            </div>

            <!-- posts -->
            <h1 class="text-4xl font-bold uppercase text-right pb-2 border-b border-b-indigo-500" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Admin Posts</h1>

            <table class="table-fixed mt-4">
                <thead class="bg-slate-600 font-bold uppercase text-black">
                    <tr class="py-4">
                        <th class="py-3">title</th>
                        <th class="py-3">description</th>
                        <th class="py-3">image</th>
                        <th class="py-3">type</th>
                        <th class="py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-slate-500">
                    <?php
                        // query to find post
                        $query = " SELECT * From posts where user_id=".$_SESSION['id'];
                        // fetch post
                        $posts = mysqli_query($connection, $query);
                        // check if post exists
                        if($posts->num_rows > 0 ){
    
                            $data = mysqli_fetch_all($posts, MYSQLI_ASSOC);//mysqli_assoc this parameter specifies the data type that will be returned

                            foreach( $data as $key => $value ){
                                #code..
                                $key++;

                                $title = substr( $value['body'], 0, 24 );
                                $description = substr( $value['body'], 0, 120 );

                                echo("

                                    <tr class'bg-slate-50 rounded-xl''>
                                        <th class='p-3'>$value[title]</th>
                                        <td class='p-3'>$value[description]</td>
                                        <td class='p-3'> <img width='100px' src='../public/$value[image]'></td>
                                        <td class='uppercase p-3'>$value[type]</td>
                                        <td class='p-3 flex items-center space-x-2 mt-3'>
                                            <a class='bg-blue-300 py-2 px-3 rounded-xl' href='../views/edit_post.php?id=$value[id]'> Edit </a>
                                            <a class='bg-red-700 py-2 px-3 rounded-xl' href='../controllers/delete_post.php?id=$value[id]'> Delete </a>
                                        </td>
                                    </tr>
                                
                                ");
                            }
                        }
                    ?>
                  
                </tbody>
            </table>

        </div>
    </div>

</body>
<!-- froala text editor script -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>

<script>
    new FroalaEditor('#myEditor', {
        toolbarInline: false
    })

    // mobile hambugger toggler
    const btn = document.getElementById("menu-btn");
    const nav = document.getElementById("menu");

    btn.addEventListener("click", () => {
        btn.classList.toggle("open");
        nav.classList.toggle("flex");
        nav.classList.toggle("hidden");
    });
</script>

</html>
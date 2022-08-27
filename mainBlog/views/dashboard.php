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

    // authenticating middleware
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

<body class="bg-black relative">
    <!-- side bar -->
    <aside class="ml-[-100%] fixed z-10 top-0 pb-3 px-6 w-full flex flex-col justify-between h-screen  bg-neutral-800 transition duration-300 md:w-4/12 lg:ml-0 lg:w-[25%] xl:w-[20%] 2xl:w-[15%]">
        <!-- components -->
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
                    <?php
                    echo ($_SESSION['fullname'])
                    ?>
                    <br>
                    <span class=" text-gray-400 text-sm">
                        <?php
                        echo ("@" . $_SESSION['username'])
                        ?>
                    </span>
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
                <li>
                    <a href="#" id="settings" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                            <path class="fill-current text-gray-200 group-hover:text-cyan-600" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                        </svg>
                        <span class="group-hover:text-gray-200">Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- log out button -->
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


    <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
        <!-- navbar -->
        <div class="sticky z-10 top-0 mb-3 h-16 bg-black lg:py-2.5">
            <div class="px-6 pt-2 flex items-center justify-between space-x-4 2xl:container">
                
                <!-- hambugger menu -->
                <button class="w-12 h-16 -mr-2 lg:hidden text-white" id="menu-btn">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>

                <!-- logo -->
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="\mainBlog\img\workflow-mark-indigo-500.svg" alt="Workflow">
                    <img class="hidden lg:block h-8 w-auto" src="\mainBlog\img\workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                </div>

                <!-- icons on the right side of navbar -->
                <div class="flex space-x-4">

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
                            <h5 class="flex flex-col items-center justify-center mt-4 text-lg font-semibold text-gray-600 ">
                                <?php
                                echo ($_SESSION['fullname']);
                                ?>
                                <br>
                                <span class=" text-gray-400 text-sm">
                                    <?php
                                    echo ("@" . $_SESSION['username']);
                                    ?>
                                </span>
                            </h5>
                        </div>
                    </div>

                    <!-- dashboard buttons -->
                    <ul class="space-y-2 tracking-wide mt-3">
                        <!-- dashboard -->
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
                        <!-- home -->
                        <li>
                            <a href="/mainBlog/views/index.php" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Home</span>
                            </a>
                        </li>
                        <!-- our story -->
                        <li>
                            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Our Story</span>
                            </a>
                        </li>
                        <!-- team -->
                        <li>
                            <a href="#" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z" />
                                </svg>
                                <span class="group-hover:text-gray-200">Team</span>
                            </a>
                        </li>
                        <!-- settings -->
                        <li>
                            <a href="#" onclick="document.getElementById('modal').style.display='block'" class="px-4 py-3 flex items-center space-x-4 rounded-md text-gray-200 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-300" d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                                    <path class="fill-current text-gray-200 group-hover:text-cyan-600" fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                                </svg>
                                <span class="group-hover:text-gray-200">Update Profile</span>
                            </a>
                        </li>
                    </ul>

                    <!-- logout btn -->
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

            </div>

        </div>

        <!-- body -->
        <div class="px-6 pt-6 2xl:container">
            <!-- create post and stats card -->
            <div class="grid gap-6 md:grid-cols-3 lg:grid-cols-3">

                <!-- create post component -->
                <div class="sm:col-span-2">
                    <div class="h-full py-8 space-y-6 text-gray-200">

                        <div class="">

                            <h1 class="text-3xl font-bold uppercase text-right pb-2 border-b border-b-indigo-500" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Create Post</h1>

                            <?php

                                // if the var message exists then echo the error html
                                if (isset($error)) {

                                    echo ("
                                            <div data-alert class='flex rounded-lg p-4 mt-4 text-sm bg-red-100 text-red-700' role='alert'>
                                                <svg class='w-5 h-5 inline mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'>
                                                </path>
                                                </svg>
                                                <div>
                                                    <span class='font-medium'>$error</span>
                                                </div>
                                                <a data-remove class='ml-auto pr-6 font-bold hover:text-black'>X</a>
                                            </div>
                                        ");
                                }

                                if (isset($success)) {

                                    echo ("
                                            <div data-alert class='flex rounded-lg p-4 mt-4 text-sm bg-green-100 text-green-700' role='alert'>
                                                <svg class='w-5 h-5 inline mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'>
                                                </path>
                                                </svg>
                                                <div>
                                                    <span class='font-medium'>$success</span>
                                                </div>
                                                <a data-remove class='ml-auto pr-6 font-bold hover:text-black'>X</a>
                                            </div>
                                        ");
                                }
                            ?>

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

                                <button href="\mainBlog\views\login.php" class="p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    Create Post
                                </button>
                            </form>
                        </div>

                    </div>

                </div>

                <!-- stats card -->
                <div class="">
                    <div class="sm:h-max py-8 px-6 text-gray-200 rounded-xl bg-neutral-800">
                        <svg class="w-40 m-auto" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M27.9985 2.84071C31.2849 2.84071 34.539 3.488 37.5752 4.74562C40.6113 6.00324 43.3701 7.84657 45.6938 10.1703C48.0176 12.4941 49.861 15.2529 51.1186 18.289C52.3762 21.3252 53.0235 24.5793 53.0235 27.8657C53.0235 31.152 52.3762 34.4061 51.1186 37.4423C49.861 40.4785 48.0176 43.2372 45.6938 45.561C43.3701 47.8848 40.6113 49.7281 37.5752 50.9857C34.539 52.2433 31.2849 52.8906 27.9985 52.8906C24.7122 52.8906 21.4581 52.2433 18.4219 50.9857C15.3857 49.7281 12.627 47.8848 10.3032 45.561C7.97943 43.2372 6.1361 40.4785 4.87848 37.4423C3.62086 34.4061 2.97357 31.152 2.97357 27.8657C2.97357 24.5793 3.62086 21.3252 4.87848 18.289C6.13611 15.2529 7.97943 12.4941 10.3032 10.1703C12.627 7.84656 15.3857 6.00324 18.4219 4.74562C21.4581 3.488 24.7122 2.84071 27.9985 2.84071L27.9985 2.84071Z" stroke="#e4e4f2" stroke-width="3" />
                            <path d="M27.301 2.50958C33.0386 2.35225 38.6614 4.13522 43.26 7.57004C47.8585 11.0049 51.1637 15.8907 52.641 21.437C54.1182 26.9834 53.6811 32.8659 51.4002 38.133C49.1194 43.4001 45.1283 47.7437 40.0726 50.4611C35.0169 53.1785 29.1923 54.1108 23.541 53.1071C17.8897 52.1034 12.7423 49.2225 8.93145 44.9305C5.12062 40.6384 2.86926 35.1861 2.54159 29.4558C2.21391 23.7254 3.82909 18.0521 7.12582 13.3536" stroke="url(#paint0_linear_622:13696)" stroke-width="5" stroke-linecap="round" />
                            <path d="M13.3279 30.7467C13.3912 29.48 13.8346 28.5047 14.6579 27.8207C15.4939 27.124 16.5896 26.7757 17.9449 26.7757C18.8696 26.7757 19.6612 26.9404 20.3199 27.2697C20.9786 27.5864 21.4726 28.0234 21.8019 28.5807C22.1439 29.1254 22.3149 29.746 22.3149 30.4427C22.3149 31.2407 22.1059 31.9184 21.6879 32.4757C21.2826 33.0204 20.7949 33.3877 20.2249 33.5777V33.6537C20.9596 33.8817 21.5296 34.287 21.9349 34.8697C22.3529 35.4524 22.5619 36.1997 22.5619 37.1117C22.5619 37.8717 22.3846 38.5494 22.0299 39.1447C21.6879 39.74 21.1749 40.2087 20.4909 40.5507C19.8196 40.88 19.0089 41.0447 18.0589 41.0447C16.6276 41.0447 15.4622 40.6837 14.5629 39.9617C13.6636 39.2397 13.1886 38.1757 13.1379 36.7697H15.7219C15.7472 37.3904 15.9562 37.8907 16.3489 38.2707C16.7542 38.638 17.3052 38.8217 18.0019 38.8217C18.6479 38.8217 19.1419 38.6444 19.4839 38.2897C19.8386 37.9224 20.0159 37.4537 20.0159 36.8837C20.0159 36.1237 19.7752 35.579 19.2939 35.2497C18.8126 34.9204 18.0652 34.7557 17.0519 34.7557H16.5009V32.5707H17.0519C18.8506 32.5707 19.7499 31.969 19.7499 30.7657C19.7499 30.221 19.5852 29.7967 19.2559 29.4927C18.9392 29.1887 18.4769 29.0367 17.8689 29.0367C17.2736 29.0367 16.8112 29.2014 16.4819 29.5307C16.1652 29.8474 15.9816 30.2527 15.9309 30.7467H13.3279ZM25.6499 37.9477C26.8659 36.9344 27.8349 36.092 28.5569 35.4207C29.2789 34.7367 29.8806 34.0274 30.3619 33.2927C30.8433 32.558 31.0839 31.836 31.0839 31.1267C31.0839 30.4807 30.9319 29.974 30.6279 29.6067C30.3239 29.2394 29.8553 29.0557 29.2219 29.0557C28.5886 29.0557 28.1009 29.271 27.7589 29.7017C27.4169 30.1197 27.2396 30.696 27.2269 31.4307H24.6429C24.6936 29.9107 25.1433 28.758 25.9919 27.9727C26.8533 27.1874 27.9426 26.7947 29.2599 26.7947C30.7039 26.7947 31.8123 27.181 32.5849 27.9537C33.3576 28.7137 33.7439 29.7207 33.7439 30.9747C33.7439 31.9627 33.4779 32.9064 32.9459 33.8057C32.4139 34.705 31.8059 35.4904 31.1219 36.1617C30.4379 36.8204 29.5449 37.6184 28.4429 38.5557H34.0479V40.7597H24.6619V38.7837L25.6499 37.9477Z" fill="currentColor" />
                            <path d="M36.1948 28.8842C36.1948 29.4438 36.2557 29.8634 36.3775 30.1432C36.4992 30.423 36.6967 30.5628 36.9699 30.5628C37.5097 30.5628 37.7796 30.0033 37.7796 28.8842C37.7796 27.7717 37.5097 27.2155 36.9699 27.2155C36.6967 27.2155 36.4992 27.3537 36.3775 27.6302C36.2557 27.9067 36.1948 28.3247 36.1948 28.8842ZM38.456 28.8842C38.456 29.6347 38.3293 30.2024 38.0758 30.5875C37.8257 30.9693 37.457 31.1602 36.9699 31.1602C36.5091 31.1602 36.1504 30.9644 35.8936 30.5727C35.6402 30.181 35.5135 29.6182 35.5135 28.8842C35.5135 28.1371 35.6352 27.5742 35.8788 27.1957C36.1257 26.8172 36.4894 26.6279 36.9699 26.6279C37.4472 26.6279 37.8142 26.8238 38.0709 27.2155C38.3276 27.6071 38.456 28.1634 38.456 28.8842ZM40.5395 31.7774C40.5395 32.3402 40.6003 32.7615 40.7221 33.0413C40.8439 33.3178 41.043 33.456 41.3195 33.456C41.596 33.456 41.8001 33.3194 41.9317 33.0462C42.0634 32.7697 42.1292 32.3468 42.1292 31.7774C42.1292 31.2145 42.0634 30.7982 41.9317 30.5283C41.8001 30.2551 41.596 30.1185 41.3195 30.1185C41.043 30.1185 40.8439 30.2551 40.7221 30.5283C40.6003 30.7982 40.5395 31.2145 40.5395 31.7774ZM42.8056 31.7774C42.8056 32.5245 42.6789 33.0906 42.4254 33.4757C42.1753 33.8575 41.8067 34.0484 41.3195 34.0484C40.8521 34.0484 40.4917 33.8526 40.2383 33.4609C39.9881 33.0693 39.8631 32.5081 39.8631 31.7774C39.8631 31.0302 39.9849 30.4674 40.2284 30.0889C40.4753 29.7104 40.839 29.5211 41.3195 29.5211C41.7869 29.5211 42.1506 29.7153 42.4106 30.1037C42.6739 30.4888 42.8056 31.0467 42.8056 31.7774ZM41.5318 26.7316L37.5278 33.9497H36.8021L40.8061 26.7316H41.5318Z" fill="white" />
                            <path d="M23.5776 18.4198H25.5424V22.8407H23.5776V18.4198ZM30.4545 16.455H32.4193V22.8407H30.4545V16.455ZM27.0161 13.5078H28.9809V22.8407H27.0161V13.5078Z" fill="#6A6A9F" />
                            <defs>
                                <linearGradient id="paint0_linear_622:13696" x1="5.54791e-07" y1="42.0001" x2="54.6039" y2="41.9535" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#E323FF" />
                                    <stop offset="1" stop-color="#7517F8" />
                                </linearGradient>
                            </defs>
                        </svg>
                        <div class="mt-6">
                            <h5 class="text-xl text-gray-200 text-center">Post Impression</h5>
                            <div class="mt-2 flex justify-center gap-4">
                                <h3 class="text-3xl font-bold text-gray-200">28</h3>
                                <div class="flex items-end gap-1 text-green-500">
                                    <svg class="w-3" viewBox="0 0 12 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.00001 0L12 8H-3.05176e-05L6.00001 0Z" fill="currentColor" />
                                    </svg>
                                    <span>2%</span>
                                </div>
                            </div>
                            <span class="block text-center text-gray-200">Compared to last week 13</span>
                        </div>
                        <table class="mt-6 -mb-2 w-full text-gray-200">
                            <tbody>
                                <tr>
                                    <td class="py-2">reads</td>
                                    <td class="text-gray-200">896</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <path d="M0 7C8.62687 7 7.61194 16 17.7612 16C27.9104 16 25.3731 9 34 9C42.6269 9 44.5157 5 51.2537 5C57.7936 5 59.3731 14.5 68 14.5" stroke="url(#paint0_linear_622:13631)" stroke-width="2" stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13631" x1="68" y1="7.74997" x2="1.69701" y2="8.10029" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#E323FF" />
                                                    <stop offset="1" stop-color="#7517F8" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">likes</td>
                                    <td class="text-gray-200">1200</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <path d="M0 12.929C8.69077 12.929 7.66833 9.47584 17.8928 9.47584C28.1172 9.47584 25.5611 15.9524 34.2519 15.9524C42.9426 15.9524 44.8455 10.929 51.6334 10.929C58.2217 10.929 59.3092 5 68 5" stroke="url(#paint0_linear_622:13640)" stroke-width="2" stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13640" x1="34" y1="5" x2="34" y2="15.9524" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#8AFF6C" />
                                                    <stop offset="1" stop-color="#02C751" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-2">impressions</td>
                                    <td class="text-gray-200">12</td>
                                    <td>
                                        <svg class="w-16 ml-auto" viewBox="0 0 68 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.4" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="19" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="35" width="14" height="21" rx="1" fill="#e4e4f2" />
                                            <rect opacity="0.4" x="51" width="17" height="21" rx="1" fill="#e4e4f2" />
                                            <path d="M0 6C8.62687 6 6.85075 12.75 17 12.75C27.1493 12.75 25.3731 9 34 9C42.6269 9 42.262 13.875 49 13.875C55.5398 13.875 58.3731 6 67 6" stroke="url(#paint0_linear_622:13649)" stroke-width="2" stroke-linejoin="round" />
                                            <defs>
                                                <linearGradient id="paint0_linear_622:13649" x1="67" y1="7.96873" x2="1.67368" y2="8.44377" gradientUnits="userSpaceOnUse">
                                                    <stop stop-color="#FFD422" />
                                                    <stop offset="1" stop-color="#FF7D05" />
                                                </linearGradient>
                                            </defs>
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- posts current user makes -->
            <h1 class="text-4xl font-bold uppercase text-right pb-2 border-b border-b-indigo-500" style=" background: -webkit-linear-gradient(147deg, #6366f1 0%, #fca5a5 74%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">My Posts</h1>

            <p class="text-slate-700 py-3">Posts you create will appear here</p>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                <?php
                    // query to find post
                    $query = " SELECT * From posts where user_id=" . $_SESSION['id'];
                    // fetch post
                    $posts = mysqli_query($connection, $query);
                    // check if post exists
                    if ($posts->num_rows > 0) {

                        $data = mysqli_fetch_all($posts, MYSQLI_ASSOC); //mysqli_assoc this parameter specifies the data type that will be returned

                        foreach ($data as $key => $value) {
                            #code..
                            $key++;

                            $title = substr($value['title'], 0, 24);
                            $description = substr($value['description'], 0, 120);

                            echo ("

                                    <div class='card' style='min-height: 550px !important;'>
                                        <div class=''>
                                            <!-- img -->
                                            <div class=''>
                                                <img src='../public/$value[image]' class='h-52 w-full rounded-t-lg' style='object-fit:cover; '>
                                            </div>
                                            <!-- content -->
                                            <div class='bg-neutral-700 flex flex-col justify-start p-6 space-y-6 rounded-b-lg'>
                                                <!-- header and description -->
                                                <div class=''>
                                                    <h1 class='myfontii text-indigo-300 text-2xl font-bold uppercase'>$title</h1>
                                                </div>
                    
                                                <div>
                                                    <p class='text-indigo-100 text-sm'>$description</p>
                    
                                                    <div class='flex items-center mt-6 space-x-3'>

                                                        <a href='../views/edit_post.php?id=$value[id]' class='px-3 py-1 text-white bg-blue-500 rounded-xl baseline hover:bg-gray-900'>
                                                            Edit Post
                                                        </a>

                                                        <a href='../controllers/delete_post.php?id=$value[id]' class='px-3 py-1 text-white bg-red-500 rounded-xl baseline hover:bg-gray-900'>
                                                            Delete Post
                                                        </a>
                                                    </div>
                    
                                                </div>
                    
                                                <!-- button -->
                                                <div class='flex flex-row justify-between items-center pt-5'>
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
                                
                                ");
                        }
                    }
                ?>

            </div>

        </div>

        <!-- modal -->
        <div id="modal" class="absolute top-0 z-10" style="display: none;" >
            <div class="fixed">
                <div class="w-screen h-screen bg-gray-800 bg-opacity-75 transition-opacity" style="overflow-y:scroll ;">
                    <div class="w-11/12 lg:w-3/4 mx-auto lg:mx-10 mt-20 bg-neutral-800 text-slate-500 relative">
                        <!-- heading -->
                        <div class="py-3 flex justify-between items-center px-9">

                            <h2 class="text-4xl font-bold">Edit Your Profile</h2>

                            <!-- modal dismiss button -->
                            <span onclick="document.getElementById('modal').style.display='none'" class="text-3xl font-bold hover:text-indigo-300 hover:text-4xl">X</span>

                        </div>

                        <!-- errors -->
                        <?php

                            // if the var message exists then echo the error html
                            if (isset($error)) {

                                echo ("
                                        <div data-alert class='flex rounded-lg p-4 mt-4 text-sm bg-red-100 text-red-700 mx-6' role='alert'>
                                            <svg class='w-5 h-5 inline mr-3' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'>
                                                <path fill-rule='evenodd' d='M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z' clip-rule='evenodd'>
                                                </path>
                                            </svg>
                                            <div>
                                                <span class='font-medium'>$error</span>
                                            </div>
                                
                                            <a data-remove class='ml-auto pr-6 font-bold hover:text-black' style='cursor: pointer !important;'cu>X</a>
                                        </div>
                                    ");
                            }
                            
                        ?>

                        <!-- forms -->
                        <div class="w-full py-10">
                            <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 ">
                                <!-- Full Name form -->
                                <div class="px-9">
                                    <h2 class="text-slate-50 text-xl text-center"> Change Name </h2>

                                    <p class="p-3"> <?php echo ( $_SESSION['fullname']) ?></p>
                                    
                                    <form action="\mainBlog\controllers\edit_profile.php" method="post" class="flex flex-col space-y-4">

                                        <input type="text" name="new_name" placeholder="Enter new name" class="bg-black p-3 rounded-xl">

                                        <input class="w-32 p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    </form>
                                </div>

                                <!-- password form -->
                                <div class="px-9">

                                    <h2 class="text-slate-50 text-center text-xl"> Change Password</h2>

                                    <form action="\mainBlog\controllers\edit_profile.php" method="post" class="flex flex-col pt-6 space-y-4">

                                        <input type="password" name="old_password" placeholder="Enter old password" class="bg-black p-3 rounded-xl">

                                        <input type="password" name="new_password" placeholder="Enter new password" class="bg-black p-3 rounded-xl">

                                        <input class="w-32 p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    </form>
                                </div>

                                <!-- email form -->
                                <div class="px-9">
                                    <h2 class="text-slate-50 text-center text-xl"> Change Email </h2>

                                    <p class="p-3"> <?php echo ($_SESSION['email']) ?></p>

                                    <form action="\mainBlog\controllers\edit_profile.php" method="post" class="flex flex-col space-y-4">
                                        <input type="email" name="new_email" placeholder="Enter new email" class="bg-black p-3 rounded-xl">
                                        <input class="w-32 p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    </form>
                                </div>

                                <!-- phone form -->
                                <div class="px-9">
                                    <h2 class="text-slate-50 text-center text-xl"> Change phone </h2>

                                    <p class="p-3"> <?php echo ("@" . $_SESSION['phone']) ?></p>

                                    <form action="\mainBlog\controllers\edit_profile.php" method="post" class="flex flex-col space-y-4">
                                        <input type="text" name="new_phone" placeholder="Enter new name" class="bg-black p-3 rounded-xl">
                                        <input class="w-32 p-3 px-6 pt-2 text-white bg-indigo-500 rounded-full baseline hover:bg-gray-900" type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<!-- froala text editor script -->
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>

<script>
    // froala init
    new FroalaEditor('#myEditor', {
        toolbarInline: false
    })

    // mobile hambugger toggler
    const btn = document.getElementById("menu-btn");
    const nav = document.getElementById("menu");

    btn.addEventListener("click", () => {
        nav.classList.toggle("flex");
        nav.classList.toggle("hidden");
    });

    // display settings modal on click of the update profile button
    let modal = document.getElementById("modal");
    let settings = document.getElementById("settings");

    settings.addEventListener("click", () => {
        // modal.classList.toggle('hidden');
        modal.style.display = "block";
    })

    // dismissing alerts
    // document.getElementById("remove").onclick = function() {

    //     document.getElementById("suc_alert").remove();
    // }

    let removeBtns = document.querySelectorAll("[data-remove]");
    
    removeBtns.forEach((btn) => {
        
        btn.addEventListener("click", (event) => {

            document.querySelector("[data-alert]").remove();
            
        })
    })

</script>

</html>
<?php
include_once('../partials/header.php');

// check for error message 
// if the var error isset in the get url then set a variable message to be the get error from the site url 
if (isset($_GET['error'])) {
  // grab error message
  $message = $_GET['error'];
}


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

<style>
  .containerr {
    position: relative;
    width: 90%;
    max-width: 960px;
    height: 600px;
    font-family: sans-serif;
    border-radius: 35px;
  }

  main {
    position: absolute;
    top: 0;
    left: 0;
    width: 70%;
    height: 100%;
    transform: translateX(0);
    transition: all 1s ease-in-out;
  }

  .form {
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .form h2 {
    font-size: 2.5rem;
    /* margin-bottom: 1em; */
    /* color: #097969; */
  }

  form {
    width: 85%;
    display: flex;
    flex-direction: column;
  }

  input {

    /* background: #ecf0f3; */
    width: 100%;
    height: 2.5em;
    margin-bottom: 0.7em;
    padding: 10px;
    padding-left: 25px;
    font-size: 17px;
    border: none;
    border-radius: 15px;
    /* box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white; */
    caret-color: blue;
  }

  input:focus {
    outline: none !important;
  }

  button {
    text-transform: uppercase;
    align-self: center;
    font-size: 1.05rem;
    padding: 1em 3.5em;
    border-radius: 2em;
    /* background-color: #097969; */
    color: #fff;
    cursor: pointer;
  }

  main button {
    border: none;
    margin: 1.5em 0;
  }

  aside {
    position: absolute;
    top: 0;
    right: 0;
    width: 30%;
    height: 100%;
    background: linear-gradient(147deg, #6366f1 0%, #fca5a5 74%);
    transform: translateX(0);
    transition: all 1s ease-in-out;
  }

  aside div {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
  }


  aside button {
    border: 2px solid #fff;
  }

  main .signIn-form,
  aside .sign-up-block {
    display: none;
  }

  main.slideRight {
    left: 100%;
    transform: translateX(-100%);
  }

  aside.slideLeft {
    right: 100%;
    transform: translateX(100%);
  }

  main.slideRight .signIn-form,
  aside.slideLeft .sign-up-block {
    display: flex;
  }

  main.slideRight .signUp-form,
  aside.slideLeft .sign-in-block {
    display: none;
  }

  @media (max-width: 424px) {
    html {
      font-size: 12px;
    }

    .containerr {
      /* margin: 150px 0; */
      height: 650px;
    }

    main,
    aside {
      width: 100%;
    }

    main {
      height: 70%;
      top: 0;
      left: 0;
    }

    aside {
      top: 100%;
      left: 0;
      transform: translateY(-100%);
      height: 30%;
    }

    main.slideRight {
      top: 100%;
      left: 0;
      transform: translate(0, -100%);
    }

    aside.slideLeft {
      top: 0;
      transform: translateY(0);
    }
  }
</style>

<div class="containerr mx-auto px-6 mt-5 bg-neutral-900">
  <main>
    <div class="form signUp-form ">
      <h2 class="myfont text-indigo-500">Create Account</h2>
      <form class="text-slate-500" action="\mainBlog\controllers\register.php" method="post">

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

        <div>
          <label class="px-1 py-2" for="full_name">Full Name</label>
          <input class="bg-black" type="text" name="fullname" id="full_name" />
        </div>

        <div class="flex flex-row items-center space-x-4">
          <div class="w-1/2">
            <label class="px-1 py-2" for="user_name">Username</label>
            <input class="bg-black" name="username" type="text" for="user_name" />
          </div>
          <!-- phone -->
          <div class="w-1/2">
            <label class="px-1 py-2" for="phone">Phone</label>
            <input class="bg-black" type="text" name="phone" for="phone" />
          </div>
        </div>

        <label class="px-1 py-2" for="user_email">Email</label>
        <input class="bg-black" name="email" type="email" id="user_email" />

        <div class="flex flex-row items-center space-x-4">
          <div class="w-1/2">
            <label class="px-1 py-2" for="user_password">Password</label>
            <input class="bg-black" type="password" for="user_password" name="password" />
          </div>

          <div class="w-1/2">
            <label class="px-1 py-2" for="user_password">Confirm Password</label>
            <input class="bg-black" name="confirm_password" type="password" for="user_password" />
          </div>
        </div>

        <button type="submit" class="bg-indigo-500">Sign Up</button>
      </form>
    </div>

    <div class="form signIn-form">
      <h2 class="myfont text-indigo-500">Login</h2>

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

      <form class="text-slate-500" action="\mainBlog\controllers\login.php" method="post">
        <label class="px-1 py-2" for="user_email">Email</label>
        <input class="bg-black" type="email" id="user_email" name="email" />

        <label class="px-1 py-2" for="user_password">Password</label>
        <input class="bg-black" name="password" type="password" for="user_password" />

        <button type="submit" class="bg-indigo-500">Sign In</button>
      </form>
    </div>

  </main>

  <aside>
    <div class="sign-in-block">
      <h2 class="myfontii text-neutral-200 text-4xl">Already a User?</h2>

      <button type="submit" id="sign-in-btn">Sign In</button>
    </div>
    <div class="sign-up-block">
      <h2 class="myfontii text-neutral-200 text-4xl">New User?</h2>

      <button type="submit" id="sign-up-btn">Sign Up</button>
    </div>
  </aside>

</div>

<?php
include_once('../partials/footer.php');
?>

<script>
  const asideSection = document.querySelector("aside");
  const mainSection = document.querySelector("main");

  const signInBtn = document.getElementById("sign-in-btn");
  const signUpBtn = document.getElementById("sign-up-btn");

  signInBtn.addEventListener("click", () => {
    mainSection.classList.add("slideRight");
    asideSection.classList.add("slideLeft");
  });

  signUpBtn.addEventListener("click", () => {
    mainSection.classList.remove("slideRight");
    asideSection.classList.remove("slideLeft");
  });

  let removeBtns = document.querySelectorAll("[data-remove]");
    
  removeBtns.forEach((btn) => {
      
    btn.addEventListener("click", (event) => {

      document.querySelector("[data-alert]").remove();
        
    })
    
  })
</script>
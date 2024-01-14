<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['username']);
unset($_SESSION['nameRole']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sign up </title>
    
</head>

<body>
<section >
<div class="bg-gray-100 flex justify-center items-center h-screen">
     
<div class="w-1/2 h-screen hidden lg:block">
  <img src="images/wikie.jpg" alt="Placeholder Image" class="object-cover w-full h-full">
</div>
        <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
                
        <div class="mb-10">
                        <h3 class="text-3xl font-extrabold text-center text-sky-600">Sign Up</h3>
                    </div>
              <form class="space-y-4 md:space-y-6" action="/wikie/app/controller/auth.php" method="post">

                  <div>
                      <label for="email"  class="block text-sm font-medium text-gray-700">username</label>
                      <input id="username" type="username" name="username" class="mt-1 p-2 w-full border rounded-md" placeholder="username">
                  </div>
                  <div>
                      <label for="email"  class="block text-sm font-medium text-gray-700">Your email</label>
                      <input id="email" type="email" name="email" class="mt-1 p-2 w-full border rounded-md" placeholder="email">
                  </div>
                  <div>
                      <label for="password"  class="block text-sm font-medium text-gray-700">password</label>
                      <input id="password" type="password" name="password" class="mt-1 p-2 w-full border rounded-md" placeholder="password">
                  </div>
                  <div>
                      <label for="confirm password"  class="block text-sm font-medium text-gray-700"> confirm password</label>
                      <input id="confirm password" type="confirm password" name="confirm password" class="mt-1 p-2 w-full border rounded-md"placeholder="confirm password">
                  </div>
                
                  <button name="register" type="submit" class="w-full text-white hover:bg-sky-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-sky-600 ">Sign up</button>
                  <p class="text-sm mt-6 text-center">you already have an account ?<a href="login.php" class="text-sky-800 font-semibold hover:underline ml-1 whitespace-nowrap">login</a></p>
              </form>
          </div>
      </div>
  </div>
</section>
</body>
</html>


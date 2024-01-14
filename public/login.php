<?php
session_start();
// unset($_SESSION['user_id']);
// unset($_SESSION['username']);
// unset($_SESSION['nameRole']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login </title>
    
</head>
<body>
<section >
<div class="bg-gray-100 flex justify-center items-center h-screen">
<div class="w-1/2 h-screen hidden lg:block">
    <img src="images/wikie.jpg" alt="Placeholder Image" class="object-cover w-full h-full">
    </div>
    <div class="lg:p-36 md:p-52 sm:20 p-8 w-full lg:w-1/2">
        <!-- <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen"> -->
           

            <!-- <div class="w-full  rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0 bg-gray-800 border-gray-700"> -->
                <!-- <div class="p-6 space-y-4 md:space-y-6 sm:p-8"> -->
                <div class="mb-10">
                        <h3 class="text-3xl font-extrabold text-center text-sky-600">LOGIN</h3>
                    </div> 
                    <form class="space-y-4 md:space-y-6" action="/wikie/app/controller/auth.php" method="post">

                        <div>
                            <label for="username" class="text-sm mb-2 block">username</label>
                            <input id="username" type="username" name="username"
                                class="w-full text-sm border border-solid px-4 py-3 rounded-md outline-gray-600"
                                placeholder="username">
                        </div>
                        <div>
                            <label for="password" class="text-sm mb-2 block">Password</label>
                            <input id="password" type="password" name="password" placeholder="***********"
                            class="w-full text-sm border border-solid px-4 py-3 rounded-md outline-gray-600">
                        </div>
                        <button name="login" type="submit"
                            class="w-full shadow-xl py-2.5 px-4 text-sm font-semibold rounded text-white bg-sky-600 hover:bg-sky-800 focus:outline-none">log
                            in</button>
                        <P class="text-sm mt-6 text-center">
                            You don't have an account ?
                    <a class="text-sky-700 font-semibold hover:underline ml-1 whitespace-nowrap" href="register.php">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<script src="/wikie/public/js/regexLogin.js"></script>
</body>

</html>
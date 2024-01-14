<?php
include_once ($_SERVER["DOCUMENT_ROOT"]."/wikie/app/service/UserService.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/wikie/app/service/WikiService.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/wikie/app/service/TagService.php");
include_once ($_SERVER["DOCUMENT_ROOT"]."/wikie/app/service/CategoryService.php");

                        $UserService = new UserService();
                        $authorcount = $UserService->countauthor();
                        $WikiService = new WikiService();
                        $wikicount = $WikiService->countWiki();
                        $tagService = new tagService();
                        $tagcount = $tagService->counttag();
                        $categoryService = new categoryService();
                        $categorycount = $categoryService->countcategory();
                    
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="bg-gradient-to-r from-cyan-500 to-blue-500 min-h-screen flex items-center justify-center">
<div class="bg-white flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
 
<div class="bg-cyan-500 px-2 lg:px-4 py-2 lg:py-10 sm:rounded-xl flex lg:flex-col justify-between">
      <nav class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
      <a class="text-white p-4 inline-flex justify-center" href="../view/authorIndex.php">
          Home
        </a>
        <a class="text-white p-4 inline-flex justify-center" href="../view/authorWikis.php">
          Wikie
        </a>
       
      </nav>
      <div class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
        <a class="text-white p-4 inline-flex justify-center"  href="/wikie/public/login.php">Log out
        </a>
        
      </div>
      
    </div>
    
    <div>
      <div class="flex justify-between items-center">
      <h3 class="text-3xl font-extralight text-gray-800">Statistiques</h3>  
        </div>

            </div>
            
            <div class="flex-1 p-4 w-full md:w-1/2">

                <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                    <div class="flex-1 bg-cyan-500 p-4 shadow rounded-lg md:w-1/2">

                        <h2 class="flex text-white text-lg font-semibold pb-1"> 
                        
                            AUTHORS</h2>
                        <div class="my-1"></div>
                        <div class="flex">
                            <span class="py-2 px-8 bg-grey-lightest font-bold uppercase text-l text-white ">
                            <?= $authorcount ?>
                            </span>
                            <h3
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                                Authors</h3>
                        </div>
                    </div>

                    <div class="flex-1 bg-cyan-500 p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="flex text-white text-lg font-semibold pb-1">
                            CATEGORIES</h2>
                        <div class="my-1"></div>
                        <div class="flex">

                            <span class="py-2 px-16 bg-grey-lightest font-bold uppercase text-l text-white ">
                            <?= $categorycount ?>
                            </span>
                            <h3
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                                categories</h3>
                        </div>
                    </div>


                </div>
                <div class="mt-8 flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                    <div class="flex-1 bg-cyan-500 p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="flex text-white text-lg font-semibold pb-1">
                           WIKIS</h2>
                        <div class="my-1"></div>
                        <div class="flex">
                            <span class="py-2 px-10 bg-grey-lightest font-bold uppercase text-l text-white ">
                            <?= $wikicount ?>
                            </span>
                            <h3
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                                Wikis</h3>

                        </div>
                    </div>
                    <div class="flex-1 bg-cyan-500 p-4 shadow rounded-lg md:w-1/2">
                        <h2 class="flex text-white text-lg font-semibold pb-1">
                            TAGS</h2>
                        <div class="my-1"></div>
                        <div class="flex">

                            <span class="py-2 px-16 bg-grey-lightest font-bold uppercase text-l text-white ">
                            <?= $tagcount ?>
                            </span>
                            <h3
                                class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                                tags</h3>
                        </div>
                    </div>
                </div>

            </div>

        
    </div>
</body>

</html>
<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/wikie/app/service/WikiService.php");


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body class="bg-gradient-to-r from-blue-800 to-indigo-900 min-h-screen flex items-center justify-center">
<div class="bg-white flex-1 flex flex-col space-y-5 lg:space-y-0 lg:flex-row lg:space-x-10 max-w-6xl sm:p-6 sm:my-2 sm:mx-4 sm:rounded-2xl">
<div class="bg-blue-800 px-2 lg:px-4 py-2 lg:py-10 sm:rounded-xl flex lg:flex-col justify-between">
<nav class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
      <a class="text-white p-4 inline-flex justify-center" href="../view/adminIndex.php">
          Home
        </a>
        <a class="text-white p-4 inline-flex justify-center" href="../view/adminWikis.php">
          Wikie
        </a>
        <!-- Active: bg-gray-800 text-white, Not active: text-white/50 -->
        <a class="text-white p-4 inline-flex justify-center"  href="../view/adminCategory.php">
          Category
        </a>
        <a class="text-white p-4 inline-flex justify-center" href="../view/adminTags.php">
          Tags
        </a>
      </nav>
      <div class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
      <button>
                    <a href="../view/archivedwikis.php">
                        <svg class="w-6 h-6 text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                d="M8 8v1h4V8m4 7H4a1 1 0 0 1-1-1V5h14v9a1 1 0 0 1-1 1ZM2 1h16a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1Z" />
                        </svg></a>
                </button>
                
        <a class="text-white p-4 inline-flex justify-center" href=" /wikie/public/login.php"> Log out
        </a>
        
      </div>
      
    </div>
    <div class="flex-1 flex flex-wrap">
<div class="flex-1 p-4 w-full md:w-1/2">
                
<div class="flex flex-wrap -mx-4">
                        <?php
                    $WikiService = new WikiService;
                    $Wikis = $WikiService->displayarchive();
                    foreach ($Wikis as $Wiki): ?>
     <div class="flex-1  p-4  min-w-md max-w-md">
                            <div class="mt-8">
                            <div class="flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                                    <div class="relative group bg-blue-800 py-5 sm:py-4 px-2 sm:px-2 flex flex-col space-y-1 items-center cursor-pointer rounded-md hover:bg-sky-800 hover:smooth-hover">
                                        <h2 class="flex justfy-between text-white text-lg font-semibold pb-1">
                                               
                                                <?= $Wiki['dateCreated']; ?>
                                        </h2><span class=" flex justify-between py-2 px-8 bg-grey-lightest font-bold uppercase
                                            text-l text-white ">
                                            <?= $Wiki['title']; ?>
                                            <div class="flex">
                                                <p class="px-4">id:<?= $Wiki['idWiki']; ?>
                                                </p>
                                                
                                                <form action="../controller/Wiki.php" method="POST">
                                                    <input type="hidden" name="unarchiveWiki">
                                                    <input type="hidden" name="unarchive_Wiki_ID"
                                                        value="<?= $Wiki['idWiki'] ?>">
                                                    <button type="submit" >

                                                    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 7 3-3-3-3m0 12H5.5a4.5 4.5 0 1 1 0-9H14"/>
                                                    </svg>
  
  
                                                        
                                                    </button>
                                                </form>
                                            </div>
                                        </span>
                                        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
                                      
                                        <h3
                                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-gray-500 border-b border-grey-light">
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            </div>
            </div>
    <script src="/wikie/public/js/modal.js"></script>
</body>
</html>
<?php
include_once($_SERVER["DOCUMENT_ROOT"] . "/wikie/app/service/WikiService.php");

include_once($_SERVER["DOCUMENT_ROOT"] . "/wikie/app/service/CategoryService.php");

include_once($_SERVER["DOCUMENT_ROOT"] . "/wikie/app/service/TagService.php");

include_once($_SERVER["DOCUMENT_ROOT"] . "/wikie/app/service/UserService.php");
session_start();

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
      <a class="text-white p-4 inline-flex justify-center  smooth-hover" href="../view/authorIndex.php">
          Home
        </a>
      <a class="text-white p-4 inline-flex justify-center smooth-hover" href="../view/authorWikis.php">
          Wikie
        </a>
       
      </nav>
      <div class="flex items-center flex-row space-x-2 lg:space-x-0 lg:flex-col lg:space-y-2">
        <a class="text-white p-4 inline-flex justify-center smooth-hover"  href="/wikie/public/login.php">Log out
        </a>
        
      </div>
      
    </div>
            <div class="flex-1 p-4 w-full md:w-1/2">
            <div class="text-right mt-4" >
                    <button id="addBtn" class="mr-4 bg-cyan-500 text-white px-4 py-2 rounded">Add Wiki</button>
                </div>
                <div class="flex flex-wrap -mx-4">
                    <?php
                    $WikiService = new WikiService;
                    $loggedInUserId = $_SESSION['user_id'];
                    $author = $_SESSION['username'];
                //    var_dump($loggedInUserId);
                //    die();
                   
                    $loggedInUserWiki = new Wiki();
                    $loggedInUserWiki->setIduser($loggedInUserId);
                    $Wikis = $WikiService->displayonly($loggedInUserWiki);
                    foreach ($Wikis as $Wiki): ?>
                         <div class="flex-1 p-4 m-4 min-w-md max-w-md">
                            <div class="mt-8">
                            <div class="flex flex-wrap space-x-0 space-y-2 md:space-x-4 md:space-y-0">
                                    <div class="relative group bg-cyan-500 py-5	 sm:py-4 px-2 sm:px-2 flex flex-col space-y-1 items-center cursor-pointer rounded-md hover:bg-cyan-900 hover:smooth-hover">
                                        <h2 class="flex justfy-between text-white text-lg font-semibold pb-1">
                                            
                                         author: <?= $author ?>
                                          </h2>
                                          <h2 class="flex justfy-between text-white text-lg font-semibold pb-1">
                                              
                                               <p class="ml-8"> <?= $Wiki['dateCreated']; ?></p>
                                        </h2><span class=" flex justify-between py-2 px-8 bg-grey-lightest font-bold uppercase
                                            text-l text-white ">
                                            <?= $Wiki['title']; ?>
                                            <div class="flex">
                                                <p class="px-4">id:<?= $Wiki['idWiki']; ?>
                                                </p>
                                                
                                                <form method="post">
                                                    <input type="hidden" name="idWiki">
                                                    <button type="button"
                                                        onclick="showeditModal(<?= $Wiki['idWiki'] ?>)">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-blue-700 hover:fill-blue-700" viewBox="0 0 348.882 348.882">
                                                <path d="m333.988 11.758-.42-.383A43.363 43.363 0 0 0 304.258 0a43.579 43.579 0 0 0-32.104 14.153L116.803 184.231a14.993 14.993 0 0 0-3.154 5.37l-18.267 54.762c-2.112 6.331-1.052 13.333 2.835 18.729 3.918 5.438 10.23 8.685 16.886 8.685h.001c2.879 0 5.693-.592 8.362-1.76l52.89-23.138a14.985 14.985 0 0 0 5.063-3.626L336.771 73.176c16.166-17.697 14.919-45.247-2.783-61.418zM130.381 234.247l10.719-32.134.904-.99 20.316 18.556-.904.99-31.035 13.578zm184.24-181.304L182.553 197.53l-20.316-18.556L294.305 34.386c2.583-2.828 6.118-4.386 9.954-4.386 3.365 0 6.588 1.252 9.082 3.53l.419.383c5.484 5.009 5.87 13.546.861 19.03z" data-original="#000000" />
                                                <path d="M303.85 138.388c-8.284 0-15 6.716-15 15v127.347c0 21.034-17.113 38.147-38.147 38.147H68.904c-21.035 0-38.147-17.113-38.147-38.147V100.413c0-21.034 17.113-38.147 38.147-38.147h131.587c8.284 0 15-6.716 15-15s-6.716-15-15-15H68.904C31.327 32.266.757 62.837.757 100.413v180.321c0 37.576 30.571 68.147 68.147 68.147h181.798c37.576 0 68.147-30.571 68.147-68.147V153.388c.001-8.284-6.715-15-14.999-15z" data-original="#000000" />
                                            </svg>
                                                    </button>
                                                </form>
                                                <form action="../controller/Wiki.php" method="POST">
                                                    <input type="hidden" name="deletewiki">
                                                    <input type="hidden" name="delete_Wiki_ID"
                                                        value="<?= $Wiki['idWiki'] ?>">
                                                    <button type="submit" data-modal-toggle="delete-product-modal">

                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                                                <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z" data-original="#000000" />
                                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z" data-original="#000000" />
                                            </svg>
                                                        
                                                    </button>
                                                </form>
                                            </div>
                                        </span>
                                        <div class="bg-gradient-to-r from-blue-800 to-blue-800 h-px mb-6"></div>
                                       
                                        <h3
                                            class="flex space-x-12 py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-white border-b border-grey-light">
                                         <p>Category:<?= $Wiki['nameCategory'];?></p> <p>tag:<?=$Wiki['tagNames']?></p> 
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div id="addModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden items-center flex justify-center">
            <div class="bg-white p-8 rounded shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-4 text-cyan-500 text-center">Add Wiki</h2>
                <form id="addForm" action="../controller/Wiki.php" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-semibold text-gray-600">title:</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-semibold text-gray-600">Content:</label>
                        <input type="text" id="content" name="content" class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="Wikipic" class="block text-sm font-semibold text-gray-600">Wiki pic:</label>
                        <input type="file" id="Wikipic" name="Wikipic" class="w-full p-2 border rounded">
                    </div>
                    <div>
                    <label for="CategoryId" class="block text-sm font-semibold text-gray-600">Select Category:</label>
                    <select name="Category_Id"  class="w-full p-2 border rounded">
                        <?php
                        $CategoryService = new CategoryService();
                        $Categorys = $CategoryService->display();
                        foreach ($Categorys as $Category) {
                            echo "<option value='$Category[idCategory]'>$Category[nameCategory]</option>";
                        }
                        ?>
                    </select>

        <div>     
         <?php
                        $TagService = new TagService();
                        $Tags = $TagService->display();
                        foreach ($Tags as $Tag) {      
                            echo" <input type='checkbox' id='tag' name='tag[]' value='$Tag[idTag]'>
                  <label for='tag'> $Tag[nameTag]</label><br>";}?>
</div>
                </div>
                <br> <br> 

                    <button type="submit" name="addWiki" class="bg-cyan-500 text-white px-4 py-2 rounded">Add
                        Wiki</button>
                    <button type="button" id="closeAddModal"
                        class="bg-gray-700 text-white px-4 py-2 rounded">Cancel</button>
                </form>
            </div>
        </div>
        <div id="editModal"
            class="fixed inset-0 bg-gray-900 bg-opacity-80 backdrop-blur-sm hidden items-center flex justify-center">
            <div class="bg-white p-8 rounded shadow-lg w-96">
                <h2 class="text-2xl font-bold mb-4">edit Wiki</h2>
                <form method="post" action="../controller/Wiki.php" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-semibold text-gray-600">Title:</label>
                        <input type="text" id="title" name="title" class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-sm font-semibold text-gray-600">Content:</label>
                        <input type="text" id="content" name="content" class="w-full p-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="Wikipic" class="block text-sm font-semibold text-blue-500">Wiki pic:</label>
                        <input type="file" id="Wikipic" name="Wikipic" class="w-full p-2 border rounded text-blue-500">
                    </div>
                    
                    <div>
                    <label for="CategoryId" class="block text-sm font-semibold text-gray-600">Select Category:</label>
                    <select name="Category_Id"  class="w-full p-2 border rounded">
                        <?php
                        $CategoryService = new CategoryService();
                        $Categorys = $CategoryService->display();
                        foreach ($Categorys as $Category) {
                            echo "<option value='$Category[idCategory]'>$Category[nameCategory]</option>";
                        }
                        ?>
                    </select>
                    <!-- <label for="TagId" class="block text-sm font-semibold text-gray-600">Select Tag:</label>
                    <select name="Tag_Id"  class="w-full p-2 border rounded">
                       
                        // $TagService = new TagService();
                        // $Tag = $TagService->display();
                        // foreach ($Tags as $Tag) {
                        //     echo "<option value='$Tag[idTag]'>$Tag[nameTag]</option>";
                        // }
                        ?>
                    </select> -->
                </div>
                <br> <br>
                    <input type="hidden" id="id-edit" name="id-edit">
                    <button type="submit" name="editWiki" action="../controller/Wiki.php"
                        onclick="hideeditModal()" class="bg-blue-800 text-black px-4 py-2 rounded">edit
                        Wiki</button>
                    <button type="button" id="closeeditModal" onclick="hideeditModal()"
                        class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <script src="/wikie/public/js/modal.js"></script>
</body>

</html>
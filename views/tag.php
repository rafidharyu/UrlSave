<?php
require_once('../controller/show_post.php');
if (!isset($_SESSION['user_id'])) {
    header('location: ./login.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="src/output.css" rel="stylesheet">
    <title>index</title>
</head>
<body>

    <?php include('./components/navbar.php'); ?>

    <div class="container max-w-7xl mx-auto mt-8">
    <div class="mb-4">
        <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">Your Tag</h1>
        <div class="flex justify-end mr-1">
        <a href="./components/create_post.php"> 
                <button class="px-4 py-2 rounded-md bg-sky-700 text-white hover:bg-sky-600">
                    
                        Create New Register
                    
                </button>
            </a>
        
        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-blue-950 shadow sm:rounded-lg">
            <table class="min-w-full">
            <thead>
                <tr>

                    <th
                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                        tag
                    </th>

                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50" colspan="3">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white">
                
                <!-- Fetch Database and show all posts -->
                <?php 
                    foreach($results as $result){
                ?>

                <tr>
                    <!--Show Tag-->
                    <td class="py-4 pr-96 text-lg leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                        <span class=""><?php echo $result -> tag?></span>
                    </td>

                    <!-- Edit icon -->
                        <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                            <!-- identify the post -->
                            <a href="../views/components/edit_post.php?codigo=<?php echo $result -> date?>" class="text-indigo-600 hover:text-indigo-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            </a>
                        </td>

                    <!-- see icon -->
                        <td class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                            <a href="/URLSAVE/views/components/show_post.php" class="text-gray-600 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            </a>
                        </td>

                    <!-- delete icon -->
                        
                        <td class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                            <a onclick="return confirm('Are You Sure You Want To Delete??');" href="/URLSAVE/controller/delete_post.php?codigo=<?php echo $result -> date?>"><svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-red-600 hover:text-red-800"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg></a>
                        </td>
                </tr>
                
                <!-- Close for each -->
                <?php 
                    }
                ?>
                

                <!--end table-->
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>

</body>
</html>
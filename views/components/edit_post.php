<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location: ../login.php');
}
?>
<?php

if (!isset($_GET['codigo'])) {
  header('location: ../index.php');
}
?>

<?php
require_once("../../database/Connection.php");



//Database consulting 
$query = $conn->prepare("SELECT * FROM urlsave WHERE date = :date");
$query->bindParam(':date', $_GET['codigo']);
$query->execute();
$results = $query->fetch(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
</head>

<body>

  <?php include('./navbar.php'); ?>

  <div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
        <div class="mb-4">
          <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">
            Edit Post
          </h1>
        </div>

        <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
          <form method="POST" action="../../controller/edit_post.php">
            <!-- url -->
            <div>
              <label class="block text-lg font-bold text-gray-700" for="title">
                Url
              </label>

              <input class="block w-full mt-1 border-gray-400 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="url" name="url" value="<?php echo $results->url ?>" required />
            </div>

            <!-- title -->
            <div>
              <label class="block text-lg font-bold text-gray-700" for="title">
                Title
              </label>

              <input class="block w-full mt-1 border-gray-400 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="title" value="<?php echo $results->title ?>" />
            </div>

            <!-- caption -->
            <div class="mt-4">
              <input name="caption" hidden value="<?php echo $results->caption ?>"></input>
            </div>

            <div class="flex items-center justify-start mt-4">

              <input type="hidden" name="codigo" value="<?php echo $results->date ?>">


              <button type="submit" class="px-6 py-2 text-lg font-semibold rounded-md shadow-md text-sky-100 bg-blue-500 hover:bg-blue-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                Save
              </button>



            </div>
          </form>
          <!--onclick make work  button redirect -->
          <button type="submit" value="cancell" onClick="document.location.href='/URLSAVE/views/index.php';" class="ml-0 mt-4 px-5 py-2 text-lg font-semibold text-gray-100 bg-red-400 rounded-md shadow-md hover:bg-red-600 focus:outline-none focus:border-red-900 focus:ring ring-red-300">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
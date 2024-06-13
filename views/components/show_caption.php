<?php
require_once('../../controller/show_post.php');
if (!isset($_SESSION['user_id'])) {
  header('location: ../login.php');
}
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

  <?php include('../components/navbar.php'); ?>

  <div>
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

      <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

        <div class="mb-4">
          <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">Url Save</h1>
        </div>

        <!-- Fetch Database and show all posts -->
        <?php
        foreach ($results as $result) {
        ?>

          <div class=" mb-4 w-full px-6 py-4 bg-white rounded-lg shadow-md ring-1 ring-gray-900/10">
            <!-- Title -->
            <div>
              <div class="mt-4 max-w-3xl  px-2 py-4 bg-white rounded-md shadow-md ring-1 ring-gray-900/10">
                <p class="text-lg font-semibold text-center underline">
                  <?php echo $result->caption ?>
                </p>
              </div>
            </div>
          </div>

          <!-- Close for each -->
        <?php
        }
        ?>

      </div>
    </div>
  </div>

</body>

</html>
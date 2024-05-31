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
    <title>index</title>
</head>
<body>

    <?php include('./components/navbar.php'); ?>

    <div class="ms-32 mt-10 bg-sky-700 rounded-r-full rounded-l-3xl w-5/6 py-36 border-blue-950 border-8 shadow-lg">
        <div class="absolute top-36 left-40">
            <h3 class="font-bold text-3xl text-white">Hello <?php echo$_SESSION['username']; ?>!</h3>
            <p class="font-normal text-xl text-white pb-4">Welcome to Url Save Dashboard!</p>
            <p class="font-normal text-xl text-white">We have many types of cars that are ready for you
                to travel <br> anywhere and anytime.
            </p>
        </div>
        <div class="absolute w-[32%] top-20 pt-2 end-40  me-10">
            <img src="./assets/urlsave.svg" alt="">
        </div>
    </div>

    <?php include('./components/post_table.php'); ?>

</body>
</html>
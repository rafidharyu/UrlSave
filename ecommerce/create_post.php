<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tokopedia = $_POST['tokopedia'];
    $shopee = $_POST['shopee'];
    $bukalapak = $_POST['bukalapak'];
    $lazada = $_POST['lazada'];

    $sql = "INSERT INTO ecommerce (tokopedia, shopee, bukalapak, lazada) VALUES (:tokopedia, :shopee, :bukalapak, :lazada)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tokopedia', $tokopedia);
    $stmt->bindParam(':shopee', $shopee);
    $stmt->bindParam(':bukalapak', $bukalapak);
    $stmt->bindParam(':lazada', $lazada);
    $stmt->execute();

    header('Location: ecommerce.php');
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
    <title>Create Post</title>
</head>
<body>
    <?php include('../views/components/navbar.php'); ?>

    <div class="container max-w-7xl mx-auto mt-8">
        <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950 mb-4">Create New Entry</h1>
        <form action="" method="POST">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tokopedia</label>
                <input type="text" name="tokopedia" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Shopee</label>
                <input type="text" name="shopee" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Bukalapak</label>
                <input type="text" name="bukalapak" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Lazada</label>
                <input type="text" name="lazada" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 rounded-md bg-sky-700 text-white hover:bg-sky-600">Create</button>
            </div>
        </form>
    </div>
</body>
</html>

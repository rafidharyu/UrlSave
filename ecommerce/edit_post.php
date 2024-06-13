<?php
include('db.php');

$id = $_GET['codigo'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tokopedia = $_POST['tokopedia'];
    $shopee = $_POST['shopee'];
    $bukalapak = $_POST['bukalapak'];
    $lazada = $_POST['lazada'];

    $sql = "UPDATE ecommerce SET tokopedia = :tokopedia, shopee = :shopee, bukalapak = :bukalapak, lazada = :lazada WHERE id_ecommerce = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':tokopedia', $tokopedia);
    $stmt->bindParam(':shopee', $shopee);
    $stmt->bindParam(':bukalapak', $bukalapak);
    $stmt->bindParam(':lazada', $lazada);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header('Location: index.php');
} else {
    $sql = "SELECT * FROM ecommerce WHERE id_ecommerce = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit E-commerce Entry</title>
</head>
<body>
    <?php include('../views/components/navbar.php'); ?>

    <div class="container mx-auto mt-12">
        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">Edit E-commerce Entry</h1>
        <form action="" method="POST" class="max-w-xl mx-auto bg-white p-8 rounded-lg shadow-md">
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="tokopedia">Tokopedia</label>
                <input type="text" name="tokopedia" value="<?php echo htmlspecialchars($result->tokopedia); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="shopee">Shopee</label>
                <input type="text" name="shopee" value="<?php echo htmlspecialchars($result->shopee); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="bukalapak">Bukalapak</label>
                <input type="text" name="bukalapak" value="<?php echo htmlspecialchars($result->bukalapak); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="lazada">Lazada</label>
                <input type="text" name="lazada" value="<?php echo htmlspecialchars($result->lazada); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>

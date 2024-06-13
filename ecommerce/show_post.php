<?php
include('db.php');

// Fetch the data from the database
$id = $_GET['codigo'];
try {
    $sql = "SELECT * FROM ecommerce WHERE id_ecommerce = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$result) {
        echo "No record found";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
    <title>View E-commerce Links</title>
</head>
<body>
    
    <?php include('../views/components/navbar.php'); ?>

    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="mb-4">
                <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">Your E-commerce Links</h1>
            </div>

            <div class="mb-4 w-full px-6 py-4 bg-white rounded-lg shadow-md ring-1 ring-gray-900/10">
                <div class="text-center pb-4 text-3xl font-bold mb-2">
                    Your E-commerce Links
                </div>

                <div class="flex flex-col items-center space-y-4">
                    <!-- Tokopedia -->
                    <a href="<?php echo htmlspecialchars($result->tokopedia); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-md hover:bg-green-600">
                            Tokopedia
                        </button>
                    </a>
                    <!-- Shopee -->
                    <a href="<?php echo htmlspecialchars($result->shopee); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-orange-500 text-white font-semibold rounded-md hover:bg-orange-600">
                            Shopee
                        </button>
                    </a>
                    <!-- Bukalapak -->
                    <a href="<?php echo htmlspecialchars($result->bukalapak); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-red-500 text-white font-semibold rounded-md hover:bg-red-600">
                            Bukalapak
                        </button>
                    </a>
                    <!-- Lazada -->
                    <a href="<?php echo htmlspecialchars($result->lazada); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600">
                            Lazada
                        </button>
                    </a>
                </div>

                <div class="text-center mt-4 text-xs text-gray-500">
                    Please visit our e-commerce links
                </div>
            </div>
        </div>
    </div>

</body>
</html>

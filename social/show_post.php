<?php
include('db.php');

// Fetch the data from the database
try {
    $sql = "SELECT * FROM Sosmed";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (!$results) {
        $results = [];
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    $results = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
    <title>Social Media Links</title>
</head>
<body>
    
    <?php include('../views/components/navbar.php'); ?>

    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
            <div class="mb-4">
                <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">Your Social Media</h1>
            </div>

            <!-- Fetch Database and show all posts -->
            <?php 
            if (empty($results)) {
                echo "<p class='text-center text-gray-500'>No social media links found.</p>";
            } else {
                foreach ($results as $result) {
            ?>
            <div class="mb-4 w-full px-6 py-4 bg-white rounded-lg shadow-md ring-1 ring-gray-900/10">
                <div class="text-center pb-4 text-3xl font-bold mb-2">
                    Your Social Media
                </div>

                <div class="flex flex-col items-center space-y-4">
                    <!-- Instagram -->
                    <a href="<?php echo htmlspecialchars($result->instagram); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-gradient-to-r from-pink-500 via-purple-500 to-yellow-500 text-white font-semibold rounded-md hover:from-pink-600 hover:via-purple-600 hover:to-yellow-600">
                            Instagram
                        </button>
                    </a>
                    <!-- LinkedIn -->
                    <a href="<?php echo htmlspecialchars($result->linkedin); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-[#0e76a8] text-white font-semibold rounded-md hover:bg-[#0c6591]">
                            LinkedIn
                        </button>
                    </a>
                    <!-- X -->
                    <a href="<?php echo htmlspecialchars($result->x); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-gray-800 text-white font-semibold rounded-md hover:bg-gray-700">
                            X
                        </button>
                    </a>
                    <!-- Facebook -->
                    <a href="<?php echo htmlspecialchars($result->facebook); ?>" target="_blank" class="w-full">
                        <button class="w-full px-4 py-2 bg-[#1877f2] text-white font-semibold rounded-md hover:bg-[#155dbf]">
                            Facebook
                        </button>
                    </a>
                </div>

                <div class="text-center mt-4 text-xs text-gray-500">
                    Please visit our social media
                </div>
            </div>
            <?php 
                }
            }
            ?>
        </div>
    </div>

</body>
</html>

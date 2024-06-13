<?php
session_start();
require_once('db.php');

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header('location: ../login.php');
    exit;
}

// Fetch the existing data for the specified id
if (isset($_GET['codigo'])) {
    $id = $_GET['codigo'];
    $stmt = $conn->prepare("SELECT * FROM Sosmed WHERE id_sosmed = :id");
    $stmt->execute(['id' => $id]);
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if (!$result) {
        echo "No record found with ID: $id";
        exit;
    }
} else {
    echo "ID not specified.";
    exit;
}

// Update the record in the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $instagram = $_POST['instagram'];
    $linkedin = $_POST['linkedin'];
    $x = $_POST['x'];
    $facebook = $_POST['facebook'];

    // Debugging output
    echo "<pre>";
    echo "Instagram: $instagram\n";
    echo "LinkedIn: $linkedin\n";
    echo "X: $x\n";
    echo "Facebook: $facebook\n";
    echo "</pre>";

    $stmt = $conn->prepare("UPDATE Sosmed SET instagram = :instagram, linkedin = :linkedin, x = :x, facebook = :facebook WHERE id_sosmed = :id");
    $stmt->execute([
        'instagram' => $instagram,
        'linkedin' => $linkedin,
        'x' => $x,
        'facebook' => $facebook,
        'id' => $id
    ]);

    if ($stmt->rowCount() > 0) {
        echo "Record updated successfully.";
        header('Location: social.php');
        exit;
    } else {
        echo "No changes made to the record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Post</title>
</head>
<body>
    <?php include('../views/components/navbar.php'); ?>

    <div class="container max-w-7xl mx-auto mt-8">
        <div class="mb-4">
            <h1 class="font-medium text-4xl text-sky-700 underline decoration-blue-950">Edit Social Media</h1>
        </div>

        <form action="edit_post.php?codigo=<?php echo $id; ?>" method="POST" class="max-w-3xl mx-auto bg-white p-6 rounded-md shadow-md">
            <div class="mb-4">
                <label for="instagram" class="block text-gray-700">Instagram</label>
                <input type="text" name="instagram" id="instagram" value="<?php echo $result->instagram; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="linkedin" class="block text-gray-700">LinkedIn</label>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo $result->linkedin; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="x" class="block text-gray-700">X</label>
                <input type="text" name="x" id="x" value="<?php echo $result->x; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="mb-4">
                <label for="facebook" class="block text-gray-700">Facebook</label>
                <input type="text" name="facebook" id="facebook" value="<?php echo $result->facebook; ?>" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 rounded-md bg-sky-700 text-white hover:bg-sky-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>

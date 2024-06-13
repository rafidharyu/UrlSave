<?php
$host = 'localhost:3306'; // Change if necessary
$db = 'UAP'; // Change to your database name
$user = 'root'; // Change to your database username
$pass = ''; // Change to your database password

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

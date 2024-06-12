<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/URLSAVE/database/Connection.php';

// Ensure the database connection is established
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

// Fetch data from the database
try {
    $query = $conn->prepare("SELECT * FROM sosmed");
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

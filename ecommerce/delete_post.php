<?php
include('db.php');

$id = $_GET['codigo'];

$sql = "DELETE FROM ecommerce WHERE id_ecommerce = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

header('Location: ecommerce.php');
?>

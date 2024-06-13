<?php
include('db.php');

$id_sosmed = $_GET['codigo'];

if ($id_sosmed) {
    $sql = "DELETE FROM Sosmed WHERE id_sosmed = :id_sosmed";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id_sosmed', $id_sosmed, PDO::PARAM_INT);
    $stmt->execute();
}

header("Location: social.php");
?>

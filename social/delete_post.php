<?php
include('db.php');

$id_sosmed = $_GET['codigo'];

$sql = "DELETE FROM Sosmed WHERE id_sosmed = :id_sosmed";
$stmt = $conn->prepare($sql);
$stmt->execute(['id_sosmesd' => $id_sosmed]);

header("Location: ../views/index.php");
?>

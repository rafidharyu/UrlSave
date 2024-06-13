<?php
include('db.php');

$instagram = $_POST['instagram'];
$linkedin = $_POST['linkedin'];
$x = $_POST['x'];
$facebook = $_POST['facebook'];

$sql = "INSERT INTO Sosmed (instagram, linkedin, x, facebook) VALUES (:instagram, :linkedin, :x, :facebook)";
$stmt = $conn->prepare($sql);
$stmt->execute(['instagram' => $instagram, 'linkedin' => $linkedin, 'x' => $x, 'facebook' => $facebook]);

header("Location: social.php");
?>

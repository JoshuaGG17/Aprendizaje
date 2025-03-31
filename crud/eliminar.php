<?php
include 'database.php';
$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=$id";
$conn->query($sql);
header('Location: index.php');
?>
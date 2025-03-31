<?php
include 'database.php'; // Incluir la conexión a la base de datos

$id = $_GET['id'];
$sql = "DELETE FROM usuarios WHERE id=$id";
if ($conn->query($sql)) {
    header('Location: index.php'); // Redirigir a la lista de usuarios
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>
<?php
$host = 'localhost';      // Servidor de la base de datos
$dbname = 'crud_db';      // Nombre de la base de datos
$username = 'root';       // Usuario de la base de datos
$password = '';           // Contraseña de la base de datos

// Crear conexión
$conn = new mysqli($host, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
// echo "Conexión exitosa a la base de datos";
?>
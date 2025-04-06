<?php

require_once("../database/database.php");


function traerDatos()
{
    global $conn;
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    return $result;
}

function crearUsuario()
{
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad']; // Calculada por JS
        $rol = $_POST['rol'];
        $fecha_inicio_labores = $_POST['fecha_inicio_labores'];
        $telefono = $_POST['telefono'];

        $sql = "INSERT INTO usuarios (nombre, fecha_nacimiento, edad, rol, fecha_inicio_labores, telefono) 
                VALUES ('$nombre', '$fecha_nacimiento', $edad, '$rol', '$fecha_inicio_labores', '$telefono')";

        if ($conn->query($sql)) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

function editarDatos()
{
    global $conn;
    // 1. Obtener el ID del usuario a editar
    $id = $_GET['id'];

    // 2. Obtener los datos actuales del usuario
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $result = $conn->query($sql);
    return $result->fetch_assoc();

    // 3. Procesar el formulario cuando se envía (método POST)
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $fecha_nacimiento = $_POST['fecha_nacimiento'];
        $edad = $_POST['edad'];
        $rol = $_POST['rol'];
        $fecha_inicio_labores = $_POST['fecha_inicio_labores'];
        $telefono = $_POST['telefono'];

        // 4. Actualizar los datos en la base de datos
        $sql = "UPDATE usuarios SET 
            nombre = '$nombre',
            fecha_nacimiento = '$fecha_nacimiento',
            edad = $edad,
            rol = '$rol',
            fecha_inicio_labores = '$fecha_inicio_labores',
            telefono = '$telefono'
            WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: index.php'); // Redirigir al listado
            exit;
        } else {
            echo "Error al actualizar: " . $conn->error;
        }
    }

}

?>
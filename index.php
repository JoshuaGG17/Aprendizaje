<?php
include 'database.php'; // Incluir la conexión a la base de datos

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Usuarios</h1>
        <a href="crear.php" class="btn btn-primary mb-3">Crear Nuevo Usuario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nombre']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['telefono']}</td>
                                <td>
                                    <a href='editar.php?id={$row['id']}' class='btn btn-warning btn-sm'>Editar</a>
                                    <a href='eliminar.php?id={$row['id']}' class='btn btn-danger btn-sm'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No hay usuarios registrados</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
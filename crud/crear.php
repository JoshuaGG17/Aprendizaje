<?php
include 'database.php';

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Crear Nuevo Usuario</h1>
        <form method="POST" onsubmit="calcularEdad()">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required onchange="calcularEdad()">
            </div>

            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" readonly>
            </div>

            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="">Seleccione...</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Empleado">Empleado</option>
                    <option value="Cliente">Cliente</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="fecha_inicio_labores" class="form-label">Fecha de inicio de labores</label>
                <input type="date" class="form-control" id="fecha_inicio_labores" name="fecha_inicio_labores">
            </div>

            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script>
        function calcularEdad() {
            const fechaNacimiento = new Date(document.getElementById('fecha_nacimiento').value);
            const hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
            
            // Ajustar si aún no ha pasado el cumpleaños este año
            const mes = hoy.getMonth() - fechaNacimiento.getMonth();
            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }
            
            document.getElementById('edad').value = edad;
        }
    </script>
</body>
</html>
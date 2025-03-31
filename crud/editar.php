<?php
include 'database.php'; // Conexión a la base de datos

// 1. Obtener el ID del usuario a editar
$id = $_GET['id'];

// 2. Obtener los datos actuales del usuario
$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);
$usuario = $result->fetch_assoc();

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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Usuario</h1>
        <form method="POST" onsubmit="calcularEdad()">

            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre completo</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>" required>
            </div>

            <!-- Fecha de nacimiento -->
            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" 
                       value="<?= $usuario['fecha_nacimiento'] ?>" required onchange="calcularEdad()">
            </div>

            <!-- Edad  -->
            <div class="mb-3">
                <label for="edad" class="form-label">Edad</label>
                <input type="number" class="form-control" id="edad" name="edad" value="<?= $usuario['edad'] ?>" readonly>
            </div>

            <!-- Rol -->
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="Administrador" <?= $usuario['rol'] == 'Administrador' ? 'selected' : '' ?>>Administrador</option>
                    <option value="Empleado" <?= $usuario['rol'] == 'Empleado' ? 'selected' : '' ?>>Empleado</option>
                    <option value="Cliente" <?= $usuario['rol'] == 'Cliente' ? 'selected' : '' ?>>Cliente</option>
                </select>
            </div>

            <!-- Fecha de inicio de labores -->
            <div class="mb-3">
                <label for="fecha_inicio_labores" class="form-label">Fecha de inicio de labores</label>
                <input type="date" class="form-control" id="fecha_inicio_labores" name="fecha_inicio_labores" 
                       value="<?= $usuario['fecha_inicio_labores'] ?>">
            </div>

            <!-- Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?= $usuario['telefono'] ?>">
            </div>

            <!-- Botones -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </form>
    </div>

    <!-- Script para calcular la edad -->
    <script>
        function calcularEdad() {
            const fechaNacimiento = new Date(document.getElementById('fecha_nacimiento').value);
            const hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
            
            const mes = hoy.getMonth() - fechaNacimiento.getMonth();
            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }
            
            document.getElementById('edad').value = edad;
        }
    </script>
</body>
</html>
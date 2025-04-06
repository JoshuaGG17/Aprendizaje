<?php
include '../backend/function.php';
$usuario = editarDatos();


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
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $usuario['nombre'] ?>"
                    required>
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
                <input type="number" class="form-control" id="edad" name="edad" value="<?= $usuario['edad'] ?>"
                    readonly>
            </div>

            <!-- Rol -->
            <div class="mb-3">
                <label for="rol" class="form-label">Rol</label>
                <select class="form-select" id="rol" name="rol" required>
                    <option value="Administrador" <?= $usuario['rol'] == 'Administrador' ? 'selected' : '' ?>>Administrador
                    </option>
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
                <input type="text" class="form-control" id="telefono" name="telefono"
                    value="<?= $usuario['telefono'] ?>">
            </div>

            <!-- Botones -->
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-secondary">Regresar</a>
        </form>
    </div>

    <script src="../backend/function.js"></script>
    <script>
        window.calcularEdad = calcularEdad;
    </script>
</body>

</html>
<?php
require_once("../backend/function.php");
$result = traerDatos();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <header class="mb-4 container-fluid bg-success">
        <div class="row">
            <div class="col">
                <h1 class="text-center">CRUD PHP</h1>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="row">
            <aside class="border col-lg-3 me-5 p-0">
                <div class="text-center">
                    <h1 class="bg-success text-white">Hola mundo aside</h1>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Menu desplegable</button>
                    <ul class="dropdown-menu">
                        <li><a href="#" class="dropdown-item">item 1</a></li>
                    </ul>
                </div>

            </aside>

            <div class="col">
                <div class="row">
                    <div class="col text-center border-bottom mb-3 border-dark">
                        <h1>Lista de Usuarios</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-start">
                        <a href="crear.php" class="btn btn-primary mb-3">Crear Nuevo Usuario</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle table-striped table-hover">
                        <thead>
                            <tr class="">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Rol</th>
                                <th>Teléfono</th>
                                <th>Registro</th>
                                <th>Inicio Labores</th>
                                <th>Estatus</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php while ($row = $result->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['nombre'] ?></td>
                                    <td><?= $row['edad'] ?> años</td>
                                    <td><?= $row['rol'] ?></td>
                                    <td><?= $row['telefono'] ?></td>
                                    <td><?= $row['fecha_registro'] ?></td>
                                    <td><?= $row['fecha_inicio_labores'] ?></td>
                                    <td>
                                        <span class="badge bg-success rounded-pill d-inline">active</span>
                                    </td>
                                    <td>
                                        <a href="editar.php?id=<?= $row['id'] ?>"
                                            class="btn btn-warning btn-sm mb-1 mb-lg-0"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                            </svg></a>
                                        <a href="eliminar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                                                class="bi bi-trash" viewBox="0 0 16 16">
                                                <path
                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                <path
                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                            </svg></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <i class="bi bi-trash"></i>
                </div>


            </div>
        </div>

    </main>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


</html>
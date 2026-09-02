<?php

session_start();

if (
    !isset($_SESSION["usuario_id"])
    || !isset($_SESSION["rol"]) || $_SESSION["rol"] !== "Administrador"
) {
    header("Location: index.php");
    exit;
}

$nombreUsuario = $_SESSION["nombre"];
$idUsuario = $_SESSION["usuario_id"];
$rolUsuario = $_SESSION["rol"];

require_once 'db.php';

$nombreUsuario = $_SESSION["nombre"];

$sql = 'SELECT * FROM ubicacion WHERE activo = 1';
$ubicaciones = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubicaciones | SGRSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SGRSI &middot; Gestión de Ubicaciones - Hola: <?= $nombreUsuario ?></span>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php">Cerrar sesión</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h3 mb-0">Listado de ubicaciones</h1>
            <a href="formUbicacion.php" class="btn btn-primary">Crear ubicación</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Lugar</th>
                                <th>Comentario</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- así se usa este bucle de php dentro del html -->
                            <?php foreach ($ubicaciones as $ubicacion): ?>
                                <tr>
                                    <td><?= $ubicacion['ubicacion_id'] ?></td>
                                    <td><?= $ubicacion['lugar'] ?></td>
                                    <td><?= $ubicacion['comentario'] ?></td>
                                    <td class="text-end">
                                        <a href="formUbicacion.php?id=<?= $ubicacion['ubicacion_id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                        <a href="borrarUbicacion.php?id=<?= $ubicacion['ubicacion_id'] ?>" class="btn btn-sm btn-outline-danger">Borrar</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
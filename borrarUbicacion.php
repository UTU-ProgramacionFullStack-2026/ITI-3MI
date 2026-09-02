<?php
session_start();
$nombreUsuario = $_SESSION["nombre"];

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $idUbicacion = $_GET['id'];
    $sql = "UPDATE ubicacion SET activo = 0
    WHERE ubicacion_id = $idUbicacion";

    $borrado = $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar ubicación | SGRSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SGRSI &middot; Gestión de Ubicaciones - Hola: <?= $nombreUsuario ?></span>
            <a href="ubicaciones.php" class="btn btn-secondary">Volver al listado</a>
            <?php if (isset($_SESSION['usuario_id'])): ?>
                <a href="logout.php">Cerrar sesión</a>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h1 class="h3 mb-3">Eliminar ubicación</h1>

                <div class="alert alert-warning">La ubicación fue eliminada.</div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header">Consulta SQL ejecutada</div>
                    <div class="card-body">
                        <pre class="mb-0"><?= $sql ?></pre>
                    </div>
                </div>

                <a href="ubicaciones.php" class="btn btn-secondary">Volver al listado</a>
            </div>
        </div>
    </div>
</body>

</html>
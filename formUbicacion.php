<?php
require_once 'db.php';

$idUbicacion = null;
$lugar = null;
$comentario = null;
$sql = null;
$mensaje = null;


//GET -> viene la información en "query parameters",
//dentro de la URL
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    //si en la url viene un id... (ejemplo: url?id=88)
    //quiere decir que quiero EDITAR un registro
    if (isset($_GET['id'])) {
        $idUbicacion = $_GET['id'];

        //levanto el registro a ser editado
        $sql = "SELECT * FROM ubicacion WHERE ubicacion_id = $idUbicacion";
        $resultado = $conexion->query($sql);
        $ubicacion = $resultado->fetch_assoc();
        $lugar = $ubicacion['lugar'];
        $comentario = $ubicacion['comentario'];
    }

    //si la información viene por POST,
    //probablemente la mandé desde un formulario
    //DESDE ESTA MISMA PÁGINA (fijarse abajo en el <form>)
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //si en el formulario viene un id_ubicacion,
    //quiere decir que estoy EDITANDO un registro existente
    if (!empty($_POST['id_ubicacion'])) {
        $lugar = $_POST['lugar'];
        $comentario = $_POST['comentario'];
        $idUbicacion = $_POST['id_ubicacion'];

        $sql = "UPDATE ubicacion
            SET lugar = '$lugar', comentario = '$comentario'
            WHERE ubicacion_id = $idUbicacion";

        $conexion->query($sql);
        $mensaje = 'La ubicación fue actualizada.';
    } else {
        //si entro aquí, no estoy editando si no
        //creando un registro NUEVO
        $lugar = $_POST['lugar'];
        $comentario = $_POST['comentario'];

        $sql = "INSERT INTO ubicacion (lugar, comentario)
                VALUES ('$lugar', '$comentario')";

        $conexion->query($sql);
        $mensaje = 'La ubicación fue creada.';
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ubicación | SGRSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SGRSI &middot; Gestión de Ubicaciones</span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <h1 class="h3 mb-3">Formulario de edición de ubicación</h1>

                <!-- así se usa el if de php dentro del html -->
                <?php if ($mensaje !== null): ?>
                    <div class="alert alert-success"><?= $mensaje ?></div>
                <?php endif; ?>
                <!-- -->

                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="lugar" class="form-label">Lugar:</label>
                                <input id="lugar" type="text" name="lugar" value="<?= $lugar ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="comentario" class="form-label">Comentario:</label>
                                <input id="comentario" type="text" name="comentario" value="<?= $comentario ?>" class="form-control">
                            </div>

                            <input type="hidden" name="id_ubicacion" value="<?= $idUbicacion ?>">

                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-header">Consulta SQL ejecutada</div>
                    <div class="card-body">
                        <pre class="mb-0"><?= $sql ?></pre>
                    </div>
                </div>

                <a href="index.php" class="btn btn-secondary">Volver al listado</a>
            </div>
        </div>
    </div>
</body>

</html>
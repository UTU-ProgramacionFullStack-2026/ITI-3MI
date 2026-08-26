<?php

require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $clave = $_POST['clave'];

    $sql = "SELECT * FROM usuario WHERE email = '$email';";

    $resultado = $conexion->query($sql);
    $datosUsuario = $resultado->fetch_assoc();


    if (password_verify($clave, $datosUsuario['password_hash'])) {
        session_start();
        $_SESSION['nombre'] = $datosUsuario['nombre'];
        $_SESSION['email'] = $datosUsuario['email'];
        $rolId = $datosUsuario['rol_id'];

        $sqlRol = "SELECT * FROM rol WHERE rol_id = '$rolId';";
        $resultadoRol = $conexion->query($sqlRol);
        $datosRol = $resultadoRol->fetch_assoc();
        $rol = $datosRol['nombre'];

        echo 'el rol es> ' . $rol;
        $_SESSION['rol'] = $rol;

        header("Location: ubicaciones.php");

        exit;
    } else {
        echo "usuario incorrecto";
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | SGRSI</title>
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
            <div class="col-lg-5">
                <h1 class="h3 mb-3 text-center">Bienvenida/o</h1>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="clave" class="form-label">Clave:</label>
                                <input id="clave" type="password" name="clave" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
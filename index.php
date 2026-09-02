<?php
session_start();

require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuario WHERE email = '$email'";
    $resultado = $conexion->execute_query($sql);
    $datosUsuario = $resultado->fetch_assoc();

    if ($datosUsuario) {

        // Encontramos el usuario.
        // Ahora verificamos su contraseña.

        $nombreUsuario = $datosUsuario['nombre'];
        $hashUsuario = $datosUsuario['password_hash'];
        $rolUsuario = $datosUsuario['rol_id'];

        $passwordVerificado = password_verify($password, $hashUsuario);

        if ($passwordVerificado) {

            $_SESSION["usuario_id"] = $datosUsuario["usuario_id"];
            $_SESSION["nombre"] = $datosUsuario["nombre"];
            $_SESSION["rol_id"] = $datosUsuario["rol_id"];

            //de que rol se trata?
            $sqlRoles = "SELECT * FROM rol";
            $resultadoRoles = $conexion->query($sqlRoles);
            $rolUsuario = null;
            foreach ($resultadoRoles as $res) {
                if ($res['rol_id'] == $datosUsuario["rol_id"]) {
                    $rolUsuario = $res['nombre'];
                    $_SESSION["rol"] = $rolUsuario;
                }
            }

            header("Location: ubicaciones.php");
            exit;
        }
    } else {

        echo "Usuario no encontrado";
    }
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | SGRSI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">SGRSI &middot; Login</span>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <h1 class="h3 mb-3">Bienvenido</h1>

                <div class="card shadow-sm">
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Usuario:</label>
                                <input id="email" type="text" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Clave:</label>
                                <input id="password" type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
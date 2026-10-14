<?php

require_once("../negocio/Prestamo.php");
require_once("../datos/PrestamoRepositorio.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $prestamo = new Prestamo(
        $_POST["estado"],
        $_POST["equipo"]
    );

    $repo = new PrestamoRepositorio($prestamo);
    $repo->guardarPrestamo($prestamo);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Crear prestamo</h1>

    <form method="POST">

        <label for="equipo">Equipo:</label>
        <input type="text" name="equipo">

        <br />
        <label for="estado">Estado:</label>
        <input type="text" name="estado">

        <input type="submit" value="Enviar">
    </form>

</body>

</html>
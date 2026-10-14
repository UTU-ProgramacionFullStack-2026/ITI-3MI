<?php
$servidor = 'localhost';
$baseDatos = 'sgrsi_testing';
$usuario = 'root';
$contrasena = '';

$conexion = new mysqli($servidor, $usuario, $contrasena, $baseDatos);

if ($conexion->connect_error) {
    die('No se pudo conectar a la base de datos: ' . $conexion->connect_error);
}

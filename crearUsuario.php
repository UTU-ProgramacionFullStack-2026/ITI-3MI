<?php

require_once('Usuario.php');

$nuevoUsuario = new Usuario(133, 'Jurgen', 'Villar', 'jurgen@gmail.com');
$nuevoUsuario2 = new Usuario(133, 'Isaac', 'López', 'isaac@gmail.com');

echo $nuevoUsuario->decirNombre();
echo "<br />";
echo $nuevoUsuario2->decirNombre();

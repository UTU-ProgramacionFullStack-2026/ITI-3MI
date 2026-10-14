<?php

require_once('./Animal.php');
require_once('./Gato.php');
require_once('./Perro.php');
require_once('./Vaca.php');
require_once('./Gallina.php');

echo "Animales";

$gato = new Gato("Maya");
$perro = new Perro("Morena");
$vaca = new Vaca("Fausto");
$gallina = new Gallina("Tomasa");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animales</title>
</head>

<body>
    <h1>Animales</h1>

    <p>Lista de animales</p>

    <p><?= $gato->getNombre() . " dice: " . $gato->hacerRuido() ?></p>
    <p><?= $perro->getNombre() . " dice: " . $perro->hacerRuido() ?></p>
    <p><?= $vaca->getNombre() . " dice: " . $vaca->hacerRuido() ?></p>
    <p><?= $gallina->getNombre() . " dice: " . $gallina->hacerRuido() ?></p>
    <p><?= "Y además: " . $gallina->ponerHuevo() ?></p>
</body>

</html>
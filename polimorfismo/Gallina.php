<?php

require_once('./IPonerHuevos.php');
class Gallina extends Animal implements IPonerHuevos
{
    #[Override]
    public function hacerRuido()
    {
        return "co co roco";
    }

    #[Override]
    public function ponerHuevo()
    {
        return "Puse un huevo!";
    }
}

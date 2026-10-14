<?php

abstract class Animal
{
    private string $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    abstract public function hacerRuido();
}

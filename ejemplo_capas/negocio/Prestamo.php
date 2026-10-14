<?php

class Prestamo
{
    private $estado;
    private $equipo;

    public function __construct($estado, $equipo)
    {
        $this->estado = $estado;
        $this->equipo = $equipo;
    }

    public function prestamoEstado()
    {
        return "estado> " . $this->estado . " equipo> " . $this->equipo;
    }
}

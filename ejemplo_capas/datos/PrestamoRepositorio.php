<?php
require_once("../negocio/Prestamo.php");

class PrestamoRepositorio
{

    public function guardarPrestamo(Prestamo $prestamo)
    {
        echo "Mi prestamo fue guardado " . $prestamo->prestamoEstado();
    }
}

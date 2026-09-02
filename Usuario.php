<?php

class Usuario
{
    private $usuario_id;
    public $nombre;
    public $apellido;
    public $email;

    public function __construct($id, $nombre, $apellido, $email)
    {
        $this->usuario_id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->usuario_id;
    }

    public function setId($id)
    {
        $this->usuario_id = $id;
    }

    public function decirNombre()
    {
        return $this->nombre . " " . $this->apellido;
    }
}

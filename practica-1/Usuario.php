<?php

class Usuario
{
    // Atributos privados (encapsulamiento)
    private $nombre;
    private $correo;

    /**
     * Constructor de la clase
     */
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Método para obtener el nombre
    public function getNombre(): mixed
    {
        return $this->nombre;
    }

    // Método para obtener el correo
    public function getCorreo(): mixed
    {
        return $this->correo;
    }

    // Método para modificar el nombre
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    // Método para modificar el correo
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }
}
<?php

// Clase base Usuario
// Esta clase representa un usuario general del sistema
class Usuario
{
    // Atributos protegidos para permitir herencia
    protected $nombre;
    protected $correo;

    // Constructor que inicializa los atributos
    public function __construct($nombre, $correo)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Método para obtener el nombre del usuario
    public function getNombre(): mixed
    {
        return $this->nombre;
    }

    // Método para obtener el correo del usuario
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
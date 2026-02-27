<?php

require_once __DIR__ . "/Usuario.php";

/**
 * Clase Alumno
 * Hereda de Usuario y agrega matrícula
 */
class Alumno extends Usuario
{
    private string $matricula;

    /**
     * Constructor del Alumno
     * Se reutiliza el constructor del padre
     */
    public function __construct(string $nombre, string $correo, string $matricula)
    {
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    // Getter de matrícula
    public function getMatricula(): string
    {
        return $this->matricula;
    }

    // Método polimórfico
    public function getRol(): string
    {
        return "Alumno";
    }
}
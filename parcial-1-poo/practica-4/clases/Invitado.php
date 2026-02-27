<?php

require_once __DIR__ . "/Usuario.php";

/**
 * Clase Invitado
 * Hereda de Usuario y agrega empresa
 */
class Invitado extends Usuario
{
    private string $empresa;

    /**
     * Constructor del Invitado
     */
    public function __construct(string $nombre, string $correo, string $empresa)
    {
        parent::__construct($nombre, $correo);
        $this->empresa = $empresa;
    }

    // Getter de empresa
    public function getEmpresa(): string
    {
        return $this->empresa;
    }

    // Método polimórfico
    public function getRol(): string
    {
        return "Invitado";
    }
}
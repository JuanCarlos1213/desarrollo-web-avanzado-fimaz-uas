<?php

require_once __DIR__ . "/Usuario.php";

/**
 * Clase Admin
 * Hereda de Usuario
 */
class Admin extends Usuario
{
    /**
     * Devuelve el rol del usuario
     */
    public function getRol(): string
    {
        return "Administrador";
    }
}
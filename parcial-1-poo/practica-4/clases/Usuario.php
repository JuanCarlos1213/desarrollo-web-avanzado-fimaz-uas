<?php

/**
 * Clase base Usuario
 * Esta clase representa un usuario general del sistema.
 * Contiene validación de correo y encapsulamiento.
 */
class Usuario
{
    // Atributos protegidos para permitir herencia
    protected string $nombre;
    protected string $correo;

    /**
     * Constructor de la clase Usuario
     * Valida que el correo tenga formato correcto.
     */
    public function __construct(string $nombre, string $correo)
    {
        $this->nombre = $nombre;

        // Validación de correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: " . $correo);
        }

        $this->correo = $correo;
    }

    // Getter para nombre
    public function getNombre(): string
    {
        return $this->nombre;
    }

    // Getter para correo
    public function getCorreo(): string
    {
        return $this->correo;
    }
}
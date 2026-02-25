<?php
// Clase base Usuario: contiene atributos comunes y validación de correo
class Usuario {
    protected $nombre;
    protected $correo;

    // Constructor: recibe nombre y correo, valida el correo
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        if ($this->validarCorreo(correo: $correo)) {
            $this->correo = $correo;
        } else {
            // Si el correo no es válido, lanza una excepción
            throw new Exception(message: "Correo inválido: $correo");
        }
    }

    // Método privado para validar formato de correo
    private function validarCorreo($correo): mixed {
        return filter_var(value: $correo, filter: FILTER_VALIDATE_EMAIL);
    }

    // Métodos getters
    public function getNombre(): mixed {
        return $this->nombre;
    }

    public function getCorreo(): mixed {
        return $this->correo;
    }

    // Rol  por defecto
    public function getRol(): string {
        return "Usuario";
    }
}
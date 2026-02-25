<?php
// Clase Alumno: hereda de Usuario y añade atributo matrícula
require_once "Usuario.php";

class Alumno extends Usuario {
    private $matricula;

    // Constructor: recibe nombre, correo y matrícula
    public function __construct($nombre, $correo, $matricula) {
        // Llama al constructor de Usuario para validar correo
        parent::__construct(nombre: $nombre, correo: $correo);
        $this->matricula = $matricula;
    }

    // Getter para matrícula
    public function getMatricula(): mixed {
        return $this->matricula;
    }

    // Sobrescribe el método getRol para devolver "Alumno"
    public function getRol(): string {
        return "Alumno";
    }
}
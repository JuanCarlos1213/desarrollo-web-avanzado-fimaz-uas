<?php
// Clase Admin: hereda de Usuario
require_once "Usuario.php";

class Admin extends Usuario {
    // Sobrescribe el método getRol para devolver "Administrador"
    public function getRol(): string {
        return "Administrador";
    }
}
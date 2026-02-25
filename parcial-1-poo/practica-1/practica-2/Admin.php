<?php

// Se incluye la clase base Usuario
require_once 'Usuario.php';

// Clase Admin que hereda de Usuario
// Esto permite reutilizar los atributos y métodos
class Admin extends Usuario
{
    // Método propio de la clase Admin
    // Retorna el rol del usuario
    public function getRol()
    {
        return "Administrador";
    }
}
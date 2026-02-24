<?php

// Incluir la clase Usuario
require_once 'Usuario.php';

// Crear una instancia de la clase Usuario
$usuario = new Usuario(nombre: "Juan Carlos", correo: "juan@email.com");

// Mostrar los datos usando los métodos getters
echo "<h2>Datos del Usuario</h2>";
echo "<p><strong>Nombre:</strong> " . $usuario->getNombre() . "</p>";
echo "<p><strong>Correo:</strong> " . $usuario->getCorreo() . "</p>";
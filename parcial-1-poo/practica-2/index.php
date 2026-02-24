<?php

// Se incluye la clase Admin
require_once 'Admin.php';

// Se crea un objeto de tipo Admin
// Hereda nombre y correo desde Usuario
$admin = new Admin("Juan Carlos", "admin@email.com");

// Se muestran los datos en pantalla
echo "<h2>Datos del Administrador</h2>";

// Uso de métodos heredados
echo "<p><strong>Nombre:</strong> " . $admin->getNombre() . "</p>";
echo "<p><strong>Correo:</strong> " . $admin->getCorreo() . "</p>";

// Uso del método propio de la clase Admin
echo "<p><strong>Rol:</strong> " . $admin->getRol() . "</p>";
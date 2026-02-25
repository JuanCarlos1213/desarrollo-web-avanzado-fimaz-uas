<?php
// Archivo principal: prueba la creación de usuarios y manejo de excepciones
require_once "clases/Admin.php";
require_once "clases/Alumno.php";

echo "<h2>Prueba de sistema de usuarios</h2>";

try {
    // Crear un administrador válido
    $admin = new Admin("Juan Carlos", "carlos.admin@uas.edu.mx");
    echo "Usuario: " . $admin->getNombre() . " - Rol: " . $admin->getRol() . "<br>";

    // Crear un alumno válido
    $alumno = new Alumno("Juan Carlos", "juan.alumno@uas.edu.mx", "2028591");
    echo "Usuario: " . $alumno->getNombre() . " - Rol: " . $alumno->getRol() . " - Matrícula: " . $alumno->getMatricula() . "<br>";

    // Intentar crear un alumno con correo inválido (provoca excepción)
    $invalido = new Alumno("Pedro", "correo_invalido", "2029002");
} catch (Exception $e) {
    // Captura y muestra el error controlado
    echo "Error capturado: " . $e->getMessage() . "<br>";
}
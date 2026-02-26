<?php

require_once __DIR__ . "/clases/Admin.php";
require_once __DIR__ . "/clases/Alumno.php";
require_once __DIR__ . "/clases/Invitado.php";

$usuarios = [];
$error = null;

// Usamos try/catch para controlar errores
try {

    // Usuario administrador válido
    $admin = new Admin("Carlos Ramírez", "admin@universidad.mx");
    $usuarios[] = $admin;

    // Alumno válido
    $alumno = new Alumno("María López", "maria.lopez@alumnos.mx", "A20231234");
    $usuarios[] = $alumno;

    // Invitado válido
    $invitado = new Invitado("Roberto Sánchez", "roberto@empresa.com", "Tech Solutions");
    $usuarios[] = $invitado;

    // Usuario con correo inválido (debe lanzar excepción)
    $usuarioInvalido = new Alumno("Error Usuario", "correo-mal-escrito", "A00000000");
    $usuarios[] = $usuarioInvalido;

} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<h2 style="text-align:center;">Lista de Usuarios</h2>

<table border="1" style="border-collapse: collapse; width:80%; margin:20px auto; text-align:center;">
    
    <tr style="background-color:#f2f2f2;">
        <th>Nombre</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Matrícula</th>
        <th>Empresa</th>
    </tr>

    <tr>
        <td>Carlos Ramírez</td>
        <td>admin@universidad.mx</td>
        <td>Administrador</td>
        <td>—</td>
        <td>—</td>
    </tr>

    <tr>
        <td>María López</td>
        <td>maria.lopez@alumnos.mx</td>
        <td>Alumno</td>
        <td>A20231234</td>
        <td>—</td>
    </tr>

    <tr>
        <td>Roberto Sánchez</td>
        <td>roberto@empresa.com</td>
        <td>Invitado</td>
        <td>—</td>
        <td>Tech Solutions</td>
    </tr>

</table>

<p style="color:red; text-align:center; font-weight:bold;">
    Error controlado: Correo inválido: correo-mal-escrito
</p>
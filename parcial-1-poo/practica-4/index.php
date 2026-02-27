<?php

require_once __DIR__ . "/clases/Admin.php";
require_once __DIR__ . "/clases/Alumno.php";
require_once __DIR__ . "/clases/Invitado.php";

$usuarios = [];
$error = null;

try {

    $admin = new Admin("Carlos Ramírez", "admin@universidad.mx");
    $usuarios[] = $admin;

    $alumno = new Alumno("María López", "maria.lopez@alumnos.mx", "A20231234");
    $usuarios[] = $alumno;

    $invitado = new Invitado("Roberto Sánchez", "roberto@empresa.com", "Tech Solutions");
    $usuarios[] = $invitado;

    // Este debe lanzar excepción
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

    <?php foreach ($usuarios as $usuario): ?>
        <tr>
            <td><?= $usuario->getNombre(); ?></td>
            <td><?= $usuario->getCorreo(); ?></td>
            <td><?= $usuario->getRol(); ?></td>

            <td>
                <?= method_exists($usuario, 'getMatricula') ? $usuario->getMatricula() : '—'; ?>
            </td>

            <td>
                <?= method_exists($usuario, 'getEmpresa') ? $usuario->getEmpresa() : '—'; ?>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<?php if ($error): ?>
    <p style="color:red; text-align:center; font-weight:bold;">
        Error controlado: <?= $error ?>
    </p>
<?php endif; ?>

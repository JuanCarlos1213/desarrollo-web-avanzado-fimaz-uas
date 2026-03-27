<?php
spl_autoload_register(function ($clase) {
    $ruta = __DIR__ . "/" . str_replace("\\", "/", $clase) . ".php";

    if (file_exists($ruta)) {
        require_once $ruta;
    } else {
        die("No se pudo cargar la clase: " . $clase);
    }
});

use Controllers\ProductoController;
use Models\Producto;

$controller = new ProductoController();
$productoEditar = null;

// Eliminar
if (isset($_GET['eliminar'])) {
    $controller->eliminar($_GET['eliminar']);
    header("Location: index.php");
    exit;
}

// Editar
if (isset($_GET['editar'])) {
    $productoEditar = $controller->obtenerPorId($_GET['editar']);
}

// Guardar / Actualizar
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'] ?? null;
    $nombre = trim($_POST['nombre']);
    $descripcion = trim($_POST['descripcion']);
    $existencia = (int) $_POST['existencia'];
    $precio = (float) $_POST['precio'];

    $producto = new Producto($id, $nombre, $descripcion, $existencia, $precio);

    if ($id) {
        $controller->actualizar($producto);
    } else {
        $controller->crear($producto);
    }

    header("Location: index.php");
    exit;
}

// Listar productos
$productos = $controller->listar();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos con PHP, PDO y POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

    <?php if (!empty($mensaje)) : ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($mensaje); ?>
        </div>
    <?php endif; ?>

    <!-- Formulario -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <?= $productoEditar ? "Editar producto" : "Agregar producto"; ?>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $productoEditar['id'] ?? '' ?>">

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?= $productoEditar['nombre'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" name="descripcion" class="form-control"
                               value="<?= $productoEditar['descripcion'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Existencia</label>
                        <input type="number" name="existencia" class="form-control"
                               value="<?= $productoEditar['existencia'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-2 mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" name="precio" class="form-control"
                               value="<?= $productoEditar['precio'] ?? '' ?>" required>
                    </div>

                    <div class="col-md-2 mb-3 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">
                            <?= $productoEditar ? "Actualizar" : "Guardar"; ?>
                        </button>
                    </div>
                </div>

                <?php if ($productoEditar) : ?>
                    <a href="index.php" class="btn btn-secondary">Cancelar edición</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <!-- Tabla -->
    <div class="card">
        <div class="card-header bg-dark text-white">Lista de productos</div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-secondary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Existencia</th>
                    <th>Precio</th>
                    <th width="180">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($productos) > 0): ?>
                    <?php foreach ($productos as $producto): ?>
                        <tr>
                            <td><?= htmlspecialchars($producto['id']); ?></td>
                            <td><?= htmlspecialchars($producto['nombre']); ?></td>
                            <td><?= htmlspecialchars($producto['descripcion']); ?></td>
                            <td><?= htmlspecialchars($producto['existencia']); ?></td>
                            <td>$<?= number_format($producto['precio'], 2); ?></td>
                            <td>
                                <a href="index.php?editar=<?= $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="index.php?eliminar=<?= $producto['id']; ?>" class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay productos registrados.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</body>
</html>
<?php
namespace Controllers;

use Config\Database;
use Models\Producto;

class ProductoController {
    private $connection;

    public function __construct() {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio)
                VALUES (:nombre, :descripcion, :existencia, :precio)";
        
        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':existencia' => $producto->getExistencia(),
            ':precio' => $producto->getPrecio()
        ]);
    }

    public function listar() {
        return $this->connection
            ->query("SELECT * FROM productos ORDER BY id DESC")
            ->fetchAll();
    }

    public function obtenerPorId($id) {
        $stmt = $this->connection->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos 
                SET nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            ':id' => $producto->getId(),
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':existencia' => $producto->getExistencia(),
            ':precio' => $producto->getPrecio()
        ]);
    }

    public function eliminar($id) {
        $stmt = $this->connection->prepare("DELETE FROM productos WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}
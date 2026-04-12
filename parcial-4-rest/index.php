<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'config/database.php';
require_once 'models/FutbolistaModel.php';
require_once 'controllers/FutbolistaController.php';

$database = new Database();
$db = $database->getConnection();
$controller = new FutbolistaController($db);

$request_method = $_SERVER["REQUEST_METHOD"];

//  obtener endpoint e id por GET
$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : null;
$id = isset($_GET['id']) ? $_GET['id'] : null;

try {

    if ($endpoint != "futbolistas") {
        $controller->enviarRespuesta(404, ["mensaje" => "Endpoint no encontrado"]);
        exit;
    }

    switch($request_method) {

        case 'GET':
            if($id != null) {
                $controller->obtenerPorId($id);
            } else {
                $controller->obtenerTodos();
            }
            break;

        case 'POST':
            $controller->crear();
            break;

        case 'PUT':
            if($id != null) {
                $controller->actualizar($id);
            } else {
                $controller->enviarRespuesta(400, ["mensaje" => "ID no proporcionado"]);
            }
            break;

        case 'DELETE':
            if($id != null) {
                $controller->eliminar($id);
            } else {
                $controller->enviarRespuesta(400, ["mensaje" => "ID no proporcionado"]);
            }
            break;

        default:
            $controller->enviarRespuesta(405, ["mensaje" => "Metodo no permitido"]);
            break;
    }

} catch(Exception $e) {
    $controller->enviarRespuesta(500, [
        "mensaje" => "Error interno del servidor",
        "error" => $e->getMessage()
    ]);
}
?>
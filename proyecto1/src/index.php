<?php
require_once "vendor/autoload.php";
require_once "funciones.php";

use Phroute\Phroute\RouteCollector;
use Phroute\Phroute\Dispatcher;

$router = new RouteCollector();

// WEB PÚBLICA
$router->get('/', function () {
    $titulo = "Inicio";
    $contenido = "Bienvenido a la web pública";
    include "vistas/public/template/head.php";
    include "vistas/public/template/header.php";
    include "vistas/public/template/aside.php";
    include "vistas/public/main.php";
    include "vistas/public/template/footer.php";
});

$router->get('/dni', function () {
    $numero = $_GET['numero'] ?? '';
    $resultado = $numero ? calcularLetraDNI($numero) : "Debes pasar ?numero=...";
    $titulo = "Calcular DNI";
    $contenido = "La letra para el DNI <strong>$numero</strong> es: <strong>$resultado</strong>";
    include "vistas/public/template/head.php";
    include "vistas/public/template/header.php";
    include "vistas/public/template/aside.php";
    include "vistas/public/main.php";
    include "vistas/public/template/footer.php";
});

$router->get('/password', function () {
    $length = $_GET['length'] ?? 8;
    $password = generatePassword((int)$length);
    $titulo = "Generar Contraseña";
    $contenido = "Contraseña generada: <strong>$password</strong>";
    include "vistas/public/template/head.php";
    include "vistas/public/template/header.php";
    include "vistas/public/template/aside.php";
    include "vistas/public/main.php";
    include "vistas/public/template/footer.php";
});

// PANEL ADMIN
$router->get('/administrador', function () {
    $titulo = "Panel Administrador";
    $contenido = "Bienvenido al panel de administración";
    include "vistas/admin/template/head.php";
    include "vistas/admin/template/header.php";
    include "vistas/admin/template/aside.php";
    include "vistas/admin/dashboard.php";
    include "vistas/admin/template/footer.php";
});

// Dispatcher
$dispatcher = new Dispatcher($router->getData());
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
echo $dispatcher->dispatch($method, $uri);

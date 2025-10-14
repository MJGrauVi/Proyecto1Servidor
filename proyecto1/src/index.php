<?php
require_once "vendor/autoload.php";
require_once "funciones.php";

//Rutas de Usuario



//Directiva para insertar o utilizar la clase RouteCollector
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;

//Instancia una variable de la clase RouteCollector.
$router = new RouteCollector();

//Define las rutas a la que va a responder mi aplicación web.
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
    $contenido = "<p>La letra para el DNI <strong>$numero</strong> es: <strong>$resultado</strong></p>";
    include "vistas/public/letraDni.php";
});


$router->get('/password', function () {
    $length = $_GET['length'] ?? 8;
    $password = generatePassword((int)$length);
    $titulo = "Generar Contraseña";
    $contenido = "Contraseña generada: <strong>$password</strong>";
    include_once('vistas/public/generarPassword.php');
});

$router->get('/addPelicula', function(){
    include_once "vistas/public/add-pelicula.php";
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
//mo
$router->get('/administracion/movie/create', function () {
    include_once "admin/views/add-pelicula.php";
});
$router->get('/administracion/movie/{$id}/edit', function ($id) {
    include_once "admin/views/edit-pelicula.php";
});


//Rutas de trabajo con peliculas
$router->post('/movie', function () {
    var_dump($_POST);
    var_dump($_FILES);

    mkdir(__DIR__ . "uploader");
});
$router->delete('/movie/{id}', function ($id) {
    //ruta para el borrado de una pelicula
});
$router->put('/movie/{$id}', function ($id) {
    //instrucciones para modificar un pelicula guardada.
});
$router->get('/movie', function () {
    //Devuelve los datos de todas las peliculas
});
$router->get('/movie/{id}', function ($id) {
    //Devuelve los datos de una pelicula
});

// Dispatcher
use Phroute\Phroute\Dispatcher;

$dispatcher = new Dispatcher($router->getData());
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
echo $dispatcher->dispatch($method, $uri);

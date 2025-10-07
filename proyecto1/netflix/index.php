<?php
include_once "vendor/autoload.php";
include_once "env.php";
include_once "auxiliar/funciones.php";

use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
//instancia una variable de la clase RouteCollector
$router = new RouteCollector();

// Rutas de la aplicación.
$router->get('/', function() {
    return 'Estoy en la página principal';
});
$router->get('/administrador', function() {
    include_once __DIR__ . "/admin/views/welcome.php";
});
/*$router->get('/administrador', function() {
    include_once DIRECTORIO_VISTAS_ADMINISTRACION . "welcome.php";
});*/

$router->get('/login', function() {
    include_once DIRECTORIO_VISTAS . "indice.php";
});
$router->post('/login',function(){
    var_dump($_POST);
});
$router->delete('/pelicula/{id:\d+}',function($id){
    echo "La pelicula a borrar tiene el id $id";
});

$router->get('/pass', function () {
    return "La contraseña es: " . generatePassword(8);
});

$router->get('/letradni', function () {
    if (isset($_GET['dni'])) {
        $dni = $_GET['dni'];
        $letra = calcularLetraDNI($dni);
        return "La letra correspondiente al número de DNI: {$dni} es:  {$letra}";
    } else {
        return "No se han introducido los números del DNI";
    }
});

/*$router->get('/pass', function () {
    echo "Se va a generar una contraña</br>";
    var_dump($_GET);

    if (isset($_GET['num1'])){
        echo generatePassword($_GET['num1']);
    }else{
        echo "Tienes que pasarme un parámetro llamado num1";
    }
});*/


// Dispatcher
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);

try {
    $response = $dispatcher->dispatch($method, $uri);
    echo $response;
} catch (HttpRouteNotFoundException $e) {
    include_once "views/404.php";
    exit;
}
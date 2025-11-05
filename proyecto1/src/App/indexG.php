<?php
require_once "vendor/autoload.php";
include_once "env.php";
require_once "funciones.php";

session_start();

//Directiva para insertar o utilizar la clase RouteCollector
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controllers\UserController;
use App\Model\UserModel;

//Instancia una variable de la clase RouteCollector.
$router = new RouteCollector();
//Rutas de Usuario APP/anterior
//$router->get('/login', ['App\Controllers\AuthController', 'mostrarLogin']);
//$router->post('/login', ['App\Controllers\AuthController', 'procesarLogin']);

//Rutas asocialdas a la vista de usuario
$router->get('/user', [UserController::class, 'index']);
$router->post('/user/', [UserController::class, 'store']);
$router->get('/login', [UserController::class, 'show_login']); //Muestra el formularioLogin
$router->post('/user/login', [UserController::class, 'verify']); //procesa el formularioLogin
$router->get('/registro', [UserController::class, 'show_registro']); // muestra el formularioRegistro
$router->post('/user/registro', [UserController::class, 'registroVerify']); // procesa el formularioRegistro
$router->get('/user/logout', [UserController::class, 'logout']); //Eliminar un ususario.
$router->get('/user/create/', [UserController::class, 'create']);
$router->put('/user', [UserController::class, 'destroy']);
$router->get('/user/{id}/edit/', [UserController::class, 'edit']);



// Dispatcher
use Phroute\Phroute\Dispatcher;

$dispatcher = new Dispatcher($router->getData());
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
echo $dispatcher->dispatch($method, $uri);

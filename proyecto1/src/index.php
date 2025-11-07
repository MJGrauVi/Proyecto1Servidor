<?php
require_once "vendor/autoload.php";
include_once "env.php";
require_once "funciones.php";

session_start();

//Directiva para insertar o utilizar la clase RouteCollector
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\RouteCollector;
use App\Controllers\UserController;
use App\Controllers\MovieController;
use App\Controllers\DirectorController;
use App\Model\UserModel;

//Instancia una variable de la clase RouteCollector.
$router = new RouteCollector();

$router->get('/', function ())
//Rutas de Usuario APP/anterior
//$router->get('/login', ['App\Controllers\AuthController', 'mostrarLogin']);
//$router->post('/login', ['App\Controllers\AuthController', 'procesarLogin']);


$router->filter('auth', function (){
    if(isset($_SESSION['user']->getUsername().'</br> Estoy en la página principal'{
}else{
        return false;
    }
};

//Definir los filtros de las rutas
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
$router->get('/user/{id}/edit/', [UserController::class, 'edit'],["before" => 'auth']);//Añadimos filtro.
//Rutas para la aplicacion web visual

//publicacion

$router->get('/publicacion', function () {
    $titulo = "Crear Publicacion";
    $contenido = "Creando.....";

    include_once "App/Views/frontend/add-publicacion.php";
});

$router->get('/user/publicacion', function () {
    return "Procesando publicacion";
});

//Rutas de Servicio  API REST
$router->get('/api/user', [UserController::class, 'index']);
$router->get('/api/user/create/', [UserController::class, 'create']);
$router->get('/api/user/{id}/edit/', [UserController::class, 'edit']);
$router->post('/api/user', [UserController::class, 'store']);
$router->put('/api/user', [UserController::class, 'destroy']);


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
//rutas movie

$router->get('/password', function () {
    $length = $_GET['length'] ?? 8;
    $password = generatePassword((int)$length);
    $titulo = "Generar Contraseña";
    $contenido = "Contraseña generada: <strong>$password</strong>";
    include_once('vistas/public/generarPassword.php');
});


//mo
$router->get('/administracion/movie/create', function () {
    include_once "admin/views/add-pelicula.php";
});
$router->get('/administracion/movie/{$id}/edit', function ($id) {
    include_once "admin/views/edit-pelicula.php";
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


//Rutas de trabajo con peliculas
$router->post('/movie', function () {
    var_dump($_POST);
    var_dump($_FILES);

    mkdir(__DIR__ . "uploader");
});
$router->delete('/movie/{id}', function ($id) {
    //ruta para el borrado de una pelicula
});


//$router->get('/movie', function () {
//Devuelve los datos de todas las peliculas
//});
//$router->get('/movie/{id}', function ($id) {
//Devuelve los datos de una pelicula
//});

// Dispatcher
use Phroute\Phroute\Dispatcher;

$dispatcher = new Dispatcher($router->getData());
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
echo $dispatcher->dispatch($method, $uri);

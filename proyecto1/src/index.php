<?php
require_once "vendor/autoload.php";
include_once "env.php";
require_once "funciones.php";

session_start();

//Directiva para insertar o utilizar la clase RouteCollector
use Phroute\Phroute\Exception\HttpRouteNotFoundException;
use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;
use App\Controllers\UserController;
use App\Model\UserModel;
use Ramsey\Uuid\Uuid;
use App\Class\User;

//Instancia una variable de la clase RouteCollector.
$router = new RouteCollector();

//Definir los filtros de las rutas.

//Si no estas logueado te redirige a la vista del login.
$router->filter('auth', function (){
    if(isset($_SESSION['user'])){
        return true;
    }else{
        header('Location: /login');
        return false;
    }
});

//Si estar registrado y eres de tipo usuarios permite el acceso sino redirige vista error.
$router->filter('admin', function(){
    if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin()){
        return true;
    }else{
        header('Location: /error');
        return false;
    }
});

$router->get('/error', function (){
    $error="No puedes accedes a este apartado";
    include_once "views/backend/errorNoAdmin.php";
});

//Función de inicio. Si hay usuario logueado
$router->get('/', function() {
    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user']->getUsername();
    } else {
        //return 'Hola invitado. <a href="/login">Inicia sesión</a>';
        $user = null;
    }
    include_once 'vistas/public/inicio.php';
});

//Rutas de Usuario CRUD
//Rutas asociadas a las vistas de usuario.
$router->get('/user/{id}/edit/', [UserController::class, 'edit'],["before" => 'auth']);//Añadimos filtro.
$router->get('/user/create/', [UserController::class, 'create']);
$router->get('/login', [UserController::class, 'show_login']); //Muestra el formularioLogin
$router->post('/user/login', [UserController::class, 'verify']); //ok procesa el formularioLogin
$router->get('/user/logout', [UserController::class, 'logout'],['before' =>'auth']); //Eliminar un ususario.

//Rutas para la aplicacion web visual
$router->get('/user', [UserController::class, 'index'],["before"=>'admin']);
$router->get('/user/{id}', [UserController::class, 'show'],["before"=>'auth']); // muestra el formularioRegistro
$router->post('/user', [UserController::class, 'store']);
$router->put('/user/{id}',[UserController::class,'update']);
$router->delete('/user/{id}', [UserController::class, 'destroy'],["before"=>'admin']);

//Rutas de Servicio API REST  ****ver *******
$router->get('/api/user',[UserController::class,'index']);
$router->get('/api/user/{id}',[UserController::class,'show']);
$router->post('/api/user',[UserController::class,'store']);
$router->put('/api/user/{id}',[UserController::class,'update']);
$router->delete('/api/user/{id}',[UserController::class,'destroy']);

//Rutas de Publicaciones CRUD
/*Rutas de servicio API REST

$router->get('/publicacion',[PublicacionController::class,'index']);
$router->get('/publicacion/{id}',[PublicacionController::class,'show']);
$router->post('/publicacion',[PublicacionController::class,'store']);
$router->put('/publicacion/{id}',[PublicacionController::class,'update']);
$router->delete('/publicacion/{id}',[PublicacionController::class,'destroy']);

//Rutas asociadas a las vistas de usuario
$router->get('/create-movie',[MovieController::class,'create']);
$router->get('/movie/{id}/edit',[MovieController::class,'edit']);
$router->get('/publicacion', function () {
    $titulo = "Crear Publicacion";
    include_once "App/Views/frontend/add-publicacion.php";
});

$router->get('/user/publicacion', function () {
    return "Procesando publicacion";
});
*/
$router->get('/post', function (){ //muestra el formulario para crear un pot.
    $titulo = "Añadir publicación";
    //include_once DIRECTORIO_VISTAS_BACKEND . "/add-publicacion.php";
    //include_once DIRECTORIO_VISTAS_BACKEND . "/publicacion.php";
    //include_once DIRECTORIO_VISTAS_BACKEND . "/main.php";

});


 //Muestra el formularioPublicacion
// Procesar datos enviados del formulario (POST)
$router->post('/publicacion', function () {
    // Depurar datos recibidos
    var_dump($_POST);
    var_dump($_FILES);
    $imgPost = scandir(__DIR__);
    VAR_DUMP($imgPost);
    if (!array_search('/uploaded', $imgPost)) {
        mkdir(__DIR__ . '/uploaded');
        move_uploaded_file($_FILES['imgPrincipal']['tmp_name'], __dir__ . '/uploaded/' . $_FILES['imgPrincipal']['name']);
    } else {
        move_uploaded_file($_FILES['imgPrincipal']['tmp_name'], __DIR__ . '/uploaded/' . $_FILES['imgPrincipal']['name']);
    }

    // Crear carpeta uploader si no existe
   // $uploadDir = __DIR__ . "/uploader";
   // if (!is_dir($uploadDir)) {
    //    mkdir($uploadDir, 0777, true);
  //  }
    // Aquí iría tu lógica de guardar archivos, base de datos, etc.
});


//Define las rutas a la que va a responder mi aplicación web.
// WEB PÚBLICA

/*
$router->get('/', function () {
   $titulo = "Inicio";
    $contenido = "Bienvenido a la web pública";
    include "vistas/public/template/head.php";
    include "vistas/public/template/header.php";
    include "vistas/public/template/aside.php";
    include "vistas/public/main.php";
    include "vistas/public/template/footer.php";
    include_once "vistas/public/inicio.php";
});
*/
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
/*use Phroute\Phroute\Dispatcher;

$dispatcher = new Dispatcher($router->getData());
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
echo $dispatcher->dispatch($method, $uri);*/

//Resolver la ruta que debemos cargar
/*$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

try{
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

}catch (HttpRouteNotFoundException $e){
    return include_once DIRECTORIO_VISTAS_BACKEND."error404.php";
}

// Print out the value returned from the dispatched function
echo $response;*/

/*********************************************************/
// Creamos el Dispatcher con todas las rutas registradas
$dispatcher = new Dispatcher($router->getData());

//Obtenemos métodos HTTP y URI, con valores por defecto por si no están definidos.
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);//Parse_url devuelve solo la parte de la ruta
//sin la query string /login?redirect=dashboard solo deboveria /login y tampoco el domnio.
try {
    // Intentamos despachar la ruta correspondiente
    // dispatch() ejecuta la función asociada a la ruta y devuelve su resultado
    echo $dispatcher->dispatch($method, $uri);

} catch (HttpRouteNotFoundException $e) {
    // Si la ruta no existe, mostramos la página de error 404
    include_once DIRECTORIO_VISTAS_BACKEND . "error404.php";
}
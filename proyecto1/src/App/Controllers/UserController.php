<?php

namespace App\Controllers;

use App\Class\User;
use App\Interface\ControllerInterface;
use App\Model\UserModel;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class UserController implements ControllerInterface
{

    function index() //El router Phroute instancia el controlador automáticamente en el index.php con "echo $dispatcher->dispatch($method, $uri);"
        //entonce no hace falta public static en la función index.
    {
        $usuarios = UserModel::getAllUsers();
        include_once __DIR__ . '/../Views/admin/allusers.php';
        /*header('Content-Type: application/json');
        echo Json_encode($usuarios);*/
    }

    function show($id)
    {
        return "Estos son los datos del usuario $id";
    }

    function store()
    {
        var_dump(User::validateUserCreation($_POST));
    }

    function update($id)
    {
        //Leo del fichero input los datos que me llegan de la peticion PUT.
        parse_str(file_get_contents("php://input"),$editData);

        //Añado el uuid a los datos que me han llegado en la peticion PUT.
        $editData['uuid']=$id;

        //Valido los datos que han llegado en la peticion PUT.
        $usuario = User::validateUserEdit($editData);

        //TODO Guardo en usuario actualizado en la BBDD.

        //Muestro los datos del usuario o los errores en la petición si los hay
        var_dump($usuario);
    }

    function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    function create()
    {
        return "formulario para crear usuario";
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }
    function verify(){  //Este método requiere que antes haya hecho session_start() sino lanza warning o no guarda la sesion.
        /*$_POST['username'];
        $_POST['password'];*/
     /*   if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }*/
        var_dump($_POST);

        //Si es correcto el login.
        $_SESSION['username']=$_POST['username'];
        var_dump($_SESSION);
    }
    
    function show_login(){
        /*include_once "App/Views/frontend/login.php";*/
        include_once __DIR__ . "/../Views/frontend/login.php"; //Cambio a ruta relativa al controlador.

    }
    function show_registro(){
        $contenido
        include_once "App/Views/frontend/registro.php";
    }
    function registro() {
        // 1️⃣ Iniciar sesión si no está iniciada (por si se usa más adelante)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // 2️⃣ Recoger los datos del formulario (por seguridad, con filtrado básico)
        $datos = filter_input_array(INPUT_POST, [
            'username' => FILTER_SANITIZE_STRING,
            'email' => FILTER_SANITIZE_EMAIL,
            'password' => FILTER_DEFAULT,
            'confirm_password' => FILTER_DEFAULT
        ]);

        // Evitar error si 'password' no está definido
        $password = $datos['password'] ?? '';

        // 3️⃣ Definir las reglas de validación
        $validator = v::key('username', v::alnum()->noWhitespace()->length(3, 20))
            ->key('email', v::email())
            ->key('password', v::length(6, 20))
            ->key('confirm_password', v::equals($password));

        try {
            // 4️⃣ Ejecutar la validación
            $validator->assert($datos);

            // 5️⃣ Si todo es válido, crear el usuario (modelo)
            $usuario = User::validateUserCreation($datos);

            // 6️⃣ (Opcional) Guardar el usuario en la base de datos
            // UserModel::insertUser($usuario);

            // 7️⃣ Mostrar respuesta o redirigir a login/éxito
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'ok',
                'message' => 'Usuario registrado correctamente',
                'usuario' => $usuario
            ]);

        } catch (NestedValidationException $e) {
            // 8️⃣ Mostrar los errores de validación de forma legible
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'Error en el formulario',
                'errores' => $e->getMessages()
            ]);
        } catch (Exception $e) {
            // 9️⃣ Capturar cualquier otro error (por ejemplo, al guardar en BBDD)
            header('Content-Type: application/json');
            echo json_encode([
                'status' => 'error',
                'message' => 'Error interno: ' . $e->getMessage()
            ]);
        }
    }

    /*function registro() {
    $datos = $_POST;

    $validator = v::key('username', v::alnum()->noWhitespace()->length(3, 20))
        ->key('email', v::email())
        ->key('password', v::length(6, 20))
        ->key('confirm_password', v::equals($datos['password']));

    try {
        $validator->assert($datos);
        $usuario = User::validateUserCreation($datos);
        var_dump($usuario);
    } catch (NestedValidationException $e) {
        echo "Error en el formulario:<br>";
        echo nl2br($e->getFullMessage());
        }
    }
    */
    function registroVerify(){  //Este método requiere que antes haya hecho session_start() sino lanza warning o no guarda la sesion.
        /*$_POST['username'];
        $_POST['password'];*/
        /*   if (session_status() === PHP_SESSION_NONE) {
               session_start();
           }*/
        var_dump($_POST);

        //Si es correcto el login.
        $_SESSION['username']=$_POST['username'];
        var_dump($_SESSION);
    }
}
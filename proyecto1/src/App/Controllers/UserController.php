<?php

namespace App\Controllers;

use App\Class\User;
use App\Enum\TipoUsuario;
use App\Interface\ControllerInterface;
use App\Model\UserModel;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class UserController implements ControllerInterface
{
    function index() //El router Phroute instancia el controlador automáticamente en el index.php con "echo $dispatcher->dispatch($method, $uri);"
    //entonce no hace falta public static en la función index.
    {

        if(isset($_SESSION['user']) && $_SESSION['user'] -> isAdmin ()){
            //Recuperar todos los usuarios de BBDD.

        $usuarios = UserModel::getAllUsers();
        //Llamar a la vista pera que muestre los usuarios.

        include_once DIRECTORIO_VISTAS_BACKEND . "User/allusers.php";

    }else{
            $_SESSION['mensaje'] = "Usuario creado correctamente.";
            header("Location: /login");
            exit;
           // $error = "No tiene permisos para acceder a esta pagina";
           // include_once DIRECTORIO_VISTAS_BACKEND . "vistas_user_creado.php";
        }
    }


        function show($id){
            if (isset($_SESSION['user'])){

                //tenemos un usuario logueado en el sistema
                $usuario=UserModel::getUserById($id);

                    //Si es administrador incluimos esta vista.
                    include_once DIRECTORIO_VISTAS_BACKEND . "User/mostrarUser.php";

            }
        }


        function store()
        {
            $resultado= User::validateUserCreation($_POST);//se pasan los datos del formulario y llama a validar.

            if(is_array($resultado)){
                //Tenemos datos con errores.
                //include_once DIRECTORIO_VISTAS_BACKEND." User/createUser.php";
               include_once DIRECTORIO_VISTAS_BACKEND . "User/registro.php";
            }else{
                //La validacion ha creado un usuario correcto y hay que guardarlo.
                $resultado->setPassword(password_hash($resultado->getPassword(),PASSWORD_DEFAULT));
                UserModel::saveUser($resultado);
                header('Location: /user');
           //     $_SESSION['user']=$resultado;//Guardo los datos del usuario en la sesión.

            }
        }


        function update($id)
        {
                //Leo del fichero input los datos que me llegan de la peticion PUT.
                $editData=json_decode(file_get_contents("php://input"), true);

               // var_dump($editData);

                //Añado el uuid a los datos que me han llegado en la peticion PUT.
                $editData['uuid'] = $id;

                //Valido los datos que han llegado en la peticion PUT.
                $usuario = User::validateUserEdit($editData);

                //TODO Guardo en usuario actualizado en la BBDD.
                UserModel::updateUser($usuario);
                //Muestro los datos del usuario o los errores en la petición si los hay
                //var_dump($usuario);
        }
    function destroy($id)
    {
        // TODO: Llamamos a la función del modelo que nos permite borrar a un usuario
    }
    function create()
    {
        //return "formulario para crear usuario";
        return include_once DIRECTORIO_VISTAS_BACKEND . "User/createUser.php";
    }

    function edit($id)
    {

        // Recuperar los datos de un usuario del Model
        $usuario = UserModel::getUserById($id);

        //Llamar a la vista que se muestre los datos del usuario
        include_once DIRECTORIO_VISTAS_BACKEND . "User/editUser.php";
    }

            function verify(){
        //Obtenemos los datos de la peticion post.
     //Este método requiere que antes haya hecho session_start() sino lanza warning o no guarda la sesion.
        //Obtenemos los datos de la petición POST ***

         //Petición a la base de datos para recuperar la información del usuario.
        $usuario = UserModel::getUserByUsername($_POST["username"]);

        //Tengo un usuario válido.
        $_SESSION['user']=$usuario;

        if(password_verify($_POST["password"], $usuario->getPassword())){
            $_SESSION['user']=$usuario;
            if($usuario->isAdmin()){
                //Tenemos a un usuario administrador
                header('Location:/user');

            }else{
                header('Location: /');
              //  include_once DIRECTORIO_VISTAS_BACKEND . "/User/vista_user_creado.php";
               // exit();
            }

        }else{
            $error="Usuario o contraseña incorrecto";
            include_once DIRECTORIO_VISTAS_BACKEND ."/error404.php";
            //No tengo un usuario valido

        }
    }
    function logout()
    {
        session_destroy();
        return header('Location: /');
    }
    function show_login()
    {
        /*include_once "App/Views/frontend/login.php";*/
        include_once __DIR__ . "/../Views/frontend/login.php"; //Cambio a ruta relativa al controlador.

    }
    function show_registro()
    {
       //cambiado a show. muestra el formulario de registro ok//
        include_once "App/Views/frontend/registro.php";


    }


    function registro() {
    $datos = $_POST;
        //Definimos las regals de validación.
    $validator = v::key('username', v::alnum()->noWhitespace()->length(3, 20))
        ->key('email', v::email())
        ->key('password', v::length(6, 20))
        ->key('confirm_password', v::equals($datos['password']));

    try {//Ejecuta la validacion.
        $validator->assert($datos);
        $usuario = User::validateUserCreation($datos);
        var_dump($usuario);
    } catch (NestedValidationException $e) {
        echo "Error en el formulario:<br>";
        echo nl2br($e->getFullMessage());
        }
    }
   
    function registroVerify()
    {  //Este método requiere que antes haya hecho session_start() sino lanza warning o no guarda la sesion.
        $_POST['username'];
        $_POST['password'];
           if (session_status() === PHP_SESSION_NONE) {
               session_start();
           }
        var_dump($_POST);

        //Si es correcto el login.
        $_SESSION['username'] = $_POST['username'];
        var_dump($_SESSION);
    }
}

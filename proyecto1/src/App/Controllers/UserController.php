<?php

namespace App\Controller;

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
        //include_once DIRECTORIO_VISTAS_ADMINISTRACION."allusers.php";
        header('Content-Tupe: application/json');
        echo hson_encode($usuarios);
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

        /*echo "$id";
        $editData=["uuid"=>$id];  //comprobar si el uuid es valido.
        $editData=array();*/
        parse_str(file_get_contents("php://input"),$editData);
        $editData['uuid']=$id;
        $usuario = User::validateUser($editData);

        //Guardo en usuario actualizado en la BBDD.

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
    function verify(){
        /*$_POST['username'];
        $_POST['password'];*/

        var_dump($_POST);

        $_SESSION['username']=$_POST['username'];
        var_dump($_SESSION);
    }
    function show_login(){
        include_once "App/Views/frontend/login.php";

}
}
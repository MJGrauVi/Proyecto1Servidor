<?php

namespace App\Controllers;

use App\Interface\ControllerInterface;

class UserController implements ControllerInterface
{

    function index()
    {
        $usuarios = UserModel::getAllUsers();
        include_once DIRECTORIO ."allusers.php";


    //return json_encode($usuario1);
        $usuarios= [$usuario1, $usuario2];
        include_once DIRECTORIO. "allusers.php";
    }

    function show($id)
    {
        return "Estos son los datos del usuario $id";
        //return json_encode()
    }

    function store()
    {
        var_dump($_POST);


        )
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function destroy()
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
}
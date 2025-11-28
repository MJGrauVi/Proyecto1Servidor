<?php

namespace App\Controllers;

use App\Interface\ControllerInterface;

class PublicacionController implements ControllerInterface
{

    function index()
    {
        // TODO: Implement index() method.
    }

    function show($id)
    {
        // TODO: Implement show() method.
    }

    function store()
    {
        // TODO: Implement store() method.
    }

    function update($id)
    {
        // TODO: Implement update() method.
    }

    function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    function create()
    {
        include_once DIRECTORIO_VISTAS_FRONTEND ."add-publicacion.php";
        var_dump($_POST);
        var_dump($_FILES);
        $carpetas = scandir(__DIR__);
        var_dump($carpetas);
        if(!array_search('uploaded', $carpetas)){
            mkdir(__DIR__ ."/uploaded");
            (move_uploaded_file($_FILES['poster']['tmp-name'], __DIR__ . "/uploaded/" . $_FILES['poster']['name']));
        }else{
            (move_uploaded_file($_FILES['poster']['tmp-name'], __DIR__ . "/uploaded/" . $_FILES['poster']['name']));
        }
    }

    function edit($id)
    {
        include_once DIRECTORIO_VISTAS_FRONTEND . "add-publicacion.php";
    }
    function mostrarPublicacion(){
        var_dump($_POST);
        var_dump($_FILES);
    }
}
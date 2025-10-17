<?php

namespace App\Controllers;

use App\Interface\ControllerInterface;

class DirectorController implements ControllerInterface
{

    function index()
    {
        return "Los directores son: ";
    }

    function show($id)
    {
        // TODO: Implement show() method.
    }

    function store()
    {
        // TODO: Implement store() method.
    }

    function update()
    {
        // TODO: Implement update() method.
    }

    function destroy($id)
    {
        return "Voy a eliminar el director con id $id";
    }

    function create()
    {
        // TODO: Implement create() method.
    }

    function edit($id)
    {
        // TODO: Implement edit() method.
    }
}
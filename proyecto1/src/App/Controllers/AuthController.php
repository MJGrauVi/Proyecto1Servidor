<?php

namespace App\Controllers;

class AuthController
{

    // Muestra el formulario de login
    public function mostrarLogin()
    {
      /*   $titulo = 'Iniciar Sesión';
        $mensaje = 'Por favor introduce tus credenciales'; */
        require_once __DIR__ . '/../../vistas/public/login.php';
    }

    // Recibe y procesa los datos del formulario
    public function procesarLogin()
    {
        // Recibir los datos
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';

        // Validar (ejemplo simple)
        if ($usuario === 'admin' && $password === '1234') {
            echo "Bienvenido, $usuario";
        } else {
            echo "Usuario o contraseña incorrectos.";
        }
    }
}

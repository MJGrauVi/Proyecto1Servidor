<?php

namespace App\Controllers;

class AuthController
{

    // Muestra el formulario de login
    public function mostrarLogin()
    {
      /*   $titulo = 'Iniciar Sesión';
        $mensaje = 'Por favor introduce tus credenciales'; */
        require_once __DIR__ . '/../../vistas/public/loginForm.php';
    }

    // Recibe y procesa los datos del formulario
    public function procesarLogin()
    {
        // Recibir los datos
        $usuario = $_POST['usuario'] ?? '';
        $password = $_POST['password'] ?? '';


        // Usuario ficticio para pruebas.Validar (ejemplo simple)
        if ($usuario === 'admin' && $password === '1234') {
            //Redirigir a la página principal
            header('Location: /');
            exit;
            /*echo "Bienvenido". $usuario;*/
        } else {
            //Si da error.
            header('Location: /login?error=1');
            exit;
            echo "Usuario o contraseña incorrectos.";
        }
    }
}

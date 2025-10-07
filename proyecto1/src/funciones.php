<?php
// Función para calcular letra del DNI
function calcularLetraDNI(string $dni): string {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE";
    $numero = (int)$dni;
    $pos = $numero % 23;
    return $letras[$pos];
}

// Función para generar contraseña
function generatePassword(int $caracteres, int $condiciones = 3): string {
    $numeros = '0123456789';
    $letrasMinus = 'abcdefghijklmnopqrstuvwxyz';
    $letrasMayus = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $simbolos = '!@#$%^&*()_+-=[]{}<>?';

    switch ($condiciones) {
        case 1: $chars = $numeros; break;
        case 2: $chars = $letrasMinus . $letrasMayus; break;
        case 3: $chars = $numeros . $letrasMinus . $letrasMayus; break;
        case 4: $chars = $numeros . $letrasMinus . $letrasMayus . $simbolos; break;
        default: $chars = $numeros . $letrasMinus . $letrasMayus; break;
    }

    // Primera letra siempre mayúscula
    $password = $letrasMayus[random_int(0, strlen($letrasMayus)-1)];
    $max = strlen($chars)-1;
    for ($i=1;$i<$caracteres;$i++){
        $password .= $chars[random_int(0,$max)];
    }

    return $password;
}
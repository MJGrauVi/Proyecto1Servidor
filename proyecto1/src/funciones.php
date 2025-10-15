<?php
// Función para calcular letra del DNI
function calcularLetraDNI(string $dni): string {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; //Letra que corresponde al módulo de dividir el numero de dni/23.
    $numero = (int)$dni;
    $pos = $numero % 23;
    return $letras[$pos];
}

// Función para generar contraseña
/* function generatePassword(int $caracteres, int $condiciones = 3): string {
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
} */

function generatePassword(int $caracteres, int $condiciones = 3): string {
    $numeros = '0123456789';
    $letrasMinus = 'abcdefghijklmnopqrstuvwxyz';
    $letrasMayus = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $simbolos = '!@#$%^&*()_+-=[]{}<>?';

    $chars = match ($condiciones) {
        1 => $numeros,
        2 => $letrasMinus . $letrasMayus,
        3 => $numeros . $letrasMinus . $letrasMayus,
        4 => $numeros . $letrasMinus . $letrasMayus . $simbolos,
        default => $numeros . $letrasMinus . $letrasMayus,
    };

    return substr(str_shuffle(str_repeat($chars, ceil($caracteres / strlen($chars)))), 0, $caracteres);
}


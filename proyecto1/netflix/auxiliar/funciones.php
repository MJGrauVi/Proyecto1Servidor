<?php

declare(strict_types=1);
function generateSecreto(int $length = 8): string {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';
    $maxIndex = strlen($chars) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $chars[random_int(0, $maxIndex)];
    }

    return $password;
}

const SOLO_NUMEROS = 1;
const NUMEROS_LETRAS =2;
CONST NUMEROS_LETRAS_ESPECIALES =4;

const ARRAY_LETRAS_DNI = ['T','R','W','A','G','M','Y','F','P','D','X',
    'B','N','J','Z','S','Q','V','H','L','C','K','E'];

/*function generatePassword(int $caracteres, int $condiciones = NUMEROS_LETRAS): string {
    $numeros = '0123456789';
    $letras  = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $simbolos = '!@#$%^&*()_+-=[]{}<>?';

    // según la condición decides el conjunto de caracteres
    switch ($condiciones) {
        case 1: // solo números
            $chars = $numeros;
            break;
        case 2: // solo letras
            $chars = $letras;
            break;
        case 3: // números + letras
        default:
            $chars = $numeros . $letras;
            break;
        case 4: // números + letras + símbolos
            $chars = $numeros . $letras . $simbolos;
            break;
    }

    $password = '';
    $max = strlen($chars) - 1;

    for ($i = 0; $i < $caracteres; $i++) {
        $password .= $chars[random_int(0, $max)];
    }

    return $password;
}*/
function generatePassword(int $caracteres, int $condiciones = NUMEROS_LETRAS_ESPECIALES): string {
    $numeros = '0123456789';
    $letrasMinus = 'abcdefghijklmnopqrstuvwxyz';
    $letrasMayus = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $letras  = $letrasMinus . $letrasMayus;
    $simbolos = '!@#$%&*_+-=?';

    // Según la condición decides el conjunto de caracteres para el resto
    switch ($condiciones) {
        case 1: // solo números
            $chars = $numeros;
            break;
        case 2: // solo letras
            $chars = $letras;
            break;
        case 3: // números + letras
        default:
            $chars = $numeros . $letras;
            break;
        case 4: // números + letras + símbolos
            $chars = $numeros . $letras . $simbolos;
            break;
    }

    // 🔹 La primera letra siempre será una mayúscula
    $password = $letrasMayus[random_int(0, strlen($letrasMayus) - 1)];

    // 🔹 El resto de la contraseña se genera según $chars
    $max = strlen($chars) - 1;
    for ($i = 1; $i < $caracteres; $i++) {
        $password .= $chars[random_int(0, $max)];
    }
    return $password;
}
function ejemploParametros(string $mensaje,int $numero1=6){

}

function ejemploParametrosVariables (...$parametros){

};

ejemploParametrosVariables(15,266,"HOLA");
ejemploParametros("Hola");
//generatePassword(8,NUMEROS_LETRAS);
generatePassword(8);

function calcularLetraDNI (int $numero):?string{
    $letra = $numero%23;
    return ARRAY_LETRAS_DNI[$letra];
}
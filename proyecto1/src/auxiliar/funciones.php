<?php

declare(strict_types=1);
// Función para calcular letra del DNI
function calcularLetraDNI(string $dni): string {
    $letras = "TRWAGMYFPDXBNJZSQVHLCKE"; //Letra que corresponde al módulo de dividir el numero de dni/23.
    $numero = (int)$dni;
    $pos = $numero % 23;
    return $letras[$pos];
}


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

    $password = '';
    $maxIndex = strlen($chars) - 1;//strlen devuelve el tamaño de la adena

    for ($i = 0; $i < $caracteres; $i++) {
        $password .= $chars[random_int(0, $maxIndex)];

    }

    return $password;

}
function organizarImagen(array $datosImagen,string $tituloPelicula):string|bool{
    $carpetas=scandir(__DIR__);
    if (!array_search('uploaded',$carpetas)){
        mkdir(__DIR__."/uploaded");
        move_uploaded_file($datosImagen['tmp_name'],__DIR__."/uploaded/".$tituloPelicula."png");
    }else{
        move_uploaded_file($_FILES['poster']['tmp_name'],__DIR__."/uploaded/".$tituloPelicula."png");
    }
    return __DIR__."/uploaded/".$tituloPelicula."png";
}
/*function organizarImagen(array $datosImagen, string $tituloPelicula): string|bool {//Movemos img a uploaded,añadimos nombre y devolvemos ruta donde está guardada.
    $rutaCarpeta = __DIR__ . "/uploaded";

    if (!is_dir($rutaCarpeta)) {
        mkdir($rutaCarpeta);
    }

    $rutaDestino = $rutaCarpeta . "/" . $tituloPelicula . ".png";

    if (move_uploaded_file($datosImagen['tmp_name'], $rutaDestino)) {
        return $rutaDestino; // devuelve la ruta final "string".
    }

    return false; // si falla el movimiento
}*/


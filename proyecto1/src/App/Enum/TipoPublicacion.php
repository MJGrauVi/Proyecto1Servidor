<?php

namespace App\Enum;

enum TipoPublicacion
{
    case ARTICULO;
    case CARTA_ABIERTA;
    case REFLEXION;


    public static function stringToTipoPublicacion(string $tipoPubli): TipoPublicacion
    {

        return match (strtolower($tipoPubli)) {
            "articulo" => TipoPublicacion::ARTICULO,
            "cartaAbierta" => TipoPublicacion::CARTA_ABIERTA,
            "reflexion" => TipoPublicacion::REFLEXION,
            default => TipoPublicacion::ARTICULO,
        };


    }

}

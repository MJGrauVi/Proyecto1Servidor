<?php

namespace App\Enum;

enum TipoPublicacion
{
    case PENDIENTE;
    case APROBADO;
    case RECHAZADO;

    public static function stringToTipoPublicacion(string $tipoPubli): TipoPublicacion
    {

        return match (strtolower($tipoPubli)) {
            "pendiente" => TipoPublicacion::PENDIENTE,
            "aprobado" => TipoPublicacion::APROBADO,
            "rechazado" => TipoPublicacion::RECHAZADO,
            default => TipoPublicacion::PENDIENTE,
        };
    }
}

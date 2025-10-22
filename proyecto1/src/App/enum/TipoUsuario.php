<?php

namespace App\Enum;

enum TipoUsuario
{
    case NORMAL;
    case ANUNCIOS;
    case ADMIN;

    public static function stringToTipoUsuario(string $tipo): TipoUsuario
    {

        return match (strtolower($tipo)) {
            "normal" => TipoUsuario::NORMAL,
            "anuncios" => TipoUsuario::ANUNCIOS,
            "admin" => TipoUsuario::ADMIN,
            default => TipoUsuario::NORMAL,
        };
    }
}

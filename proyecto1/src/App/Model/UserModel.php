<?php

namespace App\Model;

class UserModel
{
    public static function getAllUsers():array{

        $usuario1 = new User(
            Uuid::uuid4(),
            "pabloM",
            "molbap",
            "pablo@mail.com"
        );
        $usuario2 = new User(
            Uuid::uuid4(),
            "laura",
            "arual",
            "laura@mail.com"
        );
        return  $usuarios;
    }
}
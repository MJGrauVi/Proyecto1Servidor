<?php

namespace App\Model;

use App\Class\User;
use Ramsey\Uuid\Uuid;
use App\Enum\TipoUsuario;

class UserModel
{

    public static function getAllUsers():array{

        $usuario1= new User(
            Uuid::uuid4(),
            "admin",
            "1234",
            "margravid2@alu.edu.gva.es",
            TipoUsuario::ADMIN
        );
        $usuario1->setEdad(54);
        $usuario2= new User(
            Uuid::uuid4(),
            "LauraBil",
            "laura",
            "laura@mail.com",
            TipoUsuario::NORMAL
        );
        $usuario2->setEdad(25);
        $usuario3= new User(
            Uuid::uuid4(),
            "pabloM",
            "pablo",
            "pablom@mail.com",
            TipoUsuario::NORMAL
        );
        $usuario3->setEdad(18);
        $usuarios=[$usuario1,$usuario2,$usuario3];

        return $usuarios;

    }

}
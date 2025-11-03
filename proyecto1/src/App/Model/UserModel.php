<?php

namespace App\Model;

use App\Class\User;
use Ramsey\Uuid\Uuid;
use App\Enum\TipoUsuario;
use \PDO;

class UserModel
{

    public static function getAllUsers(): ?array
    {
        try{
            $conexion = new \PDO ("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $error){
            echo $error;
            return false;
        }

     $sql = "SELECT * FROM user";
     $sentenciaPreparada = $conexion->prepare($sql);
     $sentenciaPreparada->execute();
     $resultado = $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);

     if($resultado){
         $usuarios=[];
         foreach ($resultado as $user) {
            $usuarios[]=User::createFromArray($user);
         }
         return $usuarios;
     }else{
         return null;
     }


    }
    public static function getUserById(string $id):?User
    {

        $usuario = new User(
            Uuid::fromString($id),
            "mariajose",
            "123",
            "titapetrel@gmail.com",
            TipoUsuario::ADMIN
        );
        return $usuario;
    }



public static function getUserByUsername(string $usename):?User{
        return null;

}
public static function getUserByEmail(string $email):?User{
        return null;

}

    public static function saveUser(User $user):bool {
        TRY {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $error){
            echo $error;
            return false;
        }
        $sql = "INSERT INTO user values (:uuid, :username, :password, :email, :edad, :tipo)";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid', $user->getUuid());
        $sentenciaPreparada->bindValue('username', $user->getUsername());
        $sentenciaPreparada->bindValue('password', $user->getPassword());
        $sentenciaPreparada->bindValue('email', $user->getEmail());
        $sentenciaPreparada->bindValue('edad', $user->getUuid());
        $sentenciaPreparada->bindValue('tipo', $user->getTipo()->name);

        $sentenciaPreparada->execute();
        if($sentenciaPreparada->rowCount() > 0) {
            return true;
        }else{
                return false;
            }

    }
}

<?php

namespace App\Model;

use App\Class\User;
use Ramsey\Uuid\Uuid;
use App\Enum\TipoUsuario;
use \PDO;
use App\Class\DB;

class UserModel
{
    /* //Evita el null del foreach.
       public static function getAllUsers(): array
    {
        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto", "mariajose", "2222");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "SELECT * FROM user";
            $sentenciaPreparada = $conexion->prepare($sql);
            $sentenciaPreparada->execute();
            $resultado = $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);

            $usuarios = [];
            foreach ($resultado as $user) {
                $usuarios[] = User::createFromArray($user);
            }

            return $usuarios;

        } catch (\PDOException $error) {
            // Puedes loguear el error si lo necesitas
            return []; // Devuelve array vacío en caso de error
        }
    }*/

//Codigo de Miguel Angel, no me devuelve la vista y lanza error porque el forEach me devuelve null.
    public static function getAllUsers(): ?array{
        try {
            $conexion = new PDO ("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $error) {
            echo $error; //Para produccion cambiar a error_log()
            return null;
        }
        //Prepara y ejecuta la consulta.
        $sql = "SELECT * FROM user";
        //prepare() Toma sentencia SQL, permite parametros, evita Inyeccion sql, devulve PDOStatement y luego llamas a execute().
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->execute();

        $resultado = $sentenciaPreparada->fetchAll(PDO::FETCH_ASSOC);//Devuelve array asociativo.

        //Procesa el resultado obtenido.
        if ($resultado) {
            $usuarios = []; //Creo un array vacio y segú se creen usuarios se van añadiendo al final del array.
            foreach ($resultado as $user) {
                $usuarios[] = User::createFromArray($user); //convierte cada fila en un objeto User usando createFromArray()
            }
            return $usuarios; //Devuelve el array de objetos.
        } else {
            return null;
        }

    }

 public static function getUserById(string $id):?User{
     try {
         $conexion = new PDO("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }catch (\PDOException $error){ //Si la contraseña es mala o BD caída lanza excepcion.
         echo $error;               //y si hay errores devuelve null, nunca rompe la ejecución.
         return null;
     }

     //$sql = "SELECT * FROM user where username=:username";

     $sql = "SELECT * FROM user where uuid=:uuid";
     $sentenciaPreparada = $conexion->prepare($sql);

     $sentenciaPreparada->bindValue('uuid',$id,PDO::PARAM_STR);//Asocia al parámetro uuid el valor actual $id,
                                        //aunque el valor de $id cambie después, la sentencia utilizará el que tenía en ese momento.

     $sentenciaPreparada->execute();

     $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

     if($resultado){
         $usuario = User::createFromArray($resultado);
         return $usuario;
     }else{
         return null;
     }
 }

    public static function getUserByUsername(string $username):?User{

        try {
            $conexion = new PDO("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (\PDOException $error){
            echo $error;
            return null;
        }

        //$sql = "SELECT * FROM user WHERE username=:username";

        $sql = "SELECT * FROM user WHERE username=?"; //? Parámetro posicional, significa  parámetro, no tiene nombre.
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue(1,$username,PDO::PARAM_STR);//1 indica el primer ? en la consulta, el valor se pasa por posición.

        $sentenciaPreparada->execute();

        $resultado = $sentenciaPreparada->fetch(PDO::FETCH_ASSOC);

        if($resultado){
            $usuario = User::createFromArray($resultado);
            return $usuario;
        }else{
            return null;
        }

    }




    public static function getUserByEmail(string $email):?User{

        return null;

    }

    public static function deleteAllUsers():bool{

        return true;
    }

    public static function deleteUser(User $user):bool{

        return true;
    }
    public static function deleteUserById(string $id):bool{
     try{
         $conexion = new PDO("mysql:host=mariadb;dbname=proyecto", "mariajose", "gra200371");
         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     }CATCH(\PDOException $error){
         echo $error;
         return false;

     }
     //$sql = "SELECT * FROM user where username=:username";
        $sql = "DELETE FROM user WHERE uuid=:uuid";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid',$id);
        $sentenciaPreparada->execute();

        if($sentenciaPreparada->rowCount()>0){
            return true;
        }else{
            return false;
        }
    }

    public static function updateUser(User $user):?bool{
        try{
            $conexion = new PDO("mysql:host=mariadb;dename=proyecto", "mariajose", "gra200371");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(\PDOException $error){
            echo $error;
            return false;

        }
        $sql = "UPDATE user SET username=:username, password=:password, email=:email, edad=:edad, tipo=:tipo WHERE uuid=:uuid";
        $sentenciaPreparada = $conexion->prepare($sql);

        $sentenciaPreparada->bindValue('uuid', $user->getUuid());
        $sentenciaPreparada->bindValue('username',$user->getUsername());
        $sentenciaPreparada->bindValue('password',$user->getPassword());
        $sentenciaPreparada->bindValue('email',$user->getEmail());
        $sentenciaPreparada->bindValue('edad',$user->getEdad());
        $sentenciaPreparada->bindValue('tipo',$user->getTipo()->name);

        $sentenciaPreparada->execute();

        if($sentenciaPreparada->rowCount() > 0 ){
            return true;

        }else{
            return false;
        }

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
        $sentenciaPreparada->bindValue('edad', $user->getEdad());
        $sentenciaPreparada->bindValue('tipo', $user->getTipo()->name);

        $sentenciaPreparada->execute();
        if($sentenciaPreparada->rowCount() > 0) {
            return true;
        }else{
                return false;
            }

    }
}

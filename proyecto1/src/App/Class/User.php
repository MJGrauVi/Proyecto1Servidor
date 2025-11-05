<?php

namespace App\Class;

use App\Enum\TipoUsuario;
use App\Model\UserModel;
use JsonSerializable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class User implements JsonSerializable  //interfaz que obliga a implementar JsonSerializable():mixed
{
    private UuidInterface $uuid;
    private string $username;
    private string $password;
    private string $email;
    private ?int $edad;
    private array $visualizaciones;
    private TipoUsuario $tipo;

    public function __construct(UuidInterface $uuid, string $username, string $password, string $email, TipoUsuario $tipo = TipoUsuario::NORMAL)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->tipo = $tipo;
        $this->visualizaciones = [];
    }

    public function getUuid(): UuidInterface
    {
        return $this->uuid;
    }

    public function setUuid(UuidInterface $uuid): User
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): User
    {
        $this->edad = $edad;
        return $this;
    }

    public function getVisualizaciones(): array
    {
        return $this->visualizaciones;
    }

    public function setVisualizaciones(array $visualizaciones): User
    {
        $this->visualizaciones = $visualizaciones;
        return $this;
    }

    public function getTipo(): TipoUsuario
    {
        return $this->tipo;
    }

    public function setTipo(TipoUsuario $tipo): User
    {
        $this->tipo = $tipo;
        return $this;
    }


    public function jsonSerialize(): mixed
    //Convierte lo que devuelve j_son_encode($user) en formato de salida JSON válido.
    {
        return [
            "username" => $this->username,
            "email" => $this->email,
            "edad" => $this->edad ?? null,
            "tipo" => $this->tipo->name,
            "visualizaciones" => $this->visualizaciones
        ];
    }
    public static function createFromArray(array $userData):User{
        if(!isset($userData['uuid'])){
            $userData['uuid']Uuid::uuid4();
        }

        $usuario = new User(
            Uuid::fromString($userData['uuid'])
            $userData["username"] ?? null,
            $userData["password"] ?? null,
            $userData["email"] ?? null,
        );
    //Asignamos edad y tipo si existen.
        if(isset($userData["edad"])){
            $usuario->setEdad($userData["edad"]);
        }
        if(isset($userData["tipo"])){
            $usuario->setTipo(TipoUsuario::stringToTipoUsuario($userData["tipo"] ?? 'NORMAL'));
        }


return $usuario;


    }

    public static function validateUserCreation(array $userData): User|array
    {
        try {
            v::key('username', v::stringType())
                ->key('password', v::stringType()->length(3, 16))
                ->key('email', v::email())
                ->key('edad', v::intVal()->min(18), false)
                ->key('tipo', v::in(['normal', 'anuncios', 'admin']),false)
            ->assert($userData);

        } catch (NestedValidationException $errores) {
            return $errores->getMessages();
        }

        return User::createFromArray($userData);
    }

    public static function validateUserEdit(array $userData):User | array {
        try {
            v::key('uuid', v::uuid())
                 ->optional(v::key('username', v::stringType()))
                ->optional(v::key ('password', v::stringType()->length(3, 16)))
                ->optional(v::key('email', v::email()))
                ->optional(v::key('edad', v::intVal()->min(18)))
                ->optional(v::key('tipo', v::in(['normal', 'anuncios', 'admin'])))->assert($userData);
        } catch (NestedValidationException $errores) {

            return $errores->getMessages();
        }


        $usuarioAntiguo = UserModel::getUserById($userData['uuid']);
        $usuarioAntiguo->setUsername($userData['username']??$usuarioAntiguo->getUsername());
        $usuarioAntiguo-setEmail()
        /*//TODO Buscar el usuario en la base de datos y luego modificarlo

    }
}

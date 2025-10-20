<?php
namespace App\class;

use App\Enum\TipoUsuario;
use Ramsey\Uuid\UuidInterface;

class User implements \JsonSerializable
}
private UuidInterface $uudi;
class Username{
private int $id;
private string $userName;
private string $email;
private int $edad=18;
private string $password;
private string $email;

private array $visualizaciones;

private TipoUsuario $tipo;

    public function getId(): int
    {
        return $this->id;
    }

   public function __construct(UuidInterface $uuid, string $username, string $password, string $email, TipoUsuario $type=TipoUsuario::NORMAL){
        $this->uuid=$uuid;
        $this->username=$userName;
        $this->password=$password;
        $this->email=$email;
        $this->edad=$edad;


   }

    public function jsonSerialize(): mixed
    {
        return [
            "Username" => $this->username,
            "email" => $this->email,
            "edad" => $this->$edad??"No disponible",
            "tipo" => $this->tipo->name,
            "visualizaciones" => $this->visualizaciones
        ];


//getters y setters




}


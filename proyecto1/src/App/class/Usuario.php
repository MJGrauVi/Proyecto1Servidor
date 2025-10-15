<?php
namespace App\Class;
class Usuario{
private int $id;
private string $userName;
private string $email;
private int $edad;
private string $password;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Usuario
    {
        $this->id = $id;
        return $this;
    }


//getters y setters




}


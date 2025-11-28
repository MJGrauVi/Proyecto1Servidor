<?php

namespace App\Class;

use DateTime;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as V;

class Editor
{
    private int $id;
    private string $name;
    private DateTime $birthday;
    private array $misPublicaciones;

    public function __construct(string $name){
    $this->name=$name;
    $this->misPublicaciones=[];
}
    public function getId(){
        return $this->id;
    }
    public function setId(int $id): Editor
    {
    $this->id = $id;
        return $this;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Editor
    {
        $this->name = $name;
        return $this;
    }

    public function getBirthday(): DateTime
    {
        return $this->birthday;
    }

    public function setBirthday(DateTime $birthday): Editor
    {
        $this->birthday = $birthday;
        return $this;
    }

    public function getMisPublicaciones(): array
    {
        return $this->misPublicaciones;
    }

    public function setMisPublicaciones(array $misPublicaciones): Editor
    {
        $this->misPublicaciones = $misPublicaciones;
        return $this;
    }

    public static function validateEditorCreation(array $editorData):array|false{
        try {

            v::key('name', v::stringType()->length(2, 100), true)
                ->key('birthday', v::date('d/m/Y'))->assert($editorData);

        }catch (NestedValidationException $errores){
            return $errores->getMessages();
        }
        return false;
    }
    public static function createFromArray(array $directorData):?Director{

        if (!isset($directorData['id'])){



        }



    }
}
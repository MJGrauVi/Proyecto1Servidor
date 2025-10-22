<?php

namespace App\Class;

class GestorPublicaciones{
    private array $publicaciones = [];
    public function agregarPublicacion($publi){
        $this->publicaciones[] = $publi;
    }

}
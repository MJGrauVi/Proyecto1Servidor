<?php

namespace App\Class;

class Post{
    private int $id;
    private string $titulo;
    private string $contenido;
    private ?string $imagenPath;//? Puede recibir nulos.
    private string $fecha;
    private string $autor;
    private string $tipoPost;

    public function __construct(string $titulo, string $contenido, string $imagenPath, string $fecha, string $autor, string $tipoPost){
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->imagenPath = $imagenPath;
        $this->fecha = $fecha;
        $this->autor = $autor;
        $this->tipoPost = $tipoPost;

    }
    //Métodos getters y setters.



}
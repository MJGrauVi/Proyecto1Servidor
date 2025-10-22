<?php

namespace App\Class;

use App\Enum\TipoPublicacion;

class Publicacion implements \JsonSerializable {
    private int $id;
    private string $titulo;
    private string $contenido;
    private ?string $imagenPath;//? Puede recibir nulos.
    private string $fechaPubli;
    private TipoPublicacion $tipoPubli;

    public function __construct(string $titulo, string $contenido, string $imagenPath, string $fechaPubli, TipoPublicacion $tipoPubli = TipoPublicacion::PENDIENTE){
        $this->titulo = $titulo;
        $this->contenido = $contenido;
        $this->imagenPath = $imagenPath;
        $this->fecha = $fechaPubli;
        $this->TipoPublicacion = $tipoPubli;

    }

    public function getTipoPublicacion(): TipoPublicacion
    {
        return $this->TipoPublicacion;
    }

    public function setTipoPublicacion(TipoPublicacion $TipoPublicacion): Publicacion
    {
        $this->TipoPublicacion = $TipoPublicacion;
        return $this;
    }

    public function getFecha(): string
    {
        return $this->fecha;
    }

    public function setFecha(string $fecha): Publicacion
    {
        $this->fecha = $fecha;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Publicacion
    {
        $this->id = $id;
        return $this;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): Publicacion
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getContenido(): string
    {
        return $this->contenido;
    }

    public function setContenido(string $contenido): Publicacion
    {
        $this->contenido = $contenido;
        return $this;
    }

    public function getImagenPath(): ?string
    {
        return $this->imagenPath;
    }

    public function setImagenPath(?string $imagenPath): Publicacion
    {
        $this->imagenPath = $imagenPath;
        return $this;
    }

    public function getFechaPubli(): string
    {
        return $this->fechaPubli;
    }

    public function setFechaPubli(string $fechaPubli): Publicacion
    {
        $this->fechaPubli = $fechaPubli;
        return $this;
    }

    public function getTipoPubli(): TipoPublicacion
    {
        return $this->tipoPubli;
    }

    public function setTipoPubli(TipoPublicacion $tipoPubli): Publicacion
    {
        $this->tipoPubli = $tipoPubli;
        return $this;
    }


    //Métodos getters y setters.


    public function jsonSerialize(): mixed  //public function Este método debe devolver los datos que quieres incluir en el JSON cuando el objeto se serializa.
    {
        return [
            "titulo" => $this->titulo,
            "contenido" => $this->contenido,
            "imagenPath" => $this->imagenPath,
            "fechaPubli" => $this->fechaPubli,
            "tipoPubli" => $this->tipoPubli->name,

        ];
    }
}
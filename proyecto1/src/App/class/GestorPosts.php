<?php

namespace App\Class;

class GestorPosts{
    private array $posts = [];
    public function agregarPost($post){
        $this->posts[] = $post;
    }

}
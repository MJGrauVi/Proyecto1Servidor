<?php

namespace App\class;

class GestorPosts{
    private array $posts = [];
    public function agregarPost($post){
        $this->posts[] = $post;
    }

}
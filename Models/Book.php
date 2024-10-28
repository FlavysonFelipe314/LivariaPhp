<?php

namespace Models;

class Book{
    protected $id;
    protected $title;
    protected $src;
    protected $capa;
    protected $autor;
    protected $categoria;

    public function setId($n){
        $this->id = $n;
    }

    public function setTitle($n){
        $this->title = $n;
    }

    public function setSrc($n){
        $this->src = $n;
    }

    public function setCapa($n){
        $this->capa = $n;
    }

    public function setAutor($n){
        $this->autor = $n;
    }

    public function setCategoria($n){
        $this->categoria = $n;
    }



    public function getId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getSrc(){
        return $this->src;
    }

    public function getCapa(){
        return $this->capa;
    }

    public function getAutor(){
        return $this->autor;
    }

    public function getCategoria(){
        return $this->categoria;
    }

}

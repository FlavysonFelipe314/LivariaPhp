<?php

namespace Models;

class Book{
    protected $id;
    protected $title;
    protected $src;
    protected $capa;

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

}

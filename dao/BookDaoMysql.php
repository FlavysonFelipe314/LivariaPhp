<?php

namespace dao;

use Models\Book;
use PDO;

interface BookDao{
    public function create(Book $b);
    public function read();
}

class BookDaoMysql implements BookDao{

    private $pdo;

    function __construct(PDO $driver) {
        $this->pdo = $driver;
    }
    
    public function create(Book $b) {
        $formatedSrc = "BOOK".md5(time().rand(0, 1000)).".pdf";
        move_uploaded_file($b->getSrc(),"../uploads/".$formatedSrc);
        $b->setSrc($formatedSrc);

        $formatedCapa = "CAPA".md5(time().rand(0, 1000)).".png";
        move_uploaded_file($b->getCapa(),"../uploads/capas/".$formatedCapa);
        $b->setCapa($formatedCapa);

        $sql = $this->pdo->prepare("INSERT INTO books (title, src, capa) VALUES (:title, :src, :capa)");
        $sql->bindValue(":title", $b->getTitle());
        $sql->bindValue(":src", $b->getSrc());
        $sql->bindValue(":capa", $b->getCapa());
        $sql->execute();
    }
    
    public function read(){
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM books");
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item){
            $b = new Book;
            $b->setId($item["id"]);
            $b->setTitle($item["title"]);
            $b->setSrc($item["src"]);
            $b->setCapa($item["capa"]);

            $array[] = $b;
        }
        return $array;
    }
}

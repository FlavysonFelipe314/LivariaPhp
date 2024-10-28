<?php

namespace dao;

use Models\Book;
use PDO;

interface BookDao{
    public function create(Book $b);
    public function read();
    public function delete($id);
    public function findById($id);
    public function findByCategoria($query);
    public function update(Book $b);
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

        $sql = $this->pdo->prepare("INSERT INTO books (title, src, capa, autor, categoria) VALUES (:title, :src, :capa, :autor, :categoria)");
        $sql->bindValue(":title", $b->getTitle());
        $sql->bindValue(":src", $b->getSrc());
        $sql->bindValue(":capa", $b->getCapa());
        $sql->bindValue(":autor", $b->getAutor());
        $sql->bindValue(":categoria", $b->getCategoria());
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
            $b->setAutor($item["autor"]);
            $b->setCategoria($item["categoria"]);

            $array[] = $b;
        }
        return $array;
    }

    public function delete($id) {
        $midias = $this->pdo->prepare("SELECT * FROM books WHERE id = :id");
        $midias->bindValue(":id", $id);
        $midias->execute();
    
        $midia = $midias->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($midia as $m) {
            $caminhoPdf = "../uploads/" . $m['src'];
            if (file_exists($caminhoPdf)) {
                unlink($caminhoPdf); 
            }
    
            $caminhoCapa = "../uploads/capas/" . $m['capa'];
            if (file_exists($caminhoCapa)) {
                unlink($caminhoCapa);
            }
        }
    
        $sql = $this->pdo->prepare("DELETE FROM books WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
    

    public function findById($id){

        $sql = $this->pdo->prepare("SELECT * FROM books WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        $data = $sql->fetch(PDO::FETCH_ASSOC);

        $b = new Book;
        $b->setId($data["id"]);
        $b->setTitle($data["title"]);
        $b->setSrc($data["src"]);
        $b->setCapa($data["capa"]);
        $b->setAutor($data["autor"]);
        $b->setCategoria($data["categoria"]);

        return $b;

    }

    public function findByCategoria($query){
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM books WHERE categoria = :categoria");
        $sql->bindValue(":categoria", $query);
        $sql->execute();

        $data = $sql->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $item){
            $b = new Book;
            $b->setId($item["id"]);
            $b->setTitle($item["title"]);
            $b->setSrc($item["src"]);
            $b->setCapa($item["capa"]);
            $b->setAutor($item["autor"]);
            $b->setCategoria($item["categoria"]);

            $array[] = $b;
        }
        return $array;
    }

    public function update(Book $b){
        $sql = $this->pdo->prepare("UPDATE books SET title = :title, autor = :autor, categoria = :categoria");
        $sql->bindValue(":title", $b->getTitle());
        $sql->bindValue(":autor", $b->getAutor());
        $sql->bindValue(":categoria", $b->getCategoria());
        $sql->execute();
    }


}

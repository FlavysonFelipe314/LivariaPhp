<?php
require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

use dao\BookDaoMysql;
use Models\Book;

$book = new Book();
$bookDao = new BookDaoMysql($pdo);

$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
$autor = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_SPECIAL_CHARS);
$categoria = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_SPECIAL_CHARS);

$book->setTitle($titulo);
$book->setAutor($autor);
$book->setCategoria($categoria);

$bookDao->update($book);

header("Location: ".$base);


<?php
require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

use dao\BookDaoMysql;
use Models\Book;

$book = new Book();
$bookDao = new BookDaoMysql($pdo);

$titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
$pdf = $_FILES["livro"]["tmp_name"];
$capa = $_FILES["capa"]["tmp_name"];

$book->setTitle($titulo);
$book->setSrc($pdf);
$book->setCapa($capa);

$bookDao->create($book);

header("Location: ".$base);


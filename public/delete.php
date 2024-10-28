<?php
require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

use dao\BookDaoMysql;

$bookDao = new BookDaoMysql($pdo);

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$bookDao->delete($id);

header("Location: ".$base);


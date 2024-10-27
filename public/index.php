<?php

use dao\BookDaoMysql;

require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

$books = new BookDaoMysql($pdo);
$livros = $books->read();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="<?= $base?>/addBook.php">
        <button>Cadastrar Livro</button>
    </a>

    <div class="contentBooks" style="display:flex;">
        
    <?php foreach ($livros as $livro):?>
        <div class="content" style="display:flex; flex-direction:column; margin:0 10px 0 0;">
            <img src="<?= $baseDir?>/uploads/capas/<?= $livro->getCapa()?>" width="150px" height="200px" alt="">
            <p><?= $livro->getTitle()?></p>
            <a href="<?= $baseDir?>/uploads/<?= $livro->getSrc()?>">
                <button>quero Ler</button>
            </a>
        </div>
    <?php endforeach;?>
    </div>

</body>
</html>
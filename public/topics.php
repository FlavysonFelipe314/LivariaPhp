<?php

use dao\BookDaoMysql;

require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

$query = filter_input(INPUT_GET, "query", FILTER_SANITIZE_SPECIAL_CHARS);

$books = new BookDaoMysql($pdo);
$livros = $books->findByCategoria($query);

$result = ($livros) ? "Resultado(s): ".count($livros) : "Não foram Encontrados Resultados Nessa Categoria...";

include_once "../partials/header.php";
?>
    <head>
        <link rel="stylesheet" href="<?= $base?>/src/styles/layouts/home.css" />
    </head>
    <h1><?= $result?></h1>
    <section class="books-content">
      <div class="container">
        <?php foreach ($livros as $livro):?>

        <div class="single-book">
          <div class="book-card">
          <img src="<?= $baseDir?>/uploads/capas/<?= $livro->getCapa()?>" alt="">
          <h2><?= strlen($livro->getTitle()) > 40 ? substr($livro->getTitle(), 0, 30) . '...' : $livro->getTitle() ?></h2>
          <h3><?= $livro->getAutor()?></h3>
            <a href="<?= $baseDir?>/uploads/<?= $livro->getSrc()?>">
                <button>Baixar</button>
            </a>
          </div>
        </div>

        <?php endforeach;?>

      </div>
    </section>

<?php include_once "../partials/footer.php";?>
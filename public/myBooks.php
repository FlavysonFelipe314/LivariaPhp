<?php

use dao\BookDaoMysql;

require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

$books = new BookDaoMysql($pdo);
$livros = $books->read();

include_once "../partials/header.php";
?>
<head>
    <link rel="stylesheet" href="<?= $base?>/src/styles/layouts/myBooks.css" />
</head>

    <h1>Meus Livros</h1>
    <section class="books-content">
      <div class="container">
      <?php foreach ($livros as $livro):?>

        <div class="single-book">
          <div class="book-card">
          <img src="<?= $baseDir?>/uploads/capas/<?= $livro->getCapa()?>" alt="">
          <h2><?= strlen($livro->getTitle()) > 40 ? substr($livro->getTitle(), 0, 30) . '...' : $livro->getTitle() ?></h2>
          <h3><?= $livro->getAutor()?></h3>
            <div class="options">
            <a href="<?= $base?>/update.php?id=<?= $livro->getId()?>">
                <button>Editar</button>
            </a>
            <a href="<?= $base?>/delete.php?id=<?= $livro->getId()?>">
                <button>Deletar</button>
            </a>
            </div>
          </div>
        </div>

        <?php endforeach;?>

      </div>
    </section>

<?php include_once "../partials/footer.php";?>
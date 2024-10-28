<?php

use dao\BookDaoMysql;

require_once "../vendor/autoload.php";
require_once "../Config/Database.php";

$books = new BookDaoMysql($pdo);
$livros = $books->read();

include_once "../partials/header.php";
?>
<head>
    <link rel="stylesheet" href="<?= $base?>/src/styles/layouts/home.css" />
</head>



    <section class="circle-menu">
      <nav>
        <a href="<?= $base?>/search.php?query=aventura">
          <div class="single-circle">
            <img src="src/assets/icons/location.png" alt="" />
          </div>
          <p>Aventura</p>
        </a>

        <a href="<?= $base?>/search.php?query=religiao">
          <div class="single-circle">
            <img src="src/assets/icons/bible.png" alt="" />
          </div>
          <p>Religião</p>
        </a>

        <a href="<?= $base?>/search.php?query=terror">
          <div class="single-circle">
            <img src="src/assets/icons/castle.png" alt="" />
          </div>
          <p>Terror</p>
        </a>

        <a href="<?= $base?>/search.php?query=ficcao">
          <div class="single-circle">
            <img src="src/assets/icons/science-fiction.png" alt="" />
          </div>
          <p>Ficção</p>
        </a>

        <a href="<?= $base?>/search.php?query=romance">
          <div class="single-circle">
            <img src="src/assets/icons/love-books.png" alt="" />
          </div>
          <p>Romance</p>
        </a>

        <a href="<?= $base?>/search.php?query=tecnologia">
          <div class="single-circle">
            <img src="src/assets/icons/project-management.png" alt="" />
          </div>
          <p>Tecnologia</p>
        </a>

        <a href="<?= $base?>/search.php?query=estudos">
          <div class="single-circle">
            <img src="src/assets/icons/graduation-hat.png" alt="" />
          </div>
          <p>Estudos</p>
        </a>

        <a href="<?= $base?>/search.php?query=comedia">
          <div class="single-circle">
            <img src="src/assets/icons/movie.png" alt="" />
          </div>
          <p>Comédia</p>
        </a>

        <a href="<?= $base?>/search.php?query=outros">
          <div class="single-circle">
            <img src="src/assets/icons/more.png" alt="" />
          </div>
          <p>Outros</p>
        </a>
      </nav>
    </section>

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
<?php

    require_once "../vendor/autoload.php";
    require_once "../Config/Database.php";

    use dao\BookDaoMysql;
    use Models\Book;

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

    $book = new Book;
    $bookDao = new BookDaoMysql($pdo);

    $livro = $bookDao->findById($id);

    include_once "../partials/header.php";
?>

<head>
    <link rel="stylesheet" href="<?= $base?>/src/styles/layouts/addBook.css" />
</head>
<section>
    <div class="container">
    <h1>Cadastro de livros</h1>
    <p>Preencha Todos Os Campos</p>
    <form action="<?= $base?>/updateAction.php" method="POST" enctype="multipart/form-data">
        <div class="form-wraper-100">
            <label for="titulo">Título do Livro</label>
            <input type="text" name="titulo" placeholder="Título do Livro..." value="<?= $livro->getTitle()?>">
        </div>

        <div class="form-wraper-100">
            <label for="autor">Autor do Livro</label>
            <input type="text" name="autor" placeholder="Autor do Livro..." value="<?= $livro->getAutor()?>">
        </div>
        
        <div class="form-wraper-100">
            <label for="categoria">Categoria do Livro</label>
            <select name="categoria" id="" value="">
                <option value="<?= $livro->getCategoria()?>"><?= $livro->getCategoria()?></option>
                <option value="aventura">Aventura</option>
                <option value="religiao">Religião</option>
                <option value="terror">Terror</option>
                <option value="ficcao">Ficção</option>
                <option value="romance">Romance</option>
                <option value="tecnologia">Tecnologia</option>
                <option value="estudos">Estudos</option>
                <option value="comedia">Comédia</option>
                <option value="outros">Outros</option>
            </select>
        </div>
        
        <button type="submit">Cadastrar</button>
    </form>

    </div>
</section>
<?php include_once "../partials/footer.php";?>
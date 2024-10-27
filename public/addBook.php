<?php
require_once "../Config/Database.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $base?>/addBookAction.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo" placeholder="Título do Livro..." required>
        <input type="file" name="livro" accept=".pdf" required>
        <input type="file" name="capa" accept="image/png, image/jpg, image/jpeg" required/>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>
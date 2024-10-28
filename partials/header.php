<!DOCTYPE html>

<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="author_name" />
    <meta name="description" content="description_content" />
    <meta name="keywords" content="your,keywords,here" />

    <title>ShelFREE</title>

    <link rel="stylesheet" href="<?= $base?>/src/styles/global.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/vendor/reset.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/button.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/search.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/input.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/circleMenu.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/bookCard.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/components/formWraper.css" />
    <link rel="stylesheet" href="<?= $base?>/src/styles/layouts/header.css" />

    <!-- favicon -->
      <link rel="shortcut icon" href="<?= $base?>/src/assets/images/logo.png" type="image/x-icon">
      
    <!-- Google Apis -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" hr ef="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <script
      src="https://kit.fontawesome.com/cacd8cf69e.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="menu-desktop">
          <img
            src="<?= $base?>/src/assets/images/logo.png"
            alt=""
            id="logo"
            onclick="sendHome()"
          />

          <form action="" method="GET" id="searchBar">
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input
              type="search"
              name="search"
              id="search"
              placeholder="Pesquisar..."
            />
          </form>

          <nav>
            <a href="<?= $base?>/addBook.php" class="menu-option">
              <i class="fa-solid fa-plus"></i>
              <span>Cadastrar Livro</span>
            </a>

            <a href="<?= $base?>/myBooks.php" class="menu-option">
              <i class="fa-solid fa-book"></i>
              <span>Meus Livros</span>
            </a>

            <div class="avatar-user">
              <img src="<?= $base?>/src/assets/images/Avatar.png" alt="" />
            </div>
          </nav>
        </nav>

        <div class="header-mobile">
          <img
            src="<?= $base?>/src/assets/images/logo.png"
            alt=""
            id="logo"
            onclick="sendHome()"
          />

          <h1 id="open-trigger"><i class="fa-solid fa-bars"></i></h1>
        </div>

        <nav class="menu-mobile">
          <h1 id="close-trigger"><i class="fa-solid fa-xmark"></i></h1>

          <img
            src="<?= $base?>/src/assets/images/logo.png"
            alt=""
            id="logo"
            onclick="sendHome()"
          />

          <form action="" method="GET" id="searchBar">
            <button type="submit">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
            <input
              type="search"
              name="search"
              id="search"
              placeholder="Pesquisar..."
            />
          </form>

          <nav>
            <a href="" class="menu-option">
              <i class="fa-solid fa-plus"></i>
              <span>Cadastrar Livro</span>
            </a>

            <a href="<?= $base?>/myBooks.php" class="menu-option">
              <i class="fa-solid fa-book"></i>
              <span>Meus Livros</span>
            </a>

            <a href="" class="menu-option">
              <i class="fa-solid fa-user"></i>
              <span>Perfil</span>
            </a>
          </nav>
        </nav>
      </div>
    </header>

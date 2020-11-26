<?php
    if (!isset($_SESSION)) {
      session_start();
    }


    if (!isset($_SESSION['usuarioID'])) {
      session_destroy();
      header('Location: index.php');
      exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Agenda de tarefas | Menu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <link rel="stylesheet" href="css/page-menu.css" />
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/animations.css" />
  <link rel="sortcut icon" href="/images/icon.png" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet" />
  <script src="main.js"></script>
</head>

<body>
  <div class="container-profile">
    <div class="box-profile">
      <img src="<?= $_SESSION['usuarioPerfil'] ?>" title="<?= $_SESSION['usuarioNome'] ?>" id="perfil" />
      <p><strong>Bem vindo(a):</strong> <?= ucfirst($_SESSION['usuarioNome']) ?></p>
    </div>
  </div>
  <h2>O que deseja fazer?</h2>

  <div class="menu">
    <a href="page-create.php">
      <button>
        <img src="images/criar.svg" id="criar" />Criar tarefa
      </button>
    </a>

    <a href="page-view.php">
      <button>
        <img src="images/ver.svg" id="ver" />Ver tarefas
      </button>
    </a>

    <a href="actions/logout.php">
      <button>
        <img src="images/sair.svg" id="sair" />Sair
      </button>
    </a>
  </div>
</body>

</html>
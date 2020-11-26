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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/page-create.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/animations.css" />
    <link rel="sortcut icon" href="/images/icon.png" />
    <title>Agenda de tarefas | Criar Tarefa</title>
  </head>
  <body>
    <div class="side-bar">
      <div class="box-profile">
        <img src="<?= $_SESSION['usuarioPerfil'] ?>" title="<?= $_SESSION['usuarioNome'] ?>" id="perfil" />
        <p><?= ucfirst($_SESSION['usuarioNome']) ?></p>
      </div>

      <div class="buttons">
        <a href="page-view.php">
          <button>
            <img src="images/ver.svg" id="ver-icon" />
            Ver tarefas
          </button>
        </a>
        
        <a href="page-menu.php">
          <button>
            <img src="images/back.svg" id="back-icon" />
            Início
          </button>
        </a>
      </div>
    </div>
    <h2>Defina sua tarefa</h2>
    <div class="create-tarefa">
      <form method="POST" action="actions/tasks.php">
        <label for="nome">Nome da tarefa</label>
        <input type="text" name="nome" placeholder="Descreva sua tarefa" maxlength="50" required>

        <label for="hora">Horário:</label>
        <input id="time-input" type="time" name="hora" required>

        <label for="data">Data:</label>
        <input id="data-input" type="date" name="data" required>

        <hr>

        <span>
          <img src="images/important.svg">
          Preencha todos os dados
        </span>
        <input type="submit" id="salvar-tarefa" value="Salvar tarefa">
      </form>
    </div>
    <script src="scripts/create-tarefa.js"></script>
  </body>
</html>

<?php

  include "connect_db.php";

  if (!isset($_SESSION)) {
    session_start();
  }


  if (!isset($_SESSION['usuarioID'])) {
    session_destroy();
    header('Location: index.php');
    exit;
  }

  $id = $_GET['id'];

  $r = "SELECT nome FROM tasks_".$_SESSION['usuarioID']." WHERE id = $id";
  $nome = pg_fetch_row(pg_query($connect, $r));

  $r2 = "SELECT hora FROM tasks_".$_SESSION['usuarioID']." WHERE id = $id";
  $hora = pg_fetch_row(pg_query($connect, $r2));

  $r3 = "SELECT dia FROM tasks_".$_SESSION['usuarioID']." WHERE id = $id";
  $dia = pg_fetch_row(pg_query($connect, $r3));  

?>


<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/page-create.css" />
    <link rel="stylesheet" href="../css/sidebar.css" />
    <link rel="stylesheet" href="../css/animations.css" />
    <link rel="sortcut icon" href="../images/icon.png" />
    <title>Agenda de tarefas | Editar Tarefa</title>
  </head>
  <body>
    <div class="side-bar">
      <div class="box-profile">
        <img src="../images/perfil.svg" id="perfil" />
        <p><?= ucfirst($_SESSION['usuarioNome']) ?></p>
      </div>
      <div class="buttons">
        <a href="../page-view.php">
          <button>
            <img src="../images/ver.svg" id="ver-icon" />
            Ver tarefas
          </button>
        </a>
        
        <a href="../page-menu.html">
          <button>
            <img src="../images/back.svg" id="back-icon" />
            Menu
          </button>
        </a>
      </div>
    </div>
    <h2>Editar tarefa</h2>
    <div class="create-tarefa">
      <form method="POST" action="updateTask.php?id=<?= $id ?>">
        <label for="nome">Nome da tarefa</label>
        <input type="text" name="nome" placeholder="Descreva sua tarefa" value="<?= $nome[0] ?>" maxlength="50" required>

        <label for="hora">Horário:</label>
        <input id="time-input" type="time" name="hora" value="<?= $hora[0] ?>"required>

        <label for="data">Data:</label>
        <input id="data-input" type="date" name="data" value="<?= $dia[0] ?>" required>

        <hr>

        <span>
          <img src="../images/important.svg">
          Preencha todos os dados
        </span>
        <input type="submit" id="salvar-tarefa" value="Salvar tarefa">
      </form>
    </div>
    <script src="../scripts/create-tarefa.js"></script>
  </body>
</html>

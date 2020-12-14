<?php
  include 'actions/connect_db.php';

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
    <link rel="stylesheet" href="css/sidebar.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="icon" href="images/icon.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- <link rel="stylesheet" href="css/animations.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css"
    />
    <link rel="stylesheet" href="css/page-view.css" />
    <title>Agenda tarefas | Suas tarefas</title>
  </head>
  <body style="overflow-x: hidden;">
    <div class="side-bar">
      <div class="box-profile">
        <img src="<?= $_SESSION['usuarioPerfil'] ?>" title="<?= $_SESSION['usuarioNome'] ?>" id="perfil" />
        <p><?= ucfirst($_SESSION['usuarioNome']) ?></p>
      </div>

      <div class="buttons">
        <a href="page-create.php">
          <button id="buttons-sidebar-pageview">
            <img src="images/criar.svg" id="ver-icon" />
            Criar tarefa
          </button>
        </a>

        <a href="page-menu.php">
          <button id="buttons-sidebar-pageview">
            <img src="images/back.svg" id="back-icon" />
            Início
          </button>
        </a>
        </div>
      </div>

    <script>
      function deleteTask(id) {
        confirm = Swal.fire({
                    title: 'Deseja deletar essa tarefa?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#2ecc71',
                    cancelButtonColor: '#c5bdbd',
                    confirmButtonText: 'Sim, deletar!',
                    cancelButtonText: 'Cancelar'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location = "actions/deleteTask.php?id=" + id;
                    }
                  })
      }

      function editTask(id){
        window.location = "actions/editTask.php?id=" + id;
      }

      function markTask(id){
        window.location = "actions/markTask.php?id=" + id;
      }

    </script>


    <?php 
      
      $consulta = "SELECT * FROM tasks_".$_SESSION['usuarioID']." ORDER BY completo, dia";
      $result = pg_query($connect, $consulta);

    ?>
    
    <div class="tarefas-block">
      <table class="bordered striped centered">
        <thead>
          <tr>
            <!-- <th>ID</th> -->
            <th>Tarefa</th>
            <th>Horário</th>
            <th>Data</th>
            <th>Editar</th>
            <th>Excluir</th>
            <th>Finalizar</th>
          </tr>
        </thead>
        <tbody>
          <?php
              function data($data){
                return date("d/m/Y", strtotime($data));
            }

            while ($linha = pg_fetch_row($result)) {
              echo "<tr>"; 
              // echo "<td>" . $linha[0] . "</td>";
              echo "<td>" . $linha[1] . "</td>";
              echo "<td>" . substr(strval($linha[2]), 0, 5) . "</td>";
              echo "<td>" . data(strval($linha[3])) . "</td>";
              echo "<td><img src='images/edit-icon.svg' class='icons' id='edit-icon' onclick='editTask($linha[0]);'></td>";
              echo "<td><img src='images/trash-icon.svg' class='icons' id='trash-icon' onclick='deleteTask($linha[0])'></td>";
              echo "<td><input type='checkbox' value='$linha[4]' id='$linha[0]' name='$linha[0]' onchange='markTask($linha[0])'>";
              echo "<label id='$linha[0]' for='$linha[0]'></label></td>";
              echo "</tr>";
            }
          ?>

        </tbody>
      </table>
    </div>
    <script src="scripts/checkTask.js"></script>
  </body>
</html>

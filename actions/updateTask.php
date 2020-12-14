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
    $nome = $_POST['nome'];
    $hora = $_POST['hora'];
    $dia = $_POST['data'];

    echo $nome, $dia, $hora;


    $r = "UPDATE tasks_".$_SESSION['usuarioID']." SET nome = '$nome', hora = '$hora', dia = '$dia' WHERE id = $id";
    pg_query($connect, $r);

    header("Location: ../page-view.php");
    

?>
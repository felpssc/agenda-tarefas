<?php
    include 'connect_db.php';

    if (!isset($_SESSION)) {
        session_start();
    }
    
    
    if (!isset($_SESSION['usuarioID'])) {
        session_destroy();
        header('Location: index.php');
        exit;
    }
    
        
    $nome = $_POST['nome'];
    $hora = $_POST['hora'];
    $dia = $_POST['data'];

    
    pg_query($connect, "insert into tasks_".$_SESSION['usuarioID']."(nome, hora, dia, completo) values ('$nome', '$hora', '$dia', 'false')");
    header("Location: ../page-view.php");


    
?>
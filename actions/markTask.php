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

    $id = $_GET['id'];

    $verif = "SELECT completo FROM tasks_".$_SESSION['usuarioID']." WHERE id = $id";
    $exe = pg_fetch_row(pg_query($connect, $verif));

    if($exe[0] == 'f'){
        $v = "UPDATE tasks_".$_SESSION['usuarioID']." SET completo = 'true' WHERE id = $id";
        pg_query($connect, $v);

        header("Location: ../page-view.php");
    } else if($exe[0] == 't') {
        $v = "UPDATE tasks_".$_SESSION['usuarioID']." SET completo = 'false' WHERE id = $id";
        pg_query($connect, $v);

        header("Location: ../page-view.php");
    } 

    

?>
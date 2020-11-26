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

    $delete = "DELETE FROM tasks_".$_SESSION['usuarioID']." WHERE id = " . $id;
    $result = pg_query($connect, $delete);

    if($result){
        header("Location: ../page-view.php");
    } else {
        header("Location: ../page-view.php");
        echo "<script> alert('Falha ao exclir tarefa') </script>";
    }

?>
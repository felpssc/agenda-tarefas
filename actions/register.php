<?php

    include 'connect_db.php';

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confSenha = $_POST['confSenha'];
    $perfil = $_POST['perfil'];

    if($senha != $confSenha){
        header('Location: ../register.php');
    } else {
        $verif = "SELECT usuario FROM users WHERE usuario = '$usuario'";
        $r = pg_fetch_row(pg_query($connect, $verif));
    
    
        if(empty($r)){
            $insert = "INSERT INTO users (usuario, senha, perfil) VALUES ('$usuario', MD5('$senha'), '$perfil')";
            pg_query($connect, $insert);
            $s = "SELECT id FROM users WHERE usuario = '$usuario'";
            $id = pg_fetch_row(pg_query($connect, $s));
            $nova_tabela = "CREATE TABLE tasks_$id[0] ( 
               id SERIAL NOT NULL,
               nome VARCHAR(50) NOT NULL,
               hora TIME NOT NULL,
               dia DATE NOT NULL,
               completo BOOLEAN NOT NULL 
            )";
            pg_query($connect, $nova_tabela);
            header('Location: ../index.php?r=t');
        } else {
            echo "<script> alert('Usuário já existe!') </script>";
            header('Location: ../register.php?registration=t');
        }
    }

   

    

?>
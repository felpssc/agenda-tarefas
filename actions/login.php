<?php
    include 'connect_db.php';

    $verif = "SELECT id, usuario, senha, perfil FROM users WHERE usuario='" . $_POST["usuario"] . "' AND senha='" . MD5($_POST["senha"]) . "'";
    $consulta = pg_fetch_row(pg_query($connect, $verif));


    if($consulta){
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['usuarioID'] = $consulta[0];
        $_SESSION['usuarioNome'] = $consulta[1];
        $profile = $consulta[3] == '' ? "images/perfil.svg" : $consulta[3];
        $_SESSION['usuarioPerfil'] = $profile;
        header('Location: ../page-menu.php');
    } else {
        
        // echo '<script>alert("Usuário ou senha incorretos!")</script>';
        header('Location: ../index.php?erro_login=t');

    }



?>
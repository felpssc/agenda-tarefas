<?php

    include 'actions/connect_db.php';

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="sortcut icon" href="images/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Agenda de tarefas | Login</title>
</head>

<body>
    <div class="container">
        <div class="logo-container">
            <img src="images/logo.svg" id="logo" alt="Agenda de tarefas">
            <h1>Agende suas tarefas de forma rápida e fácil.</h1>
        </div>
        <h3>Faça login ou <a href="register.php">crie uma conta agora</a></h3>
        <form class="input-block" method="POST" action="actions/login.php">
            <span><img src="images/email-icon.svg" id="icon-email" alt="text"></span>
            <input name="usuario" type="text" placeholder="Usuário" required>
            <span><img src="images/password-icon.svg" alt="email"></span>
            <input name="senha" type="password" placeholder="Senha" required>

            <button type="submit" onclick="login()" value="Login">Entrar</button>
        </form>
        
    </div>
    
    <!-- <h4>Não possui uma conta?</h4>
    <a href="register.php">criar agora</a> -->
    

    <h6>Projeto final Dev-web</h6>

    <script src="scripts/index.js"></script>
</body>

</html>


<?php
    $erro = isset($_GET['erro_login']) ? $_GET['erro_login'] : 'f' ;
    $r = isset($_GET['r']) ? $_GET['r'] : '';
    if($erro == 't'){
        $c = "<script>alert('Usuário ou senha incorretos!')</script>";
        echo $c;
    }

    if($r == 't'){
        $s = "<script>alert('Conta criada! Faça login para entrar.')</script>";
        echo $s;
    }


?>
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
    <link rel="stylesheet" href="css/register.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Agenda de tarefas | Criar conta</title>

    <script>
        function verif(){
            var usuario = document.getElementById("usuario");
            var senha = document.getElementById("senha");
            var confSenha = document.getElementById("confSenha");

            if(senha.value == '' || confSenha.value == ''){
                alert('Preencha os campos!');
                window.location = 'register.php';
            } else {
                if(senha.value != confSenha.value){
                    alert('As senhas não conferem!');
                    window.location = 'register.php';
                } 
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <img src="images/logo.svg" id="logo" alt="Agenda de tarefas">
        <h1>Crie uma conta</h1>
        
        <form class="input-block" onsubmit="verif()" method="POST" action="actions/register.php">
            <span><img src="images/email-icon.svg" id="icon-email" alt="text"></span>
            <input id="usuario" name="usuario" type="text" placeholder="Crie um usuário" required maxlength="50">
            <span><img src="images/password-icon.svg" alt="email"></span>
            <input id="senha" name="senha" type="password" placeholder="Senha" required pattern=".{8,}" title="A senha deve conter 8 ou mais caracteres.">
            <span><img src="images/password-icon.svg" alt="email"></span>
            <input id="confSenha" name="confSenha" type="password" placeholder="Confirme a senha" required>
            <span><img src="images/profile-icon.svg" alt="profile"></span>
            <input id="perfil" name="perfil" type="url" placeholder="Cole o link de uma foto de perfil (opcional)" maxlength="600">

            <button type="submit">Criar</button>
        </form>
    </div>

    <script src="scripts/index.js"></script>
</body>

</html>

<?php
    $erro = isset($_GET['registration']) ? $_GET['registration'] : 'f' ;
    if($erro == 't'){
        $c = "<script>alert('Usuário já existe!')</script>";
        echo $c;
    }
?>
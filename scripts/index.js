function login() {
    var usuario = document.querySelector('input[type="text"]');
    var senha = document.querySelector('input[type="password"]');
    console.log(usuario, senha);
    if (usuario.value == '' || senha.value == '') {
        alert('Usuário ou senha faltando!')
    } }
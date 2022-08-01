<?php 
include_once ('./src/MySQLInteract.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['CriarNome']) && isset($_POST['CriarSobrenome']) && isset($_POST['CriarEmail']) 
    && isset($_POST['CriarSenha'])){
        $CriarNome = $_POST['CriarNome'];
        $CriarSobrenome = $_POST['CriarSobrenome'];
        $CriarEmail = $_POST['CriarEmail'];
        $CriarSenha = password_hash($_POST['CriarSenha'], PASSWORD_DEFAULT);

        SQLadd(1, $CriarNome, $CriarSobrenome, $CriarEmail, $CriarSenha, $conn);
    }

    if (isset($_POST['LoginEmail']) || isset($_POST['LoginSenha'])){

        $EmailPass = mysqli_real_escape_string($conn, $_POST['LoginEmail']);
        $SenhaPass = mysqli_real_escape_string($conn, $_POST['LoginSenha']);

        SQLLogin($EmailPass, $SenhaPass, $conn);

    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.ico" type="image/ico">
    <title>Nidec GA - Início</title>
    <style><?php include ("C:/xampp/htdocs/nidec/style.css"); ?></style>
</head>
<body>
<header class="topo">
    <img src="assets/img/nidec-ga-logo.png" alt="Nidec GA"></img>
    <ul>
            <li><a href="" type="submit">Inicio</a></li>
            <li><a href="">Departamentos</a></li>
            <li><a href="#">Reportar</a></li>
    </ul>

    <div class="FazerLogin">
        <img src="assets/svg/person-plus.svg" alt="">
        <button id="loginButton">Login</button>
    </div>
</header>

<div class="popup">
<div class="floatform">
    <a href="" id="CloseButtonForm">X</a>
        <form action="" method="post">
            <label for="">E-Mail</label>
            <input type="email" name="LoginEmail" id="">

            <label for="">Senha</label>
            <input type="password" name="LoginSenha" id="">

            <div class="lembrar">
                <label for="">Lembrar login</label>
                <input type="checkbox" name="" id="">
                <span class="checkbox"></span>
            </div>
            <input type="submit" value="Ir" class="SubmitButton">

            <div class="LinksLogin">
                <button type="button" id="CriarLogin">Criar uma conta</button>
                <a href="">Esqueci a senha</a>
            </div>
        </form>
    </div>
    
    <div class="floatformCreate">
    <a href="" id="CloseButtonForm">X</a>
        <form action="" method="post">
            <label for="">Nome</label>
            <input type="text" name="CriarNome" id="">

            <label for="">Sobrenome</label>
            <input type="text" name="CriarSobrenome" id="">

            <label for="">Email</label>
            <input type="email" name="CriarEmail" id="">

            <label for="">Senha</label>
            <input type="password" name="CriarSenha" id="PSW">

            <div id="ValSenha">
                <div class="QuantChar">
                    <p>Mais de 8 digitos</p>
                </div>

                <div class="LetraChar">
                    <p>Contém letras maiúsculas</p>
                </div>

                <div class="NumChar">
                    <p>Contém Números</p>
                </div>

                <div class="SymbChar">
                    <p>Contém Simbolos</p>
                </div>

            </div>

            <label for="">Repita a Senha</label>
            <input type="password" name="senha2" id="">

            <input type="submit" value="Cadastrar" class="SubmitButton">


        </form>
    </div>

</div>
</div>

</body>

<script src="script.js"></script>

</html>
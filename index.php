<?php 
include_once ('./src/MySQLInteract.php');

if(!isset($_SESSION)){
    session_start();

    if (isset($_SESSION['Nome'])){echo "<style>
    .FazerLogin{
        display:none !important;
    }
    .Perfil{
        display: flex !important;
    }
    </style>";

    $NomeLog = $_SESSION['Nome'];
    $SobrenomeLog = $_SESSION['Sobrenome'];

    }

}

global $ErroRepSenha;
$ErroRepSenha = '';

global $ErroLogin;
$ErroLogin = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['CriarNome']) && isset($_POST['CriarSobrenome']) && isset($_POST['CriarEmail']) 
    && isset($_POST['CriarSenha'])){
        if ($_POST['CriarSenha'] == $_POST['CriarSenha2']){
            $CriarNome = $_POST['CriarNome'];
            $CriarSobrenome = $_POST['CriarSobrenome'];
            $CriarEmail = $_POST['CriarEmail'];
            $CriarSenha = password_hash($_POST['CriarSenha'], PASSWORD_DEFAULT);

            SQLadd(1, $CriarNome, $CriarSobrenome, $CriarEmail, $CriarSenha, $conn);
        } else {
            $ErroRepSenha = "Senhas não coincidem!";
        }
    }

    if (isset($_POST['LoginEmail']) || isset($_POST['LoginSenha'])){

            $EmailPass = mysqli_real_escape_string($conn, $_POST['LoginEmail']);
            $SenhaPass = mysqli_real_escape_string($conn, $_POST['LoginSenha']);

            SQLLogin($EmailPass, $SenhaPass, $conn);

            include ('src/login.php');
    } else {
        $ErroLogin = "Email ou Senha incorretos";
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
        <button id="loginButton">
            <img src="assets/svg/person-plus.svg" alt="Logar">
        </button>
    </div>

    <div class="Perfil">
    <p>Olá <?php 
        if (isset($_SESSION['Nome'])){
            echo "<span class='User'>".$NomeLog."</span>";
        }
    ?></p>
    <div class="LoginDropBox">
        <ul class="list">
            <li class="BotaoLog1"> <a href="">Perfil</a></li>
            <span class="Line"></span>
            <li class="BotaoLog2"><a href="">Configurações</a></li>
            <span class="Line"></span>
            <!-- <li class="BotaoLog3"><a href=""></a></li>
            <span class="Line"></span> -->
            <li class="BotaoLog4"><a href="./src/Logout.php">Finalizar Sessão</a></li>
        </ul>
    </div>
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

            <p class="Senha" style="display: none; color: #7a0029"><?php echo "$ErroLogin<br><br>"; ?></p>

            <div class="lembrar">
                <label for="">Lembrar login</label>
                <input type="checkbox" name="" id="">
                <span class="checkbox"></span>
            </div>
            <input type="submit" value="Ir" class="SubmitButton">

            <div class="LinksLogin">
                <button type="button" id="CriarLogin">Criar uma conta</button>
                <a style="display: none; href="">Esqueci a senha</a>
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
            <input type="password" name="CriarSenha2" id="">
            <p class="RepSenha" style="display: none; color: #7a0029"><?php echo "$ErroRepSenha<br><br>"; ?></p>

            <input type="submit" value="Cadastrar" class="SubmitButton">
        </form>
    </div>

</div>
</div>

<div class="MainBody">
    <section class="GridContainer">
        <div class="header">
            <p>Header</p>
            <div class="Slide">
            </div>
        </div>
        <div class="sidebar">
            <p>Sidebar</p>
        </div>
        <div class="main">
            <p>Main</p>
        </div>
        <div class="footer">
            <p>© Nidec Corporation 2022</p>
        </div>
    </section>
</div>


</body>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['CriarSenha'])){
            if (!$ErroRepSenha == ''){
                echo "<script>
                var FormLogin = document.getElementsByClassName('floatform');
                var FormLoginPopup = document.getElementsByClassName('popup');
                var SenhaRepError = document.getElementsByClassName('RepSenha');
                var FormLoginCriar = document.getElementsByClassName('floatformCreate');

                SenhaRepError[0].style.display = 'inline';
                SenhaRepError[0].classList.add('ativo');
                FormLoginPopup[0].classList.add('ativado');
                FormLogin[0].classList.remove('ativado');
                FormLoginCriar[0].classList.add('ativado');
            </script>";
            }
        }

        if (isset($_POST['LoginSenha'])){
            if (!$ErroLogin == ''){
                echo "<script>
                    var FormLogin = document.getElementsByClassName('floatform');
                    var FormLoginPopup = document.getElementsByClassName('popup');
                    var SenhaIncorreta = document.getElementsByClassName('Senha');
                    SenhaIncorreta[0].style.display = 'inline';
                    SenhaIncorreta[0].classList.add('ativo');
                    FormLoginPopup[0].classList.add('ativado');
                    FormLogin[0].classList.add('ativado');
                </script>";
            }
        }
    }
?>

<script src="script.js"></script>

</html>
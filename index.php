<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
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

    <button id="loginButton">Login</button>
</header>

<div class="popup">
<!-- <div class="floatform">
    <a href="" id="CloseButtonForm">X</a>
        <form action="" method="post">
            <label for="">Nome de usuário</label>
            <input type="text" name="username" id="">

            <label for="">Senha</label>
            <input type="password" name="senha" id="">

            <div class="lembrar">
                <label for="">Lembrar login</label>
                <input type="checkbox" name="" id="">
                <span class="checkbox"></span>
            </div>
            <input type="submit" value="Ir" class="SubmitButton">

            <div class="LinksLogin">
                <button id="CriarLogin">Criar uma conta</button>
                <a href="">Esqueci a senha</a>
            </div>
        </form>
    </div> -->
    
    <div class="floatformCreate">
    <a href="" id="CloseButtonForm">X</a>
        <form action="" method="post">
            <label for="">Nome</label>
            <input type="text" name="nome" id="">

            <label for="">Sobrenome</label>
            <input type="text" name="sobrenome" id="">

            <label for="">Nome de Usuário</label>
            <input type="text" name="username" id="">


            <label for="">Email</label>
            <input type="email" name="email" id="">

            <label for="">Senha</label>
            <input type="password" name="senha" id="PSW">

            <div id="ValSenha">
                <div class="QuantChar">
                    <p>mais de 8 digitos</p>
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
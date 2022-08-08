<?php
include_once(__DIR__. '/../../MySQL/MySQLInteract.php');


echo '<style>'; include(__DIR__. './LFStyle.css'); echo '</style>';

// $LoginErro = false;

?>

<div class="LoginForm">
    <div class="popup <?php if ($LoginErro || isset($ErroLog)){
                        echo 'ativado';} ?>">
        <div class="floatform <?php if ($LoginErro){
                        echo 'ativado';} ?>">
            <a href="" id="CloseButtonForm">X</a>
                <form action="" method="post">
                    <label for="">E-Mail</label>
                    <input type="email" name="LoginEmail" id="">

                    <label for="">Senha</label>
                    <input type="password" name="LoginSenha" id="">

                    <p style="display: none; color: #7a0029;" class="Senha <?php if ($LoginErro){
                        echo 'Ativo';} ?>
                    } ?>">Erro ao conectar, Email ou Senha incorretos!<br><br></p>

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
            
            <div class="floatformCreate <?php if (isset($ErroLog)){
                        echo 'ativado';} ?>"">
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
                    <p class="RepSenha <?php if ($ErroLog){
                        echo 'Ativo';} ?>" style="display: none; color: #7a0029"><?php
                        if (isset($ErroLog)){
                            echo $ErroLog;
                        }
                     ?><br><br></p>

                    <input type="submit" value="Cadastrar" class="SubmitButton">
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    <?php include (__DIR__ .'/./LFScript.js'); ?>
</script>
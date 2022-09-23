<?php

$Saudacao = 'Boa tarde';
$User = 'André';
$URL = 'https://intranet.nidec.local/nidec/src/mailer/Rec-Senha/Recuperacao.php?Token=YWFhYUBnbWFpbC5jb20mMTQmQUFBQSZ0cnVl';



$Mail = "<style>
    .Mail{
        font-family: Helvetica, Sans-Serif;
        background-color: #f2f2f2;
        width:40%;
    }
    .Body a{
        text-decoration: none;
        color: #41b579;
        font-weight: bold;
    }
    .Signature{
        background-color: #1fb55d;
        color: white;
        padding: 15px;
    }
</style>
<div class='Mail'>
    <h1 class='Titulo'>$Saudacao $User !</h1>

    <div class='Body'>
    <p>Parece que você solicitou uma recuperação de senha!</p>
    <br>
    <p>Para recuperar sua conta <a href='$URL'>Clique Aqui</a>, ao prosseguir escolha uma senha razoavel e que se encaixe aos padrões de segurança</p>
    <br>
    <p>Caso não você não tenha pedido por uma recuperação de senha, contate o administrador</p>
    <br>
    <p>Muito Obrigado!</p>
    </div>

    <div class='Signature'>
        <img src='' alt=''>
        <div class='Info'>
            <h2>Serviços de Recuperação</h2>
            <p>Email Automático</p>
        </div>
    </div>
</div>";

echo $Mail;
<?php




// $User = 'André';
// $eemail = 'aaaa@gmail.com';


$Ass = "Conta criada com sucesso!";

$Mail = "<style>
    .Mail{
        font-family: Helvetica, Sans-Serif;
        background-color: #f2f2f2;
        width:40%;
    }
    .Body a, span{
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
    <h1 class='Titulo'>Bem-vindo $User !</h1>

    <div class='Body'>
    <p>Ficamos felizes que você criou um usuário novo,</p>
    <br>
    <p>A partir de agora você oficialmente faz parte da família Nidec no mundo digital!</p>
    <br>
    <p>Você deve usar o email <span><strong>$eemail</strong></span> para acessar seu login</p>
    <br>
    <p>Em caso de problemas ao se conectar, <a href=''>Clique aqui</a> para buscar ajuda</p>
    <br>
    <p>Muito Obrigado!</p>
    </div>

    <div class='Signature'>
        <img src='' alt=''>
        <div class='Info'>
            <h2>Serviço de Criação</h2>
            <p>Email Automático</p>
        </div>
    </div>
</div>";

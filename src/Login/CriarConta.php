<?php

//Criar Conta
require_once (__DIR__. '/../MySQL/MySQLInteract.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['CriarNome']) && isset($_POST['CriarSobrenome']) && isset($_POST['CriarEmail']) 
    && isset($_POST['CriarSenha'])){
        if ($_POST['CriarSenha'] == $_POST['CriarSenha2']){

        if (!ValidarSenha($_POST['CriarSenha']) == "Passou"){
            global $ErroLog;
            $ErroLog = "Senha fraca";
        } elseif (ValidarSenha($_POST['CriarSenha']) == "Passou") {

            $CriarNome = $_POST['CriarNome'];
            $CriarSobrenome = $_POST['CriarSobrenome'];
            $CriarEmail = $_POST['CriarEmail'];
            $CriarSenha = password_hash($_POST['CriarSenha'], PASSWORD_DEFAULT);

            SQLadd(1, $CriarNome, $CriarSobrenome, $CriarEmail, $CriarSenha, $conn);
        }
    } else {
        global $ErroLog;
        $ErroLog = "Senhas não coincidem";
    }
}
}


function ValidarSenha($Senha){

    if (!is_numeric($Senha)){
        return "Senha sem números";
    }

    $uppercase = preg_match('@[A-Z]@', $Senha);
    $lowercase = preg_match('@[a-z]@', $Senha);
    $number    = preg_match('@[0-9]@', $Senha);
    $specialChars = preg_match('@[^\w]@', $Senha);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($_POST['CriarSenha']) < 8) {
        return "Não Passou";
    } else {
        return "Passou";
    }
}

?>
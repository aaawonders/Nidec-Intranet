<?php

require_once (__DIR__. '/../MySQL/MySQLInteract.php');

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['LoginEmail']) || isset($_POST['LoginSenha'])){
        
        if(isset($_SESSION)){
            session_destroy();
        }

            $EmailPass = mysqli_real_escape_string($conn, $_POST['LoginEmail']);
            $SenhaPass = mysqli_real_escape_string($conn, $_POST['LoginSenha']);

            SQLLogin($EmailPass, $SenhaPass, $conn);
    } else {
        $ErroLogin = "Email ou Senha incorretos";
    }
}

?>

<?php

$dbHostname = "localhost";
$dbNome = "Nidec";
$dbUser = "root";
$dbSenha = ""; 

global $conn;

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

require_once ('./index.php');

function SQLadd($CriarID, $CriarNome, $CriarSobrenome, $CriarEmail, $CriarSenha, $conn){
    
    date_default_timezone_set('America/Sao_Paulo');
    $DataVisita = date('Y-m-d H:i:s',time());

    $sql = " INSERT INTO `login` (`InternID`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Data de Criação`) 
    VALUES ('$CriarID', '$CriarNome', '$CriarSobrenome', '$CriarEmail', '$CriarSenha', '$DataVisita')";

    mysqli_query($conn, $sql);
}


?>
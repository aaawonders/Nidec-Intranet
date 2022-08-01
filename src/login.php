<?php

if(!isset($_SESSION)){
    session_start();
}

$NomeLog = $_SESSION['Nome'];
$SobrenomeLog = $_SESSION['Sobrenome'];

echo "<p>Seja Bem-vindo ".$NomeLog." ".$SobrenomeLog."!</p>";

?>
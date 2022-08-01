<?php

if(!isset($_SESSION)){
    session_start();
}

require_once ('./index.php');

$NomeLog = $_SESSION['Nome'];
$SobrenomeLog = $_SESSION['Sobrenome'];

header ('Location: ./index.php');
exit();
?>
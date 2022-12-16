<?php

if (!isset($MySql)){
    include_once (__DIR__."/MySQLInteract.php");
}

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 


date_default_timezone_set('America/Sao_Paulo');
$Hoje = date('Y-m-d H:i:s',time());

$sql = "DELETE FROM `loginregister` WHERE `Data_Registro` < '$Hoje'";

$result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

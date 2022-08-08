<?php
session_start();

$NomeLog = $_SESSION['Nome'];
$SobrenomeLog = $_SESSION['Sobrenome'];

header ('Location: ../../index.php');
exit();

?>
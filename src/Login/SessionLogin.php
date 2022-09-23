<?php
session_start();

$NomeLog = $_SESSION['Nome'];
$SobrenomeLog = $_SESSION['Sobrenome'];


if (isset($_GET['Criar'])) {
    header ('Location: ../../index.php?Criar='.$_GET['Criar']);
} else {
    header ('Location: ../../index.php');
}

exit();

?>
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

    mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);
}

function SQLLogin($LoginEmail, $LoginSenha, $conn){

    $sql = "SELECT * FROM login WHERE Email = '$LoginEmail'";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    while($row = mysqli_fetch_array($result)){
        $CryptSenha = $row['Senha'];
    }

    if ($QuantPass == 1 && password_verify($LoginSenha, $CryptSenha)){
        $LoginPass = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        
        if(!isset($_SESSION)){
            session_start();
        }

        $_SESSION['InternID'] = $LoginPass['ID'];
        $_SESSION['Nome'] = $LoginPass['Nome'];
        $_SESSION['Sobrenome'] = $LoginPass['Sobrenome'];

        // Header('Location: src/login.php');
        
    } else {
        global $ErroLogin;
        $ErroLogin = "Erro ao conectar, Email ou Senha incorretos!";
    }

}

?>
<?php

$dbHostname = "localhost";
$dbNome = "Nidec";
$dbUser = "root";
$dbSenha = "y0MH2r%BLr&09aFMXU@fbFLg"; 

global $conn;

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

function SQLadd($CriarID, $CriarNome, $CriarSobrenome, $CriarEmail, $CriarSenha, $conn){
    
    $sql = "SELECT * FROM login WHERE Email = '$CriarEmail'";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if ($QuantPass == 0){

        date_default_timezone_set('America/Sao_Paulo');
        $DataVisita = date('Y-m-d H:i:s',time());

        $sql = " INSERT INTO `login` (`InternID`, `Nome`, `Sobrenome`, `Email`, `Senha`, `Data de Criação`) 
        VALUES ('$CriarID', '$CriarNome', '$CriarSobrenome', '$CriarEmail', '$CriarSenha', '$DataVisita')";

        mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

        session_start();

        $_SESSION['InternID'] = $CriarID;
        $_SESSION['Nome'] = $CriarNome;
        $_SESSION['Sobrenome'] = $CriarSobrenome;

        return true;
    } else {
        global $ErroLog;
        $ErroLog = "Email já existente";
        throw new Exception("Email já existente");
    }
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
        
        session_start();

        $_SESSION['InternID'] = $LoginPass['ID'];
        $_SESSION['Nome'] = $LoginPass['Nome'];
        $_SESSION['Sobrenome'] = $LoginPass['Sobrenome'];

        header ('Location: ./src/Login/SessionLogin.php');
        exit();
        
    } else {
       global $LoginErro;
        $LoginErro = true;
    }

}

?>
<?php

require (__DIR__.'/../../MySQL/MySQLInteract.php');

if (isset($_POST['Senha1']) && isset($_POST['Senha2'])) {

    $Token = $_POST['Token'];
    $TokArr = decodeToken($Token);
    $Email = $TokArr[0];
    $ID = $TokArr[1];


    $conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

    $Senha = password_hash($_POST['Senha1'], PASSWORD_DEFAULT);
    $Senha2 = password_hash($_POST['Senha2'], PASSWORD_DEFAULT);

    $sql = "SELECT * FROM login WHERE Senha = '$Senha'";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if ($QuantPass == 0){

        date_default_timezone_set('America/Sao_Paulo');
        $DataVisita = date('Y-m-d H:i:s',time());

        $sql = "UPDATE `login` SET `Senha` = '$Senha' WHERE `login`.`InternID` = $ID";

        mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);
    } 
    

} 


function decodeToken($Token) {
    $Token = base64_decode($Token);

    $ss = explode('&', $Token);

    return $ss;
}

?>
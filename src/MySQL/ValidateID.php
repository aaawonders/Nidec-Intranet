<?php

function Validar($Token, $DateToken){

    // if (!isset($MySql)){
    //     include (__DIR__."/MySQLInteract.php");
    // }

    $dbHostname = "localhost";
    $dbNome = "Nidec";
    $dbUser = "root";
    $dbSenha = "y0MH2r%BLr&09aFMXU@fbFLg";

    $conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome);

    $sql = "SELECT * FROM `loginregister` WHERE `AcessToken` = '$Token'";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if ($QuantPass == 0){
        return false;
    }

    if ($QuantPass > 0){

        while($row = mysqli_fetch_array($result)){
            $InternID = $row['InternID'];
        }

        $sql = "SELECT MAX(Data_Registro) FROM `loginregister` WHERE `AcessToken` = '$Token'";

        $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

        while($row = mysqli_fetch_array($result)){
            $DataVal[] = $row['MAX(Data_Registro)'];
        }

        if (!password_verify($DataVal[0], $DateToken)){
            return 'errado';
        }


    }
        
    date_default_timezone_set('America/Sao_Paulo');
    $Hoje = date('Y-m-d H:i:s',time());

    if ($Hoje > date($DataVal[0])){
        return false;
    }

    return $InternID;
}

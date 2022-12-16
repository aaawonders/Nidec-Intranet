<?php

// if (isset($_SESSION['InternID'])){

    
// if (!isset($MySql)){
//     include (__DIR__."/MySQLInteract.php");
// }

function KeepAcess($ID){

    $Acess = uniqid();

    $IdPass = $ID.$Acess;

    $EncryID = password_hash($IdPass, PASSWORD_DEFAULT);

    $IP = $_SERVER['REMOTE_ADDR'];

    $dbHostname = "localhost";
    $dbNome = "Nidec";
    $dbUser = "root";
    $dbSenha = "y0MH2r%BLr&09aFMXU@fbFLg"; 

    include (__DIR__."/ValTokens.php");

    $conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome);

    date_default_timezone_set('America/Sao_Paulo');
    $DataRegistro = date('Y-m-d H:i:s',time() + 1209600);

    $sql = "INSERT INTO `loginregister`(`InternID`, `EncryptID`,`AcessToken` , `IP`, `Data_Registro`) VALUES ('$ID', '$EncryID','$Acess','$IP' , '$DataRegistro')";


    mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $EncryDate = password_hash($DataRegistro, PASSWORD_DEFAULT);

    $data = array("Date" => $EncryDate, "AcToken" => $Acess, "ID" => $ID);

    return $data;
}

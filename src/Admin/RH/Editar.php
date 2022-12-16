<?php


// // if (isset($_POST['Nome'])){


    $Nome = $_POST['Nome'];
    $Sobrenome = $_POST['Sobrenome'];
    $Aniversario = $_POST['Aniversario'];
    $Email = $_POST['Email'];
    // $Genero = $_POST['Genero'];
    $ID = $_POST['ID'];

    require_once(__DIR__. '/../../MySQL/MySQLInteract.php');

    $sql = "SELECT * FROM perfil WHERE ID='$ID'" ;

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $QuantPass = $result->num_rows;

    if($QuantPass > 0){
        date_default_timezone_set('America/Sao_Paulo');
        $Data = date('Y-m-d H:i:s',time());

        $sql = "UPDATE `perfil` SET `Nome` = '$Nome', `Sobrenome` = '$Sobrenome', `Email` = '$Email', `Aniversário` = '$Aniversario' WHERE `perfil`.`ID`= $ID";

        mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    }

    $data = array('Nome' => $Nome, 'Sobrenome' => $Sobrenome, 'Email' => $Email, 'Niver' => $Aniversario);

    echo json_encode($data);
// }
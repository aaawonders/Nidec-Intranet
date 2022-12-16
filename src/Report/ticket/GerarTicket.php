<?php

if (isset($_POST['Titulo']) && isset($_POST['Categoria']) && isset($_POST['Descricao'])){

    include (__DIR__."/../../MySQl/MySQLInteract.php");

    $Titulo = $_POST['Titulo'];
    $Cat = $_POST['Categoria'];
    $Arquivo = $_POST['Arquivo'];
    $Desc = $_POST['Descricao'];
    $Nome = 'AAAAA';
    $Email = 'AAAAA@gmail.com';


    if($Titulo == ''){
        echo 'Falha: Sem titulo do problema';
        die('Falha: Sem titulo do problema');
    }//else if($Cat == ''){
    //     die('Falha: Sem categoria defenida');
    // }else if($Desc == ''){
    //     die('Falha: Sem descrição do problema');
    // }

    $sql = "SELECT MAX(`Ticket`) FROM `ticket`";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    while($row = mysqli_fetch_array($result)){
        $Ticket[] = $row['MAX(`Ticket`)'] + 1;
    }

    date_default_timezone_set('America/Sao_Paulo');
    $DataTicket = date('Y-m-d H:i:s',time());

    $sql = "INSERT INTO `ticket`(`Ticket`, `Titulo`, `Categoria`, `Arquivo`, `Descricao`, `Nome`, `Email`, `Data`) VALUES ('$Ticket[0]', '$Titulo', '$Cat', '$Arquivo', '$Nome', '$Desc', '$Email', '$DataTicket')";

    $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

    $ticket = $Ticket[0];

    include (__DIR__.'/TicketPdf.php');
    include (__DIR__.'/../../mPDF/mPDF.php');

    echo "Ticket criado $Ticket[0]";
}
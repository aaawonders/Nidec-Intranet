<?php

// if (isset($_SERVER['InternID'])

$ID = 5;

include (__DIR__.'/../../MySQL/MySQLInteract.php');

$sql = "SELECT * FROM `admin` WHERE `InternID` = $ID AND `Departamento` = 'RH' AND `Escopo` = 'Cadastro_Perfis'";

$result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

$data = mysqli_fetch_array($result)['InternID'][0];


// $QuantPass = $result->num_rows;

// if ($QuantPass > 0){
//     echo"<button class='btAddNews'>+</button>";
// }

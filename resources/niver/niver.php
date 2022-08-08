<?php 

require_once (__DIR__. '/../../src/MySQL/MySQLInteract.php');

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

$Multi = false;
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

$HojeData = date('m-d');
$HojeData = strval($HojeData);
// echo $HojeData;

$sql = "SELECT * FROM `perfil` WHERE `Aniversário` = '$HojeData';";

$result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

$QuantPass = $result->num_rows;

if ($QuantPass > 0){
    if ($QuantPass > 1) {
        $Multi = true;
    } elseif ($QuantPass = 1){
        $Multi = false;
    }
    
    while ($row = mysqli_fetch_assoc($result)) {

        $Nome[] = $row["Nome"]." ".$row["Sobrenome"];
        $NiverDataRaw = date_create($row["Ano de Nascimento"]."-".$row["Aniversário"]);
        $NiverDataStr = $row["Ano de Nascimento"]."-".$row["Aniversário"];
        $Foto = $row["Foto"];
        $NiverData[] =  date_format($NiverDataRaw, 'd')." de ".strftime('%B', strtotime($NiverDataStr));
}

} elseif ($QuantPass < 1) {

}

?>

<style><?php include ('./niverStyle.css') ;?></style>


<div class="NiverCard">
    <p class="CloseCard">X</p>
    <h1>Feliz Aniversário! 🎉</h1>
    <?php
    echo strval($Foto[0]);
    echo "<div class='ListaNiver'>";
    $niverI = 0;
    for ($i = 0; $i < count($Nome); $i++) {
        $niverI++;
        $FotoNiver = "./Default.svg";

        if (!$Foto[$i] == "NOT"){
            $FotoNiver = strval($Foto[$i]);
        }

        echo "<div class='Niverr $niverI'>";
            echo "<img src='$FotoNiver' alt='' srcset=''>";
            echo "<h2 class='NomeCard'>$Nome[$i]</h2>";
            echo "<h3 class='Data'>$NiverData[$i]</h3>";
        echo "</div>";
        echo "<span class='Line'></span>";
    }
    echo "</div>";
    ?>
    <p>Desejamos tudo de bom para <?php if($Multi){echo "vocês";}else{echo "você";} ?></p>
</div>

<script type="text/javascript" src="jquery-3.6.0.js"></script>
<script src="./niverScript.js"></script>
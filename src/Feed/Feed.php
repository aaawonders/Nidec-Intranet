<!DOCTYPE html>
<?php

require_once (__DIR__. '/../MySQL/MySQLInteract.php');

$conn = mysqli_connect($dbHostname, $dbUser, $dbSenha, $dbNome); 

$Multi = false;
date_default_timezone_set('America/Sao_Paulo');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');



$sql = "SELECT * FROM `noticias` ORDER BY Data_Criacao DESC";

$result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

$QuantPass = $result->num_rows;

$NewsExist = false;

if ($QuantPass > 0){
    if ($QuantPass > 1) {
        $Multi = true;
    } elseif ($QuantPass = 1){
        $Multi = false;
    }

    $NewsExist = true;
    
    while ($row = mysqli_fetch_assoc($result)) {

        $IDNot[] = $row["IDNews"];
        $TituloNot[] = $row["Titulo"];
        $AssuntoNot[] = $row["Assunto"];
        $FotoNot[] = $row["Foto"];
        // $ResumeTitulo[] = str_split($TituloNot[], 128).' ...';


        // $DataNot[] =  date_format($NiverDataRaw, 'd')." de ".strftime('%B', strtotime($NiverDataStr));
    }

} elseif ($QuantPass <= 0) {
}

//Style
echo '<style>'; echo include(__DIR__.'/./Feed.css'); echo'</style>';
?>



<div id="Feed">
    <?php
    if ($NewsExist == false){
    echo    "<div class='SemFeed'>";
    echo    "<img src='/nidec/src/Feed/imgs/Nothing.svg'>";
    echo    "<h1>Sem Resultados!</h1>";
    echo    "</div>";
    }
    ?>

<div class="ToolNews">
    <?php 
    // if (isset($_GET['adminNews'])){
        echo "<button class='btAddNews'>+</button>";
    // }
    ?>
</div>

    <div class="Feed-list">

    <?php
        
    if ($NewsExist == true){
        for ($i = 0; $i < count($IDNot); $i++){
            $ResumeTitulo = substr($AssuntoNot[$i],0, 180,).' ...';
    
    
            echo "<div class='feed f$i'>";
                echo "<div class='info'>";
                    echo "<h1>$TituloNot[$i]</h1>";
                    echo "<span id='line'></span>";
                    echo "<p>$ResumeTitulo</p>";
                echo "</div>";
                echo "<img src='$FotoNot[$i]'>";
            echo "</div>";
        }
    }

    ?>    
    </div>
    <div class="PopUp">
        <div class="AddNews">
            <p class="addNewsClose Close">X</p>
            <form action="" method="get">

                <label for="">Titulo</label>
                <input type="text" name="Titulo" id="">

                <label for="">Imagem</label>
                <input type="file" accept="image/png, image/jpeg" name="Img" id="">

                <label for="">Assunto</label>
                <textarea name="Assunto" id="" cols="60" rows="8"></textarea>

                <input class="btCriarNews" type="submit" value="Criar">

            </form>
        </div>
    </div>
        <!-- <div class="OpenNews">
            <p class="NewsClose Close">X</p>

        </div> -->
</div>

<script type='module'><?php include(__DIR__.'/Feed.js'); ?></script>

<?php
// Script
$Script = realpath(__DIR__ . '/Feed.js');
$Script = str_replace('\\', '/', $Script);
// echo "<script type='module' src='$'>".include(__DIR__.'/Feed.js');."</script>";

?>
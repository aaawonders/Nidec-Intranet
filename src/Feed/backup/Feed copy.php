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

if ($QuantPass > 0){
    if ($QuantPass > 1) {
        $Multi = true;
    } elseif ($QuantPass = 1){
        $Multi = false;
    }
    
    while ($row = mysqli_fetch_assoc($result)) {

        $IDNot[] = $row["IDNews"];
        $TituloNot[] = $row["Titulo"];
        $AssuntoNot[] = $row["Assunto"];
        $FotoNot[] = $row["Foto"];
        // $ResumeTitulo[] = str_split($TituloNot[], 128).' ...';


        // $DataNot[] =  date_format($NiverDataRaw, 'd')." de ".strftime('%B', strtotime($NiverDataStr));
}

} elseif ($QuantPass < 1) {

}

//Style
echo '<style>'; echo include(__DIR__.'/./Feed.css'); echo'</style>';
?>



<div id="Feed">
    <!-- <div class="SemFeed">
        <img src="./imgs/Nothing.svg" alt="">
        <h1>Sem Resultados!</h1>
    </div> -->

    <div class="ToolNews">
    <!-- <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Anterior</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item">
            <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
            <a class="page-link" href="#">Próximo</a>
            </li>
        </ul>
    </nav> -->
    <!-- <button class="btAddNews">+</button> -->
    </div>
    <div class="Feed-list">

    <?php
        
    for ($i = 0; $i < count($IDNot); $i++){
        $ResumeTitulo = substr($AssuntoNot[$i],0, 180,);


        echo "<div class='feed f$i'>";
            echo "<div class='info'>";
                echo "<h1>$TituloNot[$i]</h1>";
                echo "<span id='line'></span>";
                echo "<p>$ResumeTitulo</p>";
            echo "</div>";
            echo "<img src='$FotoNot[$i]'>";
        echo "</div>";
    }

    for ($i = 0; $i < count($IDNot); $i++){
        $ResumeTitulo = substr($AssuntoNot[$i],0, 180,);


        echo "<div class='feed f$i'>";
            echo "<div class='info'>";
                echo "<h1>$TituloNot[$i]</h1>";
                echo "<span id='line'></span>";
                echo "<p>$ResumeTitulo</p>";
            echo "</div>";
            echo "<img src='$FotoNot[$i]'>";
        echo "</div>";
    }

    for ($i = 0; $i < count($IDNot); $i++){
        $ResumeTitulo = substr($AssuntoNot[$i],0, 180,);


        echo "<div class='feed f$i'>";
            echo "<div class='info'>";
                echo "<h1>$TituloNot[$i]</h1>";
                echo "<span id='line'></span>";
                echo "<p>$ResumeTitulo</p>";
            echo "</div>";
            echo "<img src='$FotoNot[$i]'>";
        echo "</div>";
    }

    for ($i = 0; $i < count($IDNot); $i++){
        $ResumeTitulo = substr($AssuntoNot[$i],0, 180,);


        echo "<div class='feed f$i'>";
            echo "<div class='info'>";
                echo "<h1>$TituloNot[$i]</h1>";
                echo "<span id='line'></span>";
                echo "<p>$ResumeTitulo</p>";
            echo "</div>";
            echo "<img src='$FotoNot[$i]'>";
        echo "</div>";
    }

    ?>
    <!-- <div class="feed f0">
        <div class="info">
            <h1>Seja Bem-vindo</h1>
            <span id="line"></span>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris odio libero, suscipit ut lacinia eu, porta eu arcu. Maecenas arcu justo, varius ac erat in, sollicitudin semper turp ...</p>
        </div>
        <img src="https://images.unsplash.com/photo-1565347878134-064b9185ced8?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=387&amp;q=80">
    </div> -->
    
    </div>
    </div>
    <div class="PopUp">
        <!-- <div class="AddNews">
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
        </div> -->
        <div class="OpenNews">
            <p class="NewsClose Close">X</p>

        </div>
</div>

<script type='module'><?php include(__DIR__.'/Feed.js'); ?></script>

<?php
// Script
$Script = realpath(__DIR__ . '/Feed.js');
$Script = str_replace('\\', '/', $Script);
// echo "<script type='module' src='$'>".include(__DIR__.'/Feed.js');."</script>";

?>
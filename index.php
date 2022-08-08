<?php 

require_once ('./src/Login/login.php');
require_once ('./src/Login/CriarConta.php');

if(!isset($_SESSION)){
    session_start();
}

if (isset($_SESSION['Nome'])){echo "<style>
.FazerLogin{
    display:none !important;
}
.Perfil{
    display: flex !important;
}
</style>";

$NomeLog = $_SESSION['Nome'];
$SobrenomeLog = $_SESSION['Sobrenome'];

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/favicon.ico" type="image/ico">
    <title>Nidec GA - Início</title>
    <style><?php include ("C:/xampp/htdocs/nidec/style.css"); ?></style>
</head>
<body>
<header>

<?php 
$LogoPath = './assets/img/nidec-ga-logo.png';
$LoginLogoPath = './assets/svg/person-plus.svg';
include ('./src/MainHeader/MainHeader.php') 
?>

</header>

<div class="MainBody">
    <section class="GridContainer">
        <div class="header">
            <!-- <p>Header</p> -->
            <div class="Slide">
                <p>Seja Bem-vindo</p><br>
                <p>a intranet!</p>
            </div>
        </div>
        <div class="sidebar">
            <!-- <p>Sidebar</p> -->
           <div class="Clima">
                <div class="weather loading">
                    <h2 class="city">Cidade</h2>
                    <h1 class="temp">51°C</h1>
                    <div class="MinMax">
                            <p class="TempMin"></p>
                            <p class="TempMax"></p>
                        </div>
                    <div class="flex">
                        <img src="https://openweathermap.org/img/wn/04n.png" alt="" class="icon" /> 
                        <div class="description">Cloudy</div>
                    </div>
                </div>
            </div>

            <div class="Aniversario">
                <h1 class="Titulo">Aniversários</h1>
                    <div class="NiverList">
                        <?php 
                
                        $sql = "SELECT * FROM `perfil`";
                    
                        $result = mysqli_query($conn, $sql) or die("Falha na execução da query: " . $mysqli->error);

                        date_default_timezone_set('America/Sao_Paulo');

                        while ($row = mysqli_fetch_assoc($result)) {
                            $nome[] = $row["Nome"]." ".$row["Sobrenome"];
                            $niverFor = $row["Aniversário"] ;
                            $niverFor = date_create($niverFor);
                            $niver[] = date_format($niverFor, 'd/m');
                            $niverCompleta[] = date_format($niverFor, 'd/m/y');
                            $Hoje = date('d/m/y');                      
                        }



                            $niverI = 0;
                        for ($i = 0; $i < count($nome); $i++) {
                            $niverI++;
                            if ($niverCompleta[$i] == $Hoje){
                                $ClassDia = 'hoje';
                                $Bolo = ' 🎂';  
                            } else {
                                $ClassDia = '';
                                $Bolo = '';  
                        }
                        echo "<div class='niver $niverI $ClassDia'> 
                                <h1 class='Nome'>$nome[$i]$Bolo</h1>                       
                                <div class='flexNiver'>
                                    <p class='dataTipo'>Aniversário:</p>
                                    <p class='DataNiver'>$niver[$i]</p>
                                </div>
                            </div>";
                        echo "<span class='line'></span>";
                        }
                        ?>
                    </div>
            </div>
        </div>
        <div class="main">
            <p>Main</p>
            <div class="test"></div>
        </div>
        <div class="footer">
            <p>© Nidec Corporation 2022</p>
        </div>
    </section>

    <div class="popup">
        <div class="WeatherCard">
            <p class="CloseWeather">X</p>
            <h2 class="CardCity">Cidade</h2>
            <h1 class="CardTemp">16°C</h1>
            <div class="CardFlex">
                <img class="CardImg" src="https://openweathermap.org/img/wn/04n.png">
                <p class="CardDesc">Nublado</p>
            </div>
            <div class="CardMinMax">
                <p class="CardMin">Min: 15°C</p>
                <p class="CardMax">Máx: 20°C</p>
            </div>
            <div class="ClimaAdd">
                <p class="CardUmidade"></p>
                <p class="CardVel">dsa</p>
            </div>
        </div>
    </div>
</body>

<script src="./script.js"></script>

</html>
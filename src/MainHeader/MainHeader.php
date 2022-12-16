<?php

if(!isset($_SESSION)){
    session_start();

    // if (!isset($_SESSION['InternID'])){
    //     include (__DIR__."/../MySQL/ValidateID.php");

    //     $_SESSION['InternID'] = Validar($_COOKIE['AcessToken'], $_COOKIE['DToken']);
    // }



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
}

include_once(__DIR__. '/../MySQL/MySQLInteract.php');


echo '<style>'; include(__DIR__.'/./MainHeaderStyle.css'); echo '</style>';

if (!isset($LogoPath)){
    $LogoPath = "/nidec/assets/img/nidec-ga-logo.png";
}

if (!isset($LoginLogoPath)){
    $LoginLogoPath = '/nidec/assets/svg/person-plus.svg';
}



?>
<div class='topo'>
    <?php echo "<img src='$LogoPath' alt='Nidec GA'></img>"; ?>
    <ul>
            <li><a href='/nidec/home' >Inicio</a></li>
            <li><a href=''>Departamentos</a></li>
            <li><a href='/nidec/ajuda'>Reportar</a></li>
    </ul>

 <?php   if (!isset($_SESSION['InternID'])){
    echo "<div class='FazerLogin'>"; 
    echo    "<button id='loginButton'>";
    echo        "<img src='$LoginLogoPath' alt='Logar'>";
    echo     "</button>";
    echo "</div>";
 }
 
 if (isset($_SESSION['InternID'])){
    echo "<div class='Perfil'>";
    echo "<p>Olá ";
       if (isset($_SESSION['Nome'])){
           echo "<span class='User'>".$NomeLog."</span>";
        }
    echo "</p>";
    echo " <div class='LoginDropBox'>";
    echo "    <ul class='list'>";
    echo "        <li class='BotaoLog1'> <a href='/index.php'>Perfil</a></li>";
    echo "        <span class='Line'></span>";
    echo "        <li class='BotaoLog2'><a href=''>Configurações</a></li>";
    echo "        <span class='Line'></span>";
    // echo "         <li class='BotaoLog3'><a href=''></a></li>";
    // echo "        <span class='Line'></span> ";
    echo "        <li class='BotaoLog4'><a href='./src/login/Logout.php'>Finalizar Sessão</a></li>";
    echo "    </ul>";
    echo "</div>";
    echo "</div>";
echo "</div>";

}

if (!isset($_SESSION['InternID'])){

echo "<div class='LoginForm'>";
    include (__DIR__.'/../MainHeader/LoginForm/LoginForm.php');
echo "</div>";

}

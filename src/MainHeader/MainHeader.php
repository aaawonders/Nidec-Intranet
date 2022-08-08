<?php

if(!isset($_SESSION)){
    session_start();
}

include_once(__DIR__. '/../MySQL/MySQLInteract.php');


echo '<style>'; include(__DIR__.'/./MainHeaderStyle.css'); echo '</style>';

if (!isset($LogoPath)){
    $LogoPath = '../../assets/img/nidec-ga-logo.png';
}

if (!isset($LoginLogoPath)){
    $LoginLogoPath = '../../assets/svg/person-plus.svg';
}



?>
<div class='topo'>
    <?php echo "<img src='$LogoPath' alt='Nidec GA'></img>"; ?>
    <ul>
            <li><a href='' type='submit'>Inicio</a></li>
            <li><a href=''>Departamentos</a></li>
            <li><a href='#'>Reportar</a></li>
    </ul>

    <div class='FazerLogin'>
        <button id='loginButton'>
            <img src='<?php echo $LoginLogoPath; ?>' alt='Logar'>
        </button>
    </div>

    <div class='Perfil'>
    <p>Olá <?php 
        if (isset($_SESSION['Nome'])){
            echo "<span class='User'>".$NomeLog."</span>";
        }
    ?>
    </p>
     <div class='LoginDropBox'>
        <ul class='list'>
            <li class='BotaoLog1'> <a href=''>Perfil</a></li>
            <span class='Line'></span>
            <li class='BotaoLog2'><a href=''>Configurações</a></li>
            <span class='Line'></span>
             <li class='BotaoLog3'><a href=''></a></li>
            <span class='Line'></span> 
            <li class='BotaoLog4'><a href='./src/login/Logout.php'>Finalizar Sessão</a></li>
        </ul>
    </div>
    </div>
</div>

<div class="LoginForm">
    <?php include ('./src/MainHeader/LoginForm/LoginForm.php')?>
</div>


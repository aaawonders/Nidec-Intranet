<?php

if(!isset($_SESSION)){
    session_start();
}

include_once("../MySQL/MySQLInteract.php");


echo '<style>'; include('./MainHeaderStyle.css'); echo '</style>';

?>
<header class='topo'>
    <img src='../../assets/img/nidec-ga-logo.png' alt='Nidec GA'></img>
    <ul>
            <li><a href='' type='submit'>Inicio</a></li>
            <li><a href=''>Departamentos</a></li>
            <li><a href='#'>Reportar</a></li>
    </ul>

    <div class='FazerLogin'>
        <button id='loginButton'>
            <img src='../../assets/svg/person-plus.svg' alt='Logar'>
        </button>
    </div>

    <div class='Perfil'>
    <!-- <p>Olá <?php 
        // if (isset($_SESSION['Nome'])){
        //     echo "<span class='User'>".$NomeLog."</span>";
        // }
    ?>
    </p> -->
    <!-- <div class='LoginDropBox'>
        <ul class='list'>
            <li class='BotaoLog1'> <a href=''>Perfil</a></li>
            <span class='Line'></span>
            <li class='BotaoLog2'><a href=''>Configurações</a></li>
            <span class='Line'></span>
             <li class='BotaoLog3'><a href=''></a></li>
            <span class='Line'></span> 
            <li class='BotaoLog4'><a href='./src/login/Logout.php'>Finalizar Sessão</a></li>
        </ul>
    </div> -->
</div>
</header>


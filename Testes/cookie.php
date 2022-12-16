<?php

if(isset($_COOKIE['nome'])){
     
}

// setcookie('nome', 'nome', time() +1000000);

session_start();

// $_SESSION['InternID'] = 21;


echo $_SESSION['InternID'];

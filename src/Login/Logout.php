<?php

session_start();
session_destroy();

// if (isset($_COOKIE['AcessToken']) && isset($_COOKIE['DToken'])){
    unset($_COOKIE['AcessToken']);
    setcookie('AcessToken', null, -1, '/nidec'); 
    unset($_COOKIE['DToken']);
    setcookie('DToken', null, -1, '/nidec'); 
// }

header('Location: ../../index.php');
exit;

?>
<?php

define('DB_HOST'        , "localhost");
define('DB_USER'        , "PHPLogin");
define('DB_PASSWORD'    , "pZ88q07@h%RaQk6kw%Oe36ydKKTLXC");
define('DB_NAME'        , "devmedia");
define('DB_DRIVER'      , "sqlsrv");

require_once "SQLConnect.php";

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT nome, preco, quantidade FROM produto");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }

?>
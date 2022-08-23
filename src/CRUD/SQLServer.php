<?php


define('DB_HOST'        , "localhost");
define('DB_USER'        , "PHPLogin");
define('DB_PASSWORD'    , "pZ88q07@h%RaQk6kw%Oe36ydKKTLXC");
define('DB_NAME'        , "Banco_de_Dados");
define('DB_DRIVER'      , "sqlsrv");

require_once ('./classSQL.php');

try{

    $Conexao    = Conexao::getConnection();
    $query      = $Conexao->query("SELECT * FROM Login.TabelaCadastros");
    $produtos   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }


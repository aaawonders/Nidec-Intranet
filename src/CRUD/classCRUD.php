<?php

require_once ('./classSQL.php');
require_once ('./SQLServer.php');

// Login.TabelaCadastros

class CRUD {
    private $SQlConn;

    public function __construct($Table) { 
        $this->Table = $Table;
        try{
            $SQlConn = Conexao::getConnection();
            $query   = $SQlConn->query("SELECT * FROM $Table");
            $tabela  = $query->fetchAll();
         } catch (Exception $e){
            echo $e->getMessage();
            exit;
         }
        return $Table." foi conectada";
    }

    public function Add ($Valor, $Coluna){
        

    }

    public function Ler ($add){

    }

    public function Att ($add){

    }

    public function Del ($add){

    }
}

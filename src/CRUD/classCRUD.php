<?php

require_once ('./classSQL.php');
require_once ('./SQLServer.php');

// Login.TabelaCadastros

class CRUD {
    private $SQlConn;
    public $ConnStatus;
    public $Table;

    function ConnSucess ($Table) {
        return $Table." foi conectada";
    }

    public function __construct($Table) { 
        $this->Table = $Table;
        try{
            $SQlConn = Conexao::getConnection();
            $query   = $SQlConn->query("SELECT * FROM $Table");
            $tabela  = $query->fetchAll();
            $ConnStatus = $this->ConnSucess ($Table);
            $this->Con = $SQlConn;
         } catch (Exception $e){
            echo $e->getMessage();
            exit;
         }
    }

    public function Add ($Valor, $Coluna){
        
        if (is_array($Valor) && is_array($Coluna)) {

            $ContValor = count($Valor);
            $ContColuna = count($Coluna);
            $ValorStr = "";
            $ColunaStr = "";
            
            if ($ContValor = $ContColuna) {
                for ($i = 0; $i < count($Valor); $i++) {
                    $ValorStr = $ValorStr."'$Valor[$i]', " ;
                    $ColunaStr = $ColunaStr."$Coluna[$i], " ;
                }

                $ValorStr = rtrim($ValorStr,', ');
                $ColunaStr = rtrim($ColunaStr,', ');

                
            } else {
                return "ERRO: Colunas e Valores não são iguais";
            }

            $Valor = $ValorStr;
            $Coluna = $ColunaStr;
            
        } else if (is_array($Valor) && !is_array($Coluna)) {
            return "ERRO: Colunas ou Valores não são arrays";

        } else if (!is_array($Valor) && is_array($Coluna)) {
            return "ERRO: Colunas ou Valores não são arrays";

        }

        try{
        $SQl = "INSERT INTO $this->Table ($Coluna) VALUES ($Valor)";

        $this->Con->query($SQl);
        return $this->Table.": ".$Valor." Foi/foram adicionado(s) na(s) coluna(s) ".$Coluna;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function Ler ($add = null){

        $SQl = "SELECT * FROM  $this->Table";

        if (isset($add)){

            if (is_array($add)) {
                $FiltroStr = "";
                
                for ($i = 0; $i < count($add); $i++) {
                    $FiltroStr = $FiltroStr."$add[$i], " ;
                }

                $add = rtrim($FiltroStr,', ');

                $SQl = "SELECT $add FROM  $this->Table";

                echo $SQl;

            } else {

                $SQl = "SELECT $add FROM  $this->Table";

                echo $SQl;

            }
        }

        try{
            $query = $this->Con->query($SQl);
            $array = $query->fetchAll();

            return $array;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function Att ($add){

    }

    public function Del ($add){

    }
}

$Valor = array("Nome", "Sobrenome");

$Crud = new CRUD("Login.TabelaCadastros");
$array = $Crud->Ler();


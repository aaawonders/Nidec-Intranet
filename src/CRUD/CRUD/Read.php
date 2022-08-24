<?php

require ('./SQLServer.php');

$query      = $Conexao->query("SELECT * FROM Login.TabelaCadastros");
$tabela   = $query->fetchAll();

// foreach ($tabela as $item){
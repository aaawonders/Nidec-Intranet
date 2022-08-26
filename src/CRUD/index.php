<?php

require ('./SQLServer.php');

$query      = $Conexao->query("SELECT * FROM Login.TabelaCadastros");
$tabela   = $query->fetchAll();
$QuantTabela = count($tabela);

if ($QuantTabela > 0) {
    echo "<style>#EmptyTable{display:none !important;}</style>";
} else { 
    echo "<style>#EmptyTable{display:block !important;}</style>";
}

if (isset($_POST['Nome']) && isset($_POST['Sobrenome'])){
    $PostNome = $_POST['Nome'];
    $PostSobrenome = $_POST['Sobrenome'];


    $SQl = "INSERT INTO Login.TabelaCadastros (Nome, Sobrenome) VALUES ('$PostNome', '$PostSobrenome')";

    $Conexao->query($SQl);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' || $_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_GET['id'])){
        if (isset($_POST['ModalExcluir'])) {
            $ID = $_GET['id'];

            $SQl = "DELETE FROM Login.TabelaCadastros WHERE ID = '$ID'";
            $Conexao->query($SQl);
            header("Location: ./index.php");
        } else if (isset($_POST['ModalCancel'])) {
            header("Location: ./index.php");
        }
     } 
} else {
        echo "<style>#ModalDelete{display:none !important;}</style>";
}

?>  

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
    <style><?php include ('./style.css'); ?></style>

<?php if (!isset($_GET['id']) && !isset($_GET['delete'])) {
    echo "<style>#ModalDelete{display:none !important;}</style>";
} else {
    echo "<style>#ModalDelete{display:flex !important;}</style>";
}?>
<body>

<div class="CrudForm">

<div class="tBody">

<form action="" method="post" id="CRUD">
    <div class="t Row-input">
        <div class="r in 1"><p></p></div>
        <div class="r in 2"></div>
        <div class="r in 3"><input type="text" name="Nome" placeholder="Nome" id=""></div>
        <div class="r in 4"><input type="text" name="Sobrenome" placeholder="Sobrenome" id=""></div>
        <div class="r in 5"><input type="email" name="Email" placeholder="Email" id=""></div>
        <div id='ButtonSub'><input type="submit" value="+" id='button'></div>
    </div>
</form>

<div class="t Head">
    <div class="r th 1"><p></p></div>
    <div class="r th 2"><p>ID</p></div>
    <div class="r th 3"><p>Nome</p></div>
    <div class="r th 4"><p>Sobrenome</p></div>
    <div class="r th 5"><p>Email</p></div>
</div>

<?php
        $i = 0;

        foreach ($tabela as $item){
            echo "<div class='t Row $i'>";
            echo "<div class='r Col 1'><p></p></div>";
            echo "<div class='r Col 2'><p>".$item['ID']."</p></div>";
            echo "<div class='r Col 3'><p>".$item['Nome']."</p></div>";
            echo "<div class='r Col 4'><p>".$item['Sobrenome']."</p></div>";
            echo "<div class='r Col 5'><p>".$item['Email']."</p></div>";
            echo "<div id='ButtonDel'><a href='index.php?delete=true&index=$i&id=".$item['ID']."' class='Delete'>X</a></div>";
            echo "</div>";
            $i++;
        }
    ?>

</div>

<div id="EmptyTable">
    <p>Sem registros</p>
</div>



</div>

<!-- <input type='submit' name='delete $i' value='X' class='Delete $i'> -->

<div id='ModalDelete'>
    <p>Tem certeza que quer excluir?</p>
    <span></span>
    <div>
        <form action="" method="post">
            <input type="submit" name="ModalCancel" class='btModal Cancel' value="Cancelar">
            <input type="submit" name="ModalExcluir"  class='btModal Excluir' value="Excluir">
        </form>
        <!-- <button type="button" class='btModal Cancel'>Cancelar</button>
        <button type="button" class='btModal Excluir'>Excluir</button> -->
    </div>
</div>

</body>
<style>#ModalDelete{display:block;}</style>
<script src="./script.js"></script>

</html>